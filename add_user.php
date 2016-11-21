<html>
	<head>
		<title> add user</title>
	</head>
	<body>
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