<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 14/01/14
 * Time: 13:59
 */
require_once 'Config/Config.php';
class DatabaseCleaner{

    public function __construct(){

        $this->cleanJobs();
    }

    private function cleanJobs(){
        $query = ORM::raw_execute('DELETE FROM job where fulfilled = 1');
    }


}

$dbc = new DatabaseCleaner();