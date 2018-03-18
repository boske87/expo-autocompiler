<?php
namespace App\Repositories\Log;


interface LogsInterface {


    public function getAll();


    public function find($id);


    public function delete($id);

    function create(array $attributes);
}
