<?php

namespace App\Jobs;

use App\Services\AutoCompiler\ProcessSetUp;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Exception;

class ProcessPrepare implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(ProcessSetUp $processSetUp)
    {
        //prepare all
        try {
            $processSetUp->prepareModules('new');
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
