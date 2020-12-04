<?php


namespace App\Http\Controllers\API;


use App\Http\Requests\ApplyForJobRequest;
use App\Models\HiringPhase;
use App\Models\Job;

class JobController
{
    public function apply(ApplyForJobRequest $request)
    {
        /**
         * @var Job $job
         */
        $job = Job::find($request->job_id);
        $initalHiringPhaseId = $job->hiringPhases()->where('order', 0)->first('id');
        if($job->applications()->where('applicant_reference', $request->applicant_reference)->exists())
        {
            return response()->json([
                'message' => 'Application already exists'
            ], 409);
        }

        $job->applications()->create([
            'applicant_reference' => $request->applicant_reference,
            'hiring_phase_id'=> $initalHiringPhaseId->id
        ]);
        return response()->json([
                'message' => 'Application created'
            ], 201);
    }
}
