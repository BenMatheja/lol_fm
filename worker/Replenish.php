<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 12/01/14
 * Time: 23:42
 */

/**
 * Class Replenish
 * built in resource governor
 */
require_once 'Config/Config.php';

class Replenish
{

    public function __construct()
    {
        $this->autoloadModels();
        $this->run();

}

    private function autoloadModels()
    {
        $model_array = array_diff(scandir('../models'), array(".", "..", '.gitignore'));
        foreach ($model_array as $model) {
            require_once '../models/' . $model;
        }
    }

    private function run()
    {
        while (true) {
            sleep(15);
            $this->replenishRequests();
        }
    }

    private function replenishRequests()
    {
        ORM::for_table('worker')->raw_execute('update worker set requests_left = 10');
    }

}
$rpl = new Replenish();