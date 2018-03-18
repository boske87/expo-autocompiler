<?php

namespace App\Http\Controllers\Compiler;

use App\Jobs\ProcessBuild;
use App\Jobs\ProcessFileManager;
use App\Jobs\ProcessGit;
use App\Jobs\ProcessPrepare;
use App\Jobs\ProcessPrepareProject;
use App\Services\Helper\Helpers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\ProcessCompile;
use App\Services\AutoCompiler\ExpoService;
use App\Services\Validation\ValidationService;
use App\Repositories\Process\ProcessInterface;

class MainController extends Controller
{
    use Helpers;
    protected $help;

    function __construct() {

    }


    public function index(){

    }


    public function addJob(Request $request, ValidationService $validationService, ProcessInterface $processLog)
    {
        $validator = $validationService->buildAppValidator($request->all());
        if ($validator->fails()) {
            return response()
                ->json(['error'=>$validator->errors()], 500);
        }
        $processId = $processLog->create($this->parseArgcProcess($request))->id;
        ProcessCompile::withChain([
            new ProcessFileManager($processId)
//            new ProcessGit(),
//            new ProcessPrepareProject(
//                $request->input('projectSettings.expoSettings'),
//                $request->input('projectSettings.serverSettings')
//            ),
//            new ProcessPrepare(),
//            new ProcessBuild($request->only('job.deviceType'))
        ])->dispatch();

//        return true;
    }

    public function jobStatus(ExpoService $expoService)
    {
//        $res = json_encode($expoService->buildStatus('new'),TRUE);
//        $res = json_decode($res, true);
        return response()->json(["status" => $expoService->buildStatus('new')], 200);
        //return response()->json($res);
    }



}
