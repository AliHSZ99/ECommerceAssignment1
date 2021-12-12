<?php

namespace app\models;

class Country extends \app\core\Model{

	private $countryCode;
	private $countryName;

	public function __construct() {
		parent::__construct();
	}

	public function getCountry($countryCode) {
		$SQL = "Select * From Country Where country_code = :countryCode";
		$STMT = self::$connection->prepare($SQL);
		$STMT->execute(['country_code'=>$countryCode]);
		$STMT->setFetchMode(\PDO::FETCH_OBJ);
		return $STMT->fetch();
	}

}
?>