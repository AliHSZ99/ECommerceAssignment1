<?php

namespace app\controllers;

class PersonController extends \app\core\Controller {

    public function index() {
        $myPerson = new \app\models\Person(); //Create this object to access Person methods

        $data = $myPerson->getAllPeople(); //Use to retrieve all the data from the database 

        $this->view("/Main/index", $data);
    }

    
}