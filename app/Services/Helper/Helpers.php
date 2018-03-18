<?php
namespace App\Services\Helper;

use Illuminate\Support\Facades\Validator;

trait Helpers {


    public function parseArgcProcess($arg)
    {
        return array(
            'job' => json_encode($arg->input('job')),
            'projectSettings'=>json_encode($arg->input('projectSettings.expoSettings')),
            'serverSettings'=>json_encode($arg->input('projectSettings.serverSettings'))
        );
    }

    public function parseArgcLogs($process_id, $type, $log, $step)
    {
        return array(
            'process_id' => $process_id,
            'step'=>$step,
            'status_log'=>json_encode($log),
            'status_type' => $type,
        );
    }
}
