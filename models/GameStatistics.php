<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 1/13/14
 * Time: 11:14 AM
 */
class GameStatistics extends Model{
    public function Games(){
        return $this->belongs_to('Games');
    }
}