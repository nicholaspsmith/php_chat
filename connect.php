    <?php
	
	class Connection{
		public function connect(){
		// Connect to the DB
			$dbconnect = array(
				'host' => 'mysql.cs.arizona.edu',
				'username' => 'nicksdb',
				'password' => 'Ros4Prez',
				'dbname' => 'nsmith3_nicksdb'
			);
			
			$db = new PDO('mysql:host=' . $dbconnect['host'] . ';dbname='.$dbconnect['dbname'], $dbconnect['username'], $dbconnect['password']);
	
			return $db;
		}
	}	
?>