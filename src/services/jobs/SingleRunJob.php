<?php


namespace Inquid\YiiCloudTasks\services\jobs;

/**
 * Class Designed to control when does the Job must run.
 * Interface SingleRunJob
 * @package app\Jobs
 */
interface SingleRunJob
{
    /**
     * @return JobSchedulerInterface
     */
    public function inOneMinute(): JobSchedulerInterface;

    /**
     * @return JobSchedulerInterface
     */
    public function inFiveMinutes(): JobSchedulerInterface;

    /**
     * @return JobSchedulerInterface
     */
    public function inOneHour(): JobSchedulerInterface;

    /**
     * @return JobSchedulerInterface
     */
    public function tonight(): JobSchedulerInterface;
}
