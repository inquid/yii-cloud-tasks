<?php


namespace app\Jobs\Helper;


use Google\ApiCore\ApiException;
use Yii;

class Job implements JobInterface
{
    /** @var string */
    public $name;

    /** @var string */
    public $id;

    /** @var bool */
    protected $reTry;

    /** @var int */
    public $secondsFromNow = 0;

    /** @var object */
    public $data;

    /** @var bool */
    public $repeat = false;

    /** @var string */
    public $queue = 'default';

    /** @var bool If the job won't run immediately */
    public $scheduledJob = false;

    /**
     * Job constructor.
     */
    public function __construct()
    {
    }

    public function setRetry(bool $reTry = true): void
    {
        $this->reTry = $reTry;
    }

    /**
     * @throws ApiException
     */
    public function handle(): void
    {
        if ($this->data->repeat ?? false) {
            // TODO how to know when this new task needs to run??
            Yii::$app->google_tasks->everyMinute()->dispatch($this);
        }
    }

    /**
     *
     */
    public function dispatch(): void
    {
        Yii::$app->google_tasks->dispatch($this);
    }

    /**
     * @param mixed $data
     * @return JobInterface
     */
    public function setData($data): JobInterface
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @param int $secondsFromNow
     * @return JobInterface
     */
    public function setSecondsFromNow(int $secondsFromNow): JobInterface
    {
        $this->secondsFromNow = $secondsFromNow;

        return $this;
    }

    /**
     * @param bool $repeat
     */
    public function setRepeat(bool $repeat): void
    {
        $this->data;
        $this->repeat = $repeat;
        if($repeat){
            $this->scheduledJob = true;
        }
    }
}
