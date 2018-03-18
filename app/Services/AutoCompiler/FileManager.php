<?php
namespace App\Services\AutoCompiler;


use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Filesystem\Filesystem;
use App\Services\Helper\Helpers;

class FileManager {

    use Helpers;

    protected $processLog = array();
    protected $file;

    public function __construct(File $file) {
        $this->file = $file;
    }

    public function delDir($path){

        try {

//            $this->file->cleanDirectory(storage_path('app/').$path);
            $this->processLog = array($this->parseArgcLogs($path, 'Delete directory', '', 'success'));

        } catch (Exception $e) {
            $this->processLog = array($this->parseArgcLogs($path, 'Delete directory', $e, 'error'));
            $this->failed($e);
        }

        return $this->processLog;
    }

}
