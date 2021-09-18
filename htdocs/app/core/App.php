<?php

namespace app\core;

// routing of the requests happens here

class App {

	private $controller = '\\index'; // set a default value for the controller
	private $method = '';
	private $params = [];


    public function __construct() {
        // TODO: implement the routing to map the URL to the actual controllers and methods
        // map urls such as localhost/controllername/methodname to the execution of method methodname from class controllername
        // eg. http://localhost/Main/index maps to the index method of the Main controller class
        // e.g. http:///localhost/Animal/breed
        // maps to the breed method of the Animal controller class with parameters param1 and param2

        // parse incoming urls to an array containing the url components
        $url = $this->parseURL();

        print_r($url);

        // check and implement the controller
        if (isset($url[0])) { // are there contents in the $url[0] element
        	if (file_exists('app/controllers/' . $url[0] . '.php')) {
        		$this->controller = 'app\\controllers\\' . $url[0];
        		echo "the controller exists";
        	} else {
        		echo "the controller does not exist";
        	}
        	unset($url[0]); // deleting $url[0] from memory.
        }

        // $this->controller becomes an object of the requested type
        $this->controller = new $this->controller;

        // check and choose the method
        if (isset($url[1])) {
        	if (method_exists($this->controller, $url[1])) {
        		$this->method = $url[1];
        	} else {
        		echo "no such method";
        	}

        	unset($url[1]);
        }

        // take care of any parameter
        $this->params = $url ? array_values($url) : [];

    	// dont forget \ in beginning
        //$obj = new \app\controllers\Main();

        // run this command below:
        call_user_func_array(array($this->controller, "index"), []);
    }

    //"Default/index"
    //["Default", "index"]
    public function parseURL() {
    	// check that the url is passed as a parameter

    	if(isset($_GET['url'])) { // assuming we have passed the url (http://localhost/index.php?url=/the/url/goes/here => ['the', 'url', 'goes', 'here'])
    		return explode('/', 
    		 filter_var(
    			rtrim($_GET['url'], '/'), // remove the trailing /
    			 FILTER_SANITIZE_URL)); // filter out non-url compliant characters
    	}
    }


}