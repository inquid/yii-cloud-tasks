<?php


namespace Inquid\YiiCloudTasks\services\jobs;


use Carbon\Carbon;
use Google\ApiCore\ApiException;
use Google\Cloud\Tasks\V2\CloudTasksClient;
use Google\Cloud\Tasks\V2\Gapic\CloudTasksGapicClient;
use Google\Cloud\Tasks\V2\HttpMethod;
use Google\Cloud\Tasks\V2\HttpRequest;
use Google\Cloud\Tasks\V2\Task;
use Google\Protobuf\Timestamp;
use ReflectionClass;
use yii\base\Component;
use yii\helpers\Url;

/**
 * Class TasksService
 * @package app\Jobs
 */
class TasksService extends Component
{
    public $credentials;

    public $project = 'inquid-cloud-tasks';

    public $location = 'us-central1';

    public $queueName;

    public $client;

    public $baseUrl;

    public function __construct($config = [])
    {
        parent::__construct();

        if (isset($config['baseUrl'])) {
            $this->baseUrl = $config['baseUrl'];
        } else {
            $this->baseUrl = Url::base(true);
        }

        if (isset($config['credentials'])) {
            $this->credentials = $config['credentials'];
        }

        if (isset($config['project'])) {
            $this->project = $config['project'];
        }

        if (isset($config['location'])) {
            $this->project = $config['location'];
        }

        if (isset($config['queue'])) {
            $this->project = $config['queue'];
        }

        if (isset($config['queueName'])) {
            $this->project = $config['queueName'];
        }

        if (($envCredentials = env('GOOGLE_CREDENTIALS_PATH_TASKS'))) {
            $this->credentials = $envCredentials;
        }

        putenv("GOOGLE_APPLICATION_CREDENTIALS={$this->credentials}");

        /** @var CloudTasksGapicClient $client */
        $this->client = new CloudTasksClient();
    }

    /**
     * @param Job $job
     * @return Task
     * @throws ApiException
     */
    public function dispatch(Job $job): Task
    {
        $this->queueName = $this->client::queueName($this->project, $this->location, $job->queue);

        $task = new Task();
        $task->setName("{$this->queueName}/tasks/{$job->id}" . uniqid());
        $googleDateTimeStamp = new Timestamp();
        $carbonDateTime = Carbon::now()->addSeconds($job->secondsFromNow);
        $googleDateTimeStamp->fromDateTime($carbonDateTime);
        $task->setScheduleTime($googleDateTimeStamp);

        $httpRequest = new HttpRequest();
        $httpRequest->setUrl($this->baseUrl . '/job-scheduler/run?job=' . $job->name ?? ((new ReflectionClass($job))->getShortName()));
        $httpRequest->setHttpMethod(HttpMethod::POST);
        if ($job->repeat) {
            if (is_array($job->data) && isset($job->data['repeat'])) {
                $job->data['repeat'] = true;
            } else {
                $job->data->repeat = true;
            }
        }
        $httpRequest->setBody(json_encode($job->data));
        $httpRequest->setHeaders([
            'Content-Type' => 'application/json',
            'Cookie' => YII_DEBUG ? 'XDEBUG_SESSION=phpstorm' : false,
        ]);
        $task->setHttpRequest($httpRequest);

        return $this->client->createTask($this->queueName, $task);
    }
}
