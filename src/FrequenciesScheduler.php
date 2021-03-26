<?php


namespace app\Jobs\Helper;

use DateTimeZone;

/**
 * Class Designed to control when does the Job must run.
 * Interface FrequenciesScheduler
 * @package app\Jobs
 */
interface FrequenciesScheduler
{
    /**
     * @param string $startTime
     * @param string $endTime
     * @return JobSchedulerInterface
     */
    public function between(string $startTime, string $endTime): JobSchedulerInterface;

    /**
     * @return JobSchedulerInterface
     */
    public function everyMinute(): JobSchedulerInterface;

    /**
     * @return JobSchedulerInterface
     */
    public function everyTwoMinutes(): JobSchedulerInterface;

    /**
     * @return JobSchedulerInterface
     */
    public function everyThreeMinutes(): JobSchedulerInterface;

    /**
     * @return JobSchedulerInterface
     */
    public function everyFourMinutes(): JobSchedulerInterface;

    /**
     * @return JobSchedulerInterface
     */
    public function everyFiveMinutes(): JobSchedulerInterface;

    /**
     * @return JobSchedulerInterface
     */
    public function everyTenMinutes(): JobSchedulerInterface;

    /**
     * @return JobSchedulerInterface
     */
    public function everyFifteenMinutes(): JobSchedulerInterface;

    /**
     * @return JobSchedulerInterface
     */
    public function everyThirtyMinutes(): JobSchedulerInterface;

    /**
     * @return JobSchedulerInterface
     */
    public function hourly(): JobSchedulerInterface;

    /**
     * @param array $offset
     * @return mixed
     */
    public function hourlyAt(array $offset);

    /**
     * @return mixed
     */
    public function everyTwoHours();

    /**
     * @return mixed
     */
    public function everyThreeHours();

    /**
     * @return mixed
     */
    public function everyFourHours();

    /**
     * @return mixed
     */
    public function everySixHours();

    /**
     * @return mixed
     */
    public function daily();

    /**
     * @param string $time
     * @return mixed
     */
    public function at(string $time);

    /**
     * @param string $time
     * @return mixed
     */
    public function dailyAt(string $time);

    /**
     * @param int $first
     * @param int $second
     * @return mixed
     */
    public function twiceDaily(int $first = 1, int $second = 13);

    /**
     * @return mixed
     */
    public function weekdays();

    /**
     * @return mixed
     */
    public function weekends();

    /**
     * @return mixed
     */
    public function mondays();

    /**
     * @return mixed
     */
    public function tuesdays();

    /**
     * @return mixed
     */
    public function wednesdays();

    /**
     * @return mixed
     */
    public function thursdays();

    /**
     * @return mixed
     */
    public function fridays();

    /**
     * @return mixed
     */
    public function saturdays();

    /**
     * @return mixed
     */
    public function sundays();

    /**
     * @return mixed
     */
    public function weekly();

    /**
     * @param int $day
     * @param string $time
     * @return mixed
     */
    public function weeklyOn(int $day, string $time = '0:0');

    /**
     * @return mixed
     */
    public function monthly();

    /**
     * @param int $day
     * @param string $time
     * @return mixed
     */
    public function monthlyOn(int $day = 1, string $time = '0:0');

    /**
     * @param int $first
     * @param int $second
     * @param string $time
     * @return mixed
     */
    public function twiceMonthly(int $first = 1, int $second = 16, string $time = '0:0');

    /**
     * @param string $time
     * @return mixed
     */
    public function lastDayOfMonth(string $time = '0:0');

    /**
     * @return mixed
     */
    public function quarterly();

    /**
     * @return mixed
     */
    public function yearly();

    /**
     * @param array $days
     * @return mixed
     */
    public function days(array $days);

    /**
     * @param DateTimeZone $timezone
     * @return mixed
     */
    public function timezone(DateTimeZone $timezone);

    /**
     * @param int $position
     * @param string $value
     * @return mixed
     */
    public function spliceIntoPosition(int $position, string $value);
}
