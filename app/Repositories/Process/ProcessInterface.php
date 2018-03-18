<?php
namespace App\Repositories\Process;


interface ProcessInterface {


    public function getAll();


    public function find($id);


    public function delete($id);

    function create(array $attributes);
}
