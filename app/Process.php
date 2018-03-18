<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Process extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'process';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'job', 'projectSettings', 'serverSettings', 'status', 'url_app'
    ];
}
