<?php

namespace app\models;

class Person extends \app\core\Model{
	
	public $personId;
	public $firstName;
	public $lastName;
	public $note;

	public function __construct() {
		parent::__construct();
	}

	public function getPersonId() {
		return $this->personId;
	}

	public function getFirstName() {
		return $this->firstName;
	}

	public function setFirstName($newFirstName) {
		$this->firstName = $newFirstName;
	}

	public function getLastName() {
		return $this->lastName;
	}

	public function setLastName($newLastName) {
		$this->lastName = $newLastName;
	}

	public function getNote() {
		return $this->note;
	}

	public function setNote($newNote) {
		return $this->note = $newNote;
	}

	public function insertPerson() {
		$SQL = 'INSERT INTO Person(`first_name`, `last_name`, `notes`) VALUES (:firstName, :lastName, :note)';
		$STMT = self::$connection->prepare($SQL);
		// keys inside array are object variables.
		$STMT->execute(['firstName' => $this->firstName, 'lastName'=>$this->lastName, 'note'=>$this->note]);
	}

	public function deletePerson($personId) {
		$SQL = "DELETE FROM Person WHERE person_id = :personId";
		$STMT = self::$connection->prepare($SQL);
		$STMT->execute(["personId" => $personId]);
	}

	// public function update(){//update an animal record
    //     $SQL = 'UPDATE animal SET species=:species,colour=:colour WHERE animal_id = :animal_id';
    //     $STMT = self::$_connection->prepare($SQL);
    //     $STMT->execute(['species'=>$this->species,'colour'=>$this->colour,'animal_id'=>$this->animal_id]);//associative array with key => value pairs
    // }

	public function getAllPeople() {
		$SQL = "SELECT * FROM Person";
		$STMT = self::$connection->query($SQL);
		$STMT->setFetchMode(\PDO::FETCH_OBJ);
		return $STMT->fetchAll();
	}

	public function getPerson($personId) {
		$SQL = "SELECT * FROM Person WHERE person_id = :personId";
		$STMT = self::$connection->prepare($SQL);
		// keys inside array are object variables.
		$STMT->execute(["personId" => $personId]);
		$STMT->setFetchMode(\PDO::FETCH_OBJ);
		return $STMT->fetch();
	}
}

?>