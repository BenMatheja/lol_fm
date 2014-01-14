<?php

/**
 * Created by PhpStorm.
 * User: ben
 * Date: 14/01/14
 * Time: 00:48
 */
class ChampionCategories extends Model
{

    public function Champions()
    {
        return $this->has_many_through('Champions', 'ChampionsCategoriesRelation');
    }
}