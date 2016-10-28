<?php
Class update_user {
	private $db;
 	function __construct($db) {
    	$this->db = $db;
  	}

  	function selectQuery()
  	{
    	$query = "SELECT name, email FROM users WHERE id = :user_id LIMIT 1";
    	$stmt = $this->db->prepare($query);
    	$stmt->bindParam(':user_id', $_SESSION['user_id']);
    	$stmt->execute();

    	while($row = $stmt->fetch())
    	{
      		return array('name' => $row['name'], 'email' => $row['email']);
    	}
	}
} 
?>