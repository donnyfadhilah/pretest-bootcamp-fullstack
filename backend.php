<?php 
		$hostname = 'localhost';
        $username = 'root';
        $password = '';
        $dbname   = 'magang';
        $conn = mysqli_connect($hostname, $username, $password, $dbname);
      
            if(isset($_GET['user']) && $_GET['user'] != '' && isset($_GET['pass']) && $_GET['pass'] != ''){

				$user = $_GET['user'];
				$pass = $_GET['pass'];

				$cek = "SELECT * FROM 'user_db' WHERE 'user'='".$user."'
        and 'pass'='".$pass."'";

        $result = mysqli_query($conn, $cek);

        $userId = "";
        while ($row = mysqli_fetch_row($result)) {
            $userId = $ow[0];
        }

        if ($result->num_rows > 0) {
            $resp["status"] = "1";
            $resp["id"] = $userid;
            $resp["message"] = "Login successfully";

        } else {
            $resp["status"] = "0";
            $resp["message"] = "user dan pass tidak ditemukan"; 
        } 
    }else {
            $resp["status"] = "-1";
            $resp["message"] = "masukan user dan pass.";
    
        }
    
        header('content-Type: application/json');
        $response['response']=$resp;
        echo json_encode($response);

        @mysqli_close($conn);

		?>
