<?php
namespace App\Repositories\Log;

use App\Log;
use App\Repositories\Log\LogsInterface as LogsInterface;



class LogsRepository implements LogsInterface
{
    public $item;


    function __construct(Log $item) {
        $this->item = $item;
    }


    public function getAll()
    {
        return $this->item->getAll();
    }


    public function find($id)
    {
        return $this->item->findLog($id);
    }


    public function delete($id)
    {
        return $this->item->deleteLog($id);
    }

    public function create(array $attributes)
    {
        return $this->item->create($attributes);
    }
}
