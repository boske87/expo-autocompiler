<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Exception;
use App\Services\AutoCompiler\ExpoService;

class ProcessBuild implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $jobType;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($jobType)
    {
        $this->jobType = $jobType;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(ExpoService $expoService)
    {
        //prepare all
        try {
            $expoService->expLogout('new');
            $expoService->expLogin('new');
            switch ($this->jobType) {
                case 'ios':
                    break;
                case 'android':
                    $expoService->buildAndroid('new');
                    break;
            }

        } catch (Exception $e) {
            $this->failed($e);
        }
        //git


        //compile


    }

    public function failed($exception)
    {
        $exception->getMessage();
        // etc...
    }
}
