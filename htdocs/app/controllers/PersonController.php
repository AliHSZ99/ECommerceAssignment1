<?php

namespace app\controllers;

class PersonController extends \app\core\Controller {

    public function index() {
        $myPerson = new \app\models\Person(); //Create this object to access Person methods

        $data = $myPerson->getAllPeople(); //Use to retrieve all the data from the database 

        $this->view("/Main/index", $data);
    }

    public function insertPersonController() {
        if(isset($_POST['addPerson'])) { //Checking if the user clicks the submit button
            $myPerson = new \app\models\Person();
            $myPerson->setFirstName($_POST['firstName']);
            $myPerson->setLastName($_POST['lastName']);
            $myPerson->setNote($_POST['note']);
            $myPerson->insertPerson();
            header('location:Main/index');
        } else {
            $this->view('/Main/addPerson');
        }
    }

    public function deletePersonController($personId) {
        $myPerson = new \app\models\Person();
        $myPerson->deletePerson($personId);
        header('location:Main/index');
    }

    public function editPersonController($personId) {
        $person = new \app\models\Person();
        $person->getPerson($personId);
        if(isset($_POST['save'])) {
            $person->setFirstName($_POST['newFirstName']);
            $person->setLastName($_POST['newLastName']);
            $person->setNote($_POST['newNote']);
            $person->updatePerson();
            header("location:/Main/index");
        } else {
            $this->view("/Main/edit", $person);
        }
    }

    public function detailsPersonController($personId) {
        $person = new \app\models\Person();
        $person->getPerson($personId);
        $this->view("Main/details", $person);
    }
}