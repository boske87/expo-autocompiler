<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Services\AutoCompiler\FileManager;
use Exception;
use App\Repositories\Log\LogsInterface;


class ProcessFileManager implements ShouldQueue
{
    protected $jobId;

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($jobId)
    {
        $this->jobId = $jobId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(FileManager $fileManager, LogsInterface $processLog)
    {

        try {
            $res = $fileManager->delDir($this->jobId);
            $processLog->create($res);

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
