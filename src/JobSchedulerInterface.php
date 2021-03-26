<?php


namespace app\Jobs\Helper;


use Google\ApiCore\ApiException;

interface JobSchedulerInterface
{
    /**
     * @param JobInterface $job
     * @throws ApiException
     */
    public function dispatch(JobInterface $job): void;

    /**
     * @param JobInterface $job
     * @throws ApiException
     */
    public function dispatch_now(JobInterface $job): void;
}
