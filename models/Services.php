<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 12/01/14
 * Time: 19:37
 */
class Service extends Model{

    public function job(){
        return $this->has_many('Job');
    }

}