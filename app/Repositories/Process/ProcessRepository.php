<?php
namespace App\Repositories\Process;


use App\Process;
use App\Repositories\Process\ProcessInterface as ProcessInterface;



class ProcessRepository implements ProcessInterface
{
    public $item;


    function __construct(Process $item) {
        $this->item = $item;
    }


    public function getAll()
    {
        return $this->item->getAll();
    }


    public function find($id)
    {
        return $this->item->findProcess($id);
    }


    public function delete($id)
    {
        return $this->item->deleteProcess($id);
    }

    public function create(array $attributes)
    {

        return $this->item->create($attributes);
    }
}
