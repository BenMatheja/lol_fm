<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 1/13/14
 * Time: 1:33 PM
 */
class User extends Model{

    public function Summoner() {
        $this->has_many('Summoner');
    }

}