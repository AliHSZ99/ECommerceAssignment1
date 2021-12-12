<?php

namespace app\controllers;

class AddressController extends \app\core\Controller {

    public function index() {


        $address = new app\models\Address();
    
        $addresses = $address->getAllAddresses();
    
        $this->view('Main/address', $addresses);
    
    }
    
    
    public function insertAddressController() {
    
        // private $addressId;
        // private $personId;
        // private $description;
        // private $streetAddress;
        // private $province;
        // private $postalCode;
        // private $countryCode;
        if (isset($_POST['action'])) { //to check if user presses button
            $address = new app\models\Address();
            $address->personId = $_POST['']
         }
    }   

}



?>