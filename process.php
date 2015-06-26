<?php
	$_SESSION['user_id'] = 'admin';
	if (isset($_POST['submit'])) {
		//db connection
		include 'conn.php';
		
		//load config
		$fields = json_decode(file_get_contents('config.json'));
		
		$data = array();
		foreach ($fields as $field) {
			$data[] = array($field->name=>$_POST[$field->name]);
		}
		$q = mysqli_query($conn,"INSERT INTO mark (image_name,user_id,data) VALUES ('".$_POST['image_name']."','".$_SESSION['user_id']."','".json_encode($data)."')");
	}
	header('location: submit.php');
?>