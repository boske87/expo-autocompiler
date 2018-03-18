<?php
namespace App\Services\AutoCompiler;

use Illuminate\Support\Facades\File;

class PrepareProject {

    public function __construct(){

    }


    public function prepareJson($folderName, $settings, $fileName){
        $object = $this->openJsonFile($folderName, $fileName, 'expo');
        $object = $this->editData($object, $settings);
        $this->saveJsonFile($folderName, $fileName, $object);
    }

    private function openJsonFile($folderName, $fileName, $key){
        $path = storage_path('app/')
            .$folderName
            .'/'
            .$fileName;
        $object = json_decode(file_get_contents($path), true);
        return $object[$key];
    }


    private function saveJsonFile($folderName, $fileName, $object){
        $path = storage_path('app/')
            .$folderName
            .'/'
            .$fileName;
        File::put($path, json_encode($object));
    }


    private function editData($oldObject, $newObject){
        foreach ($newObject as $key => $one){
            if(isset($oldObject[$key]))
                $oldObject[$key] = $one;
        }
        return $oldObject;
    }


}
