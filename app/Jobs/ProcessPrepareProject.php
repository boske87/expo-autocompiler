<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Services\AutoCompiler\PrepareProject;
use Exception;

class ProcessPrepareProject implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $projectSettings;
    protected $serverSettings;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($projectSettings, $serverSettings)
    {
        $this->projectSettings = $projectSettings;
        $this->serverSettings = $serverSettings;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(PrepareProject $prepareProject)
    {
        //prepare all
        try {
            $prepareProject->prepareJson(
                'new',
                $this->projectSettings,
                env('PROJECT_SETTINGS'),
                env('PROJECT_SETTINGS_KEY')
                );
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
