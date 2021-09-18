<?php

class Picture {

	private $pictureId;
	private $personId;
	private $fileName;
	private $description;

	public function __construct() {
		parent::__construct();
	}

	public function insertPicture() {
		$SQL = "INSERT INTO Picture(`person_id`, `description`) VALUES (:personId, :description);";
		$STMT = self::$connection->prepare($SQL);
		$STMT->execute(["person_id" => $this->personId, "description" => $this->description]);
	}

	public function deletePicture($pictureId) {
		$SQL = "DELETE FROM Picture WHERE picture_id = :pictureId"
		$STMT = self::$connection->prepare($SQL);
		$STMT->execute(["picture_id" => $pictureId]);
	}

	public function updatePicture() {
		$SQL = "UPDATE Picture SET `description` = :description WHERE picture_id = :pictureId";
		$STMT = self::$connection->prepare($SQL);
		$STMT->execute(["description" => $this->description, "picture_id" => $this->pictureId]);
	}

	public function getAllPicture() {
		$SQL = "SELECT * FROM Picture;";
		$STMT = self::$connetion->query($SQL);
		$STMT->setFetchMode(\PDO::FETCH_OBJ);
		return $STMT->fetchAll();
	}

	public function getPicture($pictureId) {
		$SQL = "SELECT * FROM Picture WHERE picture_id = :pictureId;";
		$STMT = self::$connection->prepare($SQL);
		$STMT->setFetchMode(\PDO::FETCH_OBJ);
		return $STMT->fetch();
	}
}

?>