<?php

    function parseArgcProcess($arg)
    {
        return array(
            'job' => json_encode($arg->input('job')),
            'projectSettings'=>json_encode($arg->input('projectSettings.expoSettings')),
            'serverSettings'=>json_encode($arg->input('projectSettings.serverSettings'))
        );
    }

function parseArgcLogs($arg)
{
    return array(
        'process_id' => json_encode($arg->input('job')),
        'projectSettings'=>json_encode($arg->input('projectSettings.expoSettings')),
        'serverSettings'=>json_encode($arg->input('projectSettings.serverSettings'))
    );
}







