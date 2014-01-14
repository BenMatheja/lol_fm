<?php
require_once 'Service.php';
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 12/01/14
 * Time: 19:16
 */
class Job extends Model
{

    public function service()
    {
        return $this->belongs_to('Service');
    }

    public function serviceForJob()
    {
        return $this->service()->find_one()->name;
    }

    public function strategyForJob(){
        return $this->service()->find_one()->strategy;
    }
}