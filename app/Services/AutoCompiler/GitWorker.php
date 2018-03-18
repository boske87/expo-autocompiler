<?php
namespace App\Services\AutoCompiler;

use GitWrapper\GitWrapper;


class GitWorker {

    private $gitRepository;

    public function __construct(GitWrapper $gitRepository) {
        $this->gitRepository = $gitRepository;
    }



    //clone project
    public function gitClone($folderName) {

        $path = storage_path('app/');

        $this->gitRepository->setEnvVar('HOME', $path.$folderName);
        $git = $this->gitRepository->cloneRepository('https://goranbosic:meansko87@bitbucket.org/openratio/borna-ios-android.git',
            $path.$folderName);

        $git->config('user.name', 'goran.bosic');
        $git->config('user.email', 'goran.bosic@openratio.com');
        return $git->isCloned();

    }

}
