<?php

/**
 * Created by PhpStorm.
 * User: ben
 * Date: 14/01/14
 * Time: 00:48
 */
class ChampionCategory extends Model
{

    public function Champion()
    {
        return $this->has_many_through('Champion', 'ChampionCategoryRelation');
    }
}