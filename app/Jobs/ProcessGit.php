<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Services\AutoCompiler\GitWorker;
use Exception;

class ProcessGit implements ShouldQueue
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
    public function handle(GitWorker $gitWorker)
    {
        try {
            $gitWorker->gitClone('new');

        } catch (Exception $e) {
            $this->failed($e);
        }
    }

    public function failed($exception)
    {
        $exception->getMessage();
        // etc...
    }
}
