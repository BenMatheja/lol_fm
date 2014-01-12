<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 12/01/14
 * Time: 19:37
 */
class Services extends Model{

    public function Jobs(){
        return $this->has_many('Jobs');
    }

}