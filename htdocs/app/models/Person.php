<?php

class Person {

	private $personId;
	private $firstName;
	private $lastName;
	private $note;

	public function __construct() {
		parent::__construct();
	}

	public function insertPerson() {
		$SQL = "INSERT INTO Person(`first_name`, `last_name`, `note`) VALUES (:firstName, :lastName, :note)";
		$STMT = self::$connection->prepare($SQL);
		$STMT->execute(["first_name" => $this->firstName, "last_name" => $this->lastName, "note" => $this->notes]);
	}

	public function deletePerson($personId) {
		$SQL = "DELETE FROM Person WHERE person_id = :personId";
		$STMT = self::$connection->prepare($SQL);
		$STMT->execute(["person_id" => $personId]);
	}

	public function updatePerson() {
		$SQL = "UPDATE Person SET `first_name` = :firstName, `last_name` = :lastName, `notes` = :note";
		$STMT = self::$connection->prepare($SQL);
		$STMT->execute(["first_name" => $this->firstName, "last_name" => $this->lastName, "notes" => $this->note]);
	}

	public function getAllPeople() {
		$SQL = "SELECT * FROM Person;";
		$STMT = self::$connection->query($SQL);
		$STMT->setFetchMode(\PDO::FETCH_OBJ);
		return $STMT->fetchAll();
	}

	public function getPerson($personId) {
		$SQL = "SELECT * FROM Person WHERE person_id = :personId";
		$STMT = self::$connection->prepare($SQL);
		$STMT->execute(["person_id" => $this->personId]);
		$STMT->setFetchMode(\PDO::FETCH_OBJ);
		return $STMT->fetch();
	}
}

?>