<?php

/**
 * Created by PhpStorm.
 * User: ben
 * Date: 12/01/14
 * Time: 18:24
 */
class Summoner extends Model
{
    /*

    public $id;
    public $riot_id;
    public $name;
    public $profile_icon_id;
    public $summoner_level;
     */

    public function games()
    {
        return $this->has_many('Games');
    }
}
