<?php

class connectDB{
	const DB_NAME = 'chat.db';
	public $_db;

	function __construct(){
		if(!is_file(self::DB_NAME)){
			$this->_db = new SQLite3(self::DB_NAME);
			
			$sql = "CREATE TABLE chat(
					msgs_ID INTEGER PRIMARY KEY AUTOINCREMENT,
					sender TEXT,
					message TEXT
				)";

			$this->_db->exec($sql) or die($this->_db->lastErrorMsg());

		}else{
			$this->_db = new SQLite3(self::DB_NAME);
		}
	}

	function __destruct(){
		unset($this->_db);
	}

	public function getInfo(){
		return 'sqlite3';
	}

	public function get_msg(){
		$sql = "SELECT * FROM chat ORDER BY 'msgs_ID' DESC";
		$result = $this->_db->exec($sql) or die($this->_db->lastErrorMsg());
		
		$messages = array();
		while ($row = $this->_db->fetch_assoc()){
			$messages[] = array('sender' => $row['sender'],
							'message' => $row['message']);
		}
		return $messages;
	}

	public function send_msg($sender, $message){
		if(!empty($sender) && !empty($message)){
			$sender = $this->_db->real_escape_string($sender);
			$message = $this->_db->real_escape_string($message);

		$sql = "INSERT INTO chat
					VALUES ('$sender', '$message')";

			if($result = $this->_db->exec($query)){
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
}