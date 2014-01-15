<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 12/01/14
 * Time: 21:41
 */
class Champion extends Model{

    public function games(){
        return $this->has_many('Game');
    }
}