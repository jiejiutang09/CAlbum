<?php
	require_once('config.php');
?>
<?php
	class Database
	{
		private $log;
		private $dbh;
		public function __construct()
		{
			$dsn='mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset='.DB_CHAR;
			try
			{
				$this->dbh = new PDO($dsn,DB_USER,DB_PASS);
				$this->log = array(0=>true,1=>'Connection Successful');
			}
			catch(PDOException $e)
			{
				$this->log = array(0=>false,1=>'Database Connect Failed',2=>$e->getMessage());
			}
		}
		public function getLog()
		{
			return $this->log;
		}
		public function clearLog()
		{
			$this->log = null;
		}

		//SELECT method
		public function get($table_name, $field_name, $condition_field, $condition_value)
		{
			if(is_array($field_name))
			{
				$sql = 'SELECT ';
				foreach($field_name as $v)
					$sql .= $v.',';
				$sql = substr($sql,0,-1);
				$sql .= ' FROM '.$table_name.' WHERE '.$condition_field.'=:cv';
			}
			else
			{
				$sql = 'SELECT '.$field_name.' FROM '.$table_name.' WHERE '.$condition_field.'=:cv';
			}

			$sth = $this->dbh->prepare($sql, array(PDO::ATTR_CURSOR=> PDO::CURSOR_FWDONLY));
			$sth->bindParam(':cv',$condition_value);
			if(!$sth->execute())
			{
				$this->log = array(0=>false, 1=>'Get Error', 2=>$sth->errorInfo());
				return false;
			}
			$this->log = array(1=>true, 2=>'Get data successfully');
			return $sth->fetch(PDO::FETCH_ASSOC);
		}
		public function getCount($table_name, $condition_field, $condition_value)
		{
			$sql = 'SELECT * FROM '.$table_name.' WHERE '.$condition_field.'=:cv';
			$sth = $this->dbh->prepare($sql, array(PDO::ATTR_CURSOR=> PDO::CURSOR_FWDONLY));
			$sth->bindParam(':cv',$condition_value);
			if(!$sth->execute())
			{
				$this->log = array(0=>false, 1=>'Get Error', 2=>$sth->errorInfo());
				return false;
			}
			$this->log = array(1=>true, 2=>'Get data successfully');
			return $sth->rowCount();
		}

		//INSERT INTO method
		public function create($table_name, $field, $value)
		{
			if (is_array($field))
			{
				$sql = 'INSERT INTO '.$table_name.' (';
				foreach($field as $v)
					$sql .= $v.',';
				$sql = substr($sql, 0, -1);
				$sql .= ') VALUES (';
				foreach($field as $v)
					$sql .= ':'.$v.',';
				$sql = substr($sql, 0, -1);
				$sql .= ')';
			}
			else
			{
				$sql = 'INSERT INTO '.$table_name.'('.$field.') VALUES (:'.$field.')';
			}


			$sth = $this->dbh->prepare($sql, array(PDO::ATTR_CURSOR=> PDO::CURSOR_FWDONLY));
			if(is_array($value))
				foreach($field as $k=>$v)
					$sth->bindParam(':'.$v, $value[$k]);
			else
				$sth->bindParam(':'.$field,$value);

			if(!$sth->execute())
			{
				$this->log = array(0=>false, 1=>'Create Error', 2=>$sth->errorInfo());
				return false;
			}
			$this->log = array(0=>true, 1=>'Create data successfully');
			return true;
		}

		//UPDATE method
		public function modify($table_name, $field, $value, $condition_field, $condition_value)
		{
			if(is_array($field))
			{
				$sql = 'UPDATE '.$table_name.' SET ';
				foreach($field as $v)
					$sql .= $v.'=:'.$v.',';
				$sql = substr($sql, 0, -1);
				$sql .= ' WHERE '.$condition_field.'=:cv';
			}
			else
			{
				$sql = 'UPDATE '.$talbe_name.' SET '.$field.'=:'.$field.' WHERE '.$condition_field.'=:cv';
			}


			$sth = $this->dbh->prepare($sql, array(PDO::ATTR_CURSOR=>PDO::CURSOR_FWDONLY));
			if(is_array($value))
				foreach($field as $k=>$v)
				$sth->bindParam(':'.$v, $value[$k]);
			else
				$sth->bindParam(':'.$field, $value);
			$sth->bindParam(':cv',$condition_value);

			if(!$sth->execute())
			{
				$this->log = array(0=>false, 1=>'Modify Error', 2=>$sth->errorInfo());
				return false;
			}
			$this->log = array(0=>true, 1=> 'Modify data successfully');
			return true;
		}

		//DELETE method
		public function del($table_name, $condition_field, $condition_value)
		{
			$sql = 'DELETE FROM '.$table_name.' WHERE '.$condition_field.'=:cv';

			$sth = $this->dbh->prepare($sql, array(PDO::ATTR_CURSOR=>PDO::CURSOR_FWDONLY));
			$sth->bindParam(':cv',$condition_value);

			if(!$sth->execute())
			{
				$this->log = array(0=>false, 1=>'Delete Error', 2=>$sth->errorInfo());
				return false;
			}
			$this->log = array(0=>true, 1=> 'Delete data successfully');
			return true;
		}
	}
?>