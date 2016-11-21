<html>
	<head>
		<title> add user</title>
	</head>
	<body>
		<?php
			if(isset($_POST['submit'])){
				$data_missing = array();

				if(empty($_POST['username'])){
					$data_missing[]='username';
				}else{
					$uname=trim($_POST['username']);
				}
				if(empty($_POST['password'])){
					$data_missing[]='password';
				}else{
					$pwd=trim($_POST['password']);
				}

				if(empty($data_missing)){
					require_once('../mysqli_connect.php');
					$query = "INSERT INTO user (username, password) VALUES (?, ?)";
					$stmt = mysqli_prepare($dbc, $query);
					mysqli_stmt_bind_param($stmt, "ss", $uname, $pwd);
					mysqli_stmt_execute($stmt);
					$affected_rows = mysqli_stmt_affected_rows($stmt);
					
						if($affected_rows == 1){
							echo 'user entered';
							mysqli_stmt_close($stmt);
							mysqli_close($dbc);
						}else{
							echo 'Error Occured<br>';
							echo mysqli_error();
							mysqli_stmt_close($stmt);
							mysqli_close($dbc);
						}

				}else{
					echo 'You need to enter the following data<br>';
					foreach($data_missing as $missing){
						echo "$missing";
					}
				}	
				
			}
		?>
		<form action="http://localhost:80/user_added.php" method="POST">
			<b> Add a new Student</b>
			<p> User name:
			<input type="text" name="username" size=30 value="" /></p>
			<p> Password:
			<input type="text" name="password" size=30 value="" /></p>
			<p>
				<input type="submit" name="submit" value="send" />
			</p>
		</form>
		
	</body>

</html>