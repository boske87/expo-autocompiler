<?php
namespace App\Services\AutoCompiler;


use Symfony\Component\Process\Process;

class ExpoService {


    public function __construct() {

    }

    public function buildAndroid($path){
        exec('cd '.storage_path('app/').$path.';
                        echo "1" | node ../../../../exp-cli/bin/exp.js build:android --no-wait',
            $output);
        print_r($output);
        return $output;
    }

    public function buildStatus($path) {
        exec('cd '.storage_path('app/').$path.';
                        node ../../../../exp-cli/bin/exp.js build:status',
            $output);
        print_r($output);
        return $output;
    }

    public function expLogout($path) {
        exec('cd '.storage_path('app/').$path.';
                        node ../../../../exp-cli/bin/exp.js logout',
            $output);
        print_r($output);
        return $output;

    }

    public function expLogin($path) {
        exec('cd '.storage_path('app/').$path.';
                       node ../../../../exp-cli/bin/exp.js login ',
            $output);
        print_r($output);
        return $output;

    }
}
