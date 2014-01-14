<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 1/13/14
 * Time: 11:14 AM
 */
class GameStatistic extends Model{
    public function Game(){
        return $this->belongs_to('Game');
    }
}