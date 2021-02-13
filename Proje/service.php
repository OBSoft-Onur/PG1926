<?php 

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Headers: X-gelen_dataed-With');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT');

require('db_config.php');

 $data = json_decode(file_get_contents('php://input'), true);
 $service_type = $data["service_type"];



 switch ($service_type) {
 	case 'login':
 		
 		$data_json = $data['login_data'];
		

		$stmt = $pdo->prepare("SELECT * FROM `user` WHERE USERNAME = '".$data_json['username']."' AND PASSWORD= '".$data_json['password']."'");
		$stmt->execute();
		$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		if ($row == NULL) {
			$returnData = false;
			
		} else {
			$returnData = $row;
			
		}

		print_r(json_encode($returnData, JSON_UNESCAPED_UNICODE));

 	break;
 	case 'signup':
 			$data_json = $data['signup_data'];
 			
 			$username = "@".$data_json['fname'].$data_json['lname'];

 			//Bu kullanıcı var mı yok mu test sorgusu
			$sorgu = $pdo->prepare("SELECT * FROM user WHERE EXISTS (SELECT USERNAME FROM user WHERE USERNAME =".$username.")");
			$sorgu->execute();
			$test_data = $sorgu->fetchAll(PDO::FETCH_ASSOC);

			if($test_data != null){
				$row = false;	
				echo 'kullanıcı var';
			}else{
				if ($data_json['pass'] != $data_json['passRepeat']) {
	 				$row = false;
	 				echo 'şifreler aynı değil';
	 			}else{
	 				$stmt = $pdo->prepare("INSERT INTO `user` (`ID`, `USERNAME`, `FNAME`, `LNAME`, `PASSWORD`, `PHONE`) VALUES (NULL,".$username.",".$data_json['fname'].",".$data_json['lname'].",".$data_json['pass'].",".$data_json['phone'].")");
	 				$stmt->execute();
	 				$row = $username;
	 				
	 			}
			}
 			//test sorgu sonu

 			
 			print_r(json_encode($row, JSON_UNESCAPED_UNICODE));
 		break;
 		case 'panic':
 			
 			$user_Id = $data['user_id'];
 			$datenow = date('Y:m:d H:i:s');

 			$sorgu = $pdo->prepare("INSERT INTO panic VALUES(NULL,".$user_Id.",'".$datenow."','location_data')");
			$sorgu->execute();
			$test_data = $sorgu->fetchAll(PDO::FETCH_ASSOC);

 		break;
 	default:
 		
 		print_r("this is the default case");
 		break;
 }




 ?>