<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 12/01/14
 * Time: 21:41
 */
class Champions extends Model{

    public function Games(){
        return $this->has_many('Games');
    }
}