<?php

namespace app\core;

class Controller {

	protected function view($name, $data=null) {

		include('app/views/' . $name . '.php');
	}
}

?>