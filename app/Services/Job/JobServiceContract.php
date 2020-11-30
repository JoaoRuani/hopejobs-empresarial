<?php


namespace App\Services\Job;


use App\Models\Job;

interface JobServiceContract
{
    /**
     * Create a Job
     * @param Job $job
     */
    function Create(Job $job) : void;
}
