<?php
require_once 'Services.php';
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 12/01/14
 * Time: 19:16
 */
class Jobs extends Model
{

    public function services()
    {
        return $this->belongs_to('Services');
    }

    public function serviceForJob()
    {
        return $this->services()->find_one()->name;
    }

    public function strategyForJob(){
        /*return $this->services()->find_one()->strategy;*/
    }
}