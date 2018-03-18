<?php
namespace App\Services\AutoCompiler;



class ProcessSetUp {

    public function __construct() {

    }


    public function prepareModules($folderName){
        exec('cd '.$path = storage_path('app/').$folderName.'; yarn', $output);
        return $output;
    }

}
