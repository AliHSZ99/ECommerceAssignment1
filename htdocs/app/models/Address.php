<?php

namespace app\models;

class Address extends app\core\Model {

	private $addressId;
	private $personId;
	private $description;
	private $streetAddress;
	private $province;
	private $postalCode;
	private $countryCode;

	public function __construct() {
		parent::__construct();
	}

	public function insertAddress() {
		$SQL = "INSERT INTO Address(`person_id`, `description`, `street`, `city`, `province`, `postal_code`, `countrty_code`) 
			VALUES (:personId, :description, :streetAddress, :province, :postalCode, :countryCode);";
		$STMT = self::$connection->prepare($SQL);
		// this is an associative array.
		$STMT->execute(["person_id" => $this->personId, "description" => $this->description,
		 	"street" => $this->streetAddress, "province" => $this->province, "postal_code" => $this->postalCode, 
			"country_code" => $this->countryCode]);
	}

	public function deleteAddress($addressId) {
		$SQL = "DELETE FROM Address WHERE address_id = :addressId;";
		$STMT = self::$connection->prepare($SQL);
		$STMT->execute(["address_id" => $addressId);
	}

	public function updateAddress($address_id) {
		$SQL = "UPDATE ADDRESS SET `description` = $this->description, `street` = $this->streetAddress, `province` = $this->province,
			`postal_code` = $this->postalCode, `country_code` = $this->countryCode WHERE `address_id` = :addressId";
		$STMT = self::connection->prepare($SQL);
		$STMT->execute(["person_id" => $this->personId, "description" => $this->description,
		"street" => $this->streetAddress, "province" => $this->province, "postal_code" => $this->postalCode, 
	   	"country_code" => $this->countryCode]);
	}

	public function getAllAddresses() {
		$SQL = "SELECT * FROM Address;";
		$STMT = self::$connection->query($SQL);
		$STMT = setFetchMode(\PDO::FETCH_OBJ);
		return $STMT->fetchAll();
	}

	public function getAddress($addressId) {
		$SQL = "SELECT * FROM Address WHERE address_id = :addressId;";
		$STMT = self::$connection->prepare($SQL);
		$STMT->execute(['address_id' => $this->:addressId]);
		$STMT->setFetchMode(\PDO::FETCH_OBJ);
		return $STMT->fetch();
	}

}

?>