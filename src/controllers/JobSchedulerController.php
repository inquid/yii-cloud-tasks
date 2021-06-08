<?php


namespace Inquid\YiiCloudTasks\controllers;


use app\Jobs\Helper\Job;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;

/**
 * Class JobSchedulerController
 * @package app\controllers
 */
class JobSchedulerController extends Controller
{
    /**
     * @inheritdoc
     */
    public $enableCsrfValidation = false;

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'run' => ['post', 'get']
                ],
            ],
        ];
    }

    /**
     * @param $job
     * @return mixed
     */
    public function actionRun($job)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $payload = json_decode(Yii::$app->request->getRawBody());
        $job = 'app\Jobs\\' . $job;
        /** @var Job $jobObject */
        $jobObject = new $job();
        $jobObject->setData($payload)->handle();



        return ['success' => true];
    }
}

