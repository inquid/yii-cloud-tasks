<?php


namespace Inquid\YiiCloudTasks\services\jobs;

use Carbon\Carbon;
use DateTimeZone;
use Google\ApiCore\ApiException;
use Yii;

/**
 * Class JobScheduler
 * @package app\Jobs
 */
class JobScheduler implements JobSchedulerInterface, FrequenciesScheduler, SingleRunJob
{
    protected $tasksService;

    protected $time = 0;

    protected $repeat = false;

    /**
     * JobScheduler constructor.
     */
    public function __construct()
    {
        $this->tasksService = Yii::$app->google_tasks;
    }

    /**
     * @param JobInterface $job
     * @throws ApiException
     */
    public function dispatch(JobInterface $job): void
    {
        $job->secondsFromNow = $this->time;
        $job->setRepeat($this->repeat);

        $this->tasksService->dispatch($job);
    }

    /**
     * @inheritDoc
     */
    public function dispatch_now(JobInterface $job): void
    {
        $job->secondsFromNow = 0;
        $this->tasksService->dispatch($job);
    }

    public function between(string $startTime, string $endTime): JobSchedulerInterface
    {
        // TODO: Implement between() method.

        return $this;
    }

    public function everyMinute(): JobSchedulerInterface
    {
        $this->time = 60;
        $this->repeat = true;

        return $this;
    }

    public function everyTwoMinutes(): JobSchedulerInterface
    {
        $this->time = 60;
        $this->repeat = true;

        return $this;
    }

    public function everyThreeMinutes(): JobSchedulerInterface
    {
        $this->time = 60;
        $this->repeat = true;

        return $this;
    }

    public function everyFourMinutes(): JobSchedulerInterface
    {
        $this->time = 60;
        $this->repeat = true;

        return $this;
    }

    public function everyFiveMinutes(): JobSchedulerInterface
    {
        $this->time = 60;
        $this->repeat = true;

        return $this;
    }

    public function everyTenMinutes(): JobSchedulerInterface
    {
        $this->time = 60;
        $this->repeat = true;

        return $this;
    }

    public function everyFifteenMinutes(): JobSchedulerInterface
    {
        $this->time = 60;
        $this->repeat = true;

        return $this;
    }

    public function everyThirtyMinutes(): JobSchedulerInterface
    {
        $this->time = 60;
        $this->repeat = true;

        return $this;
    }

    public function hourly(): JobSchedulerInterface
    {
        $this->time = 60;
        $this->repeat = true;

        return $this;
    }

    public function hourlyAt(array $offset)
    {
        $this->time = 60;
        $this->repeat = true;

        return $this;
    }

    public function everyTwoHours()
    {
        $this->time = 60;
        $this->repeat = true;

        return $this;
    }

    public function everyThreeHours()
    {
        $this->time = 60;
        $this->repeat = true;

        return $this;
    }

    public function everyFourHours()
    {
        $this->time = 60;
        $this->repeat = true;

        return $this;
    }

    public function everySixHours()
    {
        $this->time = 60;
        $this->repeat = true;

        return $this;
    }

    public function daily()
    {
        $this->time = 60;
        $this->repeat = true;

        return $this;
    }

    public function at(string $time)
    {
        $this->time = 60;
        $this->repeat = true;

        return $this;
    }

    public function dailyAt(string $time)
    {
        $this->time = 60;
        $this->repeat = true;

        return $this;
    }

    public function twiceDaily(int $first = 1, int $second = 13)
    {
        $this->time = 60;
        $this->repeat = true;

        return $this;
    }

    public function weekdays()
    {
        $this->time = 60;
        $this->repeat = true;

        return $this;
    }

    public function weekends()
    {
        $this->time = 60;
        $this->repeat = true;

        return $this;
    }

    public function mondays()
    {
        $this->time = 60;
        $this->repeat = true;

        return $this;
    }

    public function tuesdays()
    {
        $this->time = 60;
        $this->repeat = true;

        return $this;
    }

    public function wednesdays()
    {
        $this->time = 60;
        $this->repeat = true;

        return $this;
    }

    public function thursdays()
    {
        $this->time = 60;
        $this->repeat = true;

        return $this;
    }

    public function fridays()
    {
        $this->time = 60;
        $this->repeat = true;

        return $this;
    }

    public function saturdays()
    {
        $this->time = 60;
        $this->repeat = true;

        return $this;
    }

    public function sundays()
    {
        $this->time = 60;
        $this->repeat = true;

        return $this;
    }

    public function weekly()
    {
        $this->time = 60;
        $this->repeat = true;

        return $this;
    }

    public function weeklyOn(int $day, string $time = '0:0')
    {
        $this->time = 60;
        $this->repeat = true;

        return $this;
    }

    public function monthly()
    {
        $this->time = 60;
        $this->repeat = true;

        return $this;
    }

    public function monthlyOn(int $day = 1, string $time = '0:0')
    {
        $this->time = 60;
        $this->repeat = true;

        return $this;
    }

    public function twiceMonthly(int $first = 1, int $second = 16, string $time = '0:0')
    {
        $this->time = 60;
        $this->repeat = true;

        return $this;
    }

    public function lastDayOfMonth(string $time = '0:0')
    {
        $this->time = 60;
        $this->repeat = true;

        return $this;
    }

    public function quarterly()
    {
        $this->time = 60;
        $this->repeat = true;

        return $this;
    }

    public function yearly()
    {
        $this->time = 60;
        $this->repeat = true;

        return $this;
    }

    public function days(array $days)
    {
        $this->time = 60;
        $this->repeat = true;

        return $this;
    }

    public function timezone(DateTimeZone $timezone)
    {
        Carbon::now()->setTimezone($timezone);

        return $this;
    }

    public function spliceIntoPosition(int $position, string $value)
    {
        $this->time = 60;
        $this->repeat = true;

        return $this;
    }

    public function inOneMinute(): JobSchedulerInterface
    {
        $this->time = 60;

        return $this;
    }

    public function inFiveMinutes(): JobSchedulerInterface
    {
        $this->time = 300;

        return $this;
    }

    public function inOneHour(): JobSchedulerInterface
    {
        $this->time = 3600;

        return $this;
    }

    public function tonight(): JobSchedulerInterface
    {
        $this->time = Carbon::now()->secondsUntilEndOfDay();

        return $this;
    }
}
