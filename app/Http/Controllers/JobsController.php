<?php

namespace App\Http\Controllers;

use App\Helpers\NumberHelper;
use App\Http\Requests\StoreJobRequest;
use App\Models\Job;
use App\Models\JobRole;
use Illuminate\Support\Facades\Auth;

class JobsController extends Controller
{
    public function create()
    {
        return view('job.create', ['jobRoles' => JobRole::all()]);
    }
    public function store(StoreJobRequest $jobRequest)
    {
        //MUDAR PARA UM SERVICE/REPOSITORY
        $jobRole = JobRole::firstOrCreate(['name' => $jobRequest->jobRole]);
        $job = Auth::user()->company->jobs()->create([
            'job_role_id' => $jobRole->id,
            'salary' => NumberHelper::ConvertBrazilianFormatToFloat($jobRequest->salary),
            'responsibilities' => $jobRequest->responsibilities,
            'hiringType' => $jobRequest->hiringType,
            'benefits' => $jobRequest->benefits,
            'observations' => $jobRequest->observations,
            'title' => $jobRequest->title
        ]);
        $job->hiringPhases()->createMany([
            [
                'name' => 'Seleção',
                'order' => '0'
            ],
            [
                'name' => 'Entrevista',
                'order' => '1'
            ],
            [
                'name' => 'Contratado',
                'order' => '2'
            ],
        ]);
        return redirect()->route('home');
    }
    public function getJobByRole(string $roleName)
    {
        $job = Auth::user()->company->jobs()->where('job_role.name',$roleName)->first();
    }
    public function show(Job $job)
    {
        // recuperar informações de quem se cadastrou na vaga
        return view('job.show', ['job' => $job]);
    }
}
