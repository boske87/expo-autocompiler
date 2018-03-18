<?php
namespace App\Services\Validation;

use Illuminate\Support\Facades\Validator;

class ValidationService {


    public function buildAppValidator($request)
    {
        return Validator::make($request, [
            'job.deviceType' => 'required',
            'projectSettings.expoSettings.name' => 'required'
        ]);
    }
}
