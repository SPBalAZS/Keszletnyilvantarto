<?php
    $server = new Server();

	if(isset($_POST['getData'])){
		$sql = $_POST['sql'];
		$data = $server->getData($sql);
		echo json_encode($data);
	}
	if(isset($_POST['submit_insert'])){
		$name = $_POST['name'];
		$id_worker = $_POST['id_worker'];
		$condition = $_POST['condition'];
		$date = $_POST['date'];	

		$server->insertData("INSERT INTO Devices (name, id_worker, device_condition, date) VALUES('$name','$id_worker','$condition','$date')");
		echo "<script>alert('Adatok sikeresen feltöltve');</script>";
		header("Refresh:0; url=index.html");
	}



    class Server{
		private $db;
		private $sql;

		function __construct() {
            define('DB_SERVER', 'localhost');
            define('DB_USERNAME', 'root');
            define('DB_PASSWORD', '');
            define('DB_DATABASE', 'test');
            
            $this->db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
            
            if ($this->db->connect_error) {
                die("Connection failed: " . $this->db->connect_error);
            }
        }

		public function getData($sql){
			//echo '<script type="text/javascript">alert("'.$sql.'");</script>';
			$this->sql = $sql;
			$result = mysqli_query($this->db,$this->sql);
			$container = [];
			if ($result->num_rows > 0){
				while($data = mysqli_fetch_assoc($result)){
					$container[] = $data;

				}
				return $container;
			}
		}

        public function insertData($sql){
			$this->sql = $sql;
			if ($this->db->query($this->sql) === true) {
			} else {
				echo "Error: ".$this->db->error;
			}
        }
    }
?>

