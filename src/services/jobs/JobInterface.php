<?php


namespace Inquid\YiiCloudTasks\services\jobs;

/**
 * Interface JobInterface
 * @package app\Jobs
 */
interface JobInterface
{
    /**
     * The job needs to retry?
     *
     * @param bool $reTry whether the job should retry or not.
     */
    public function setRetry(bool $reTry = true): void;

    /**
     * The job needs to be repeating? running periodically.
     *
     * @param bool $repeat whether the job should repeat or not.
     */
    public function setRepeat(bool $repeat): void;

    /**
     * Executes the job.
     *
     */
    public function handle(): void;

    /**
     * Dispatches the job.
     */
    public function dispatch(): void;
}
