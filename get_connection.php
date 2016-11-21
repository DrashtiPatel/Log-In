<?php
require_once('../mysqli_connect.php');
$query = "SELECT username, password FROM user";
$response = @mysqli_query($dbc, $query);
if($response){
	
	echo '<table align="left" cellspacing="5" cellpadding="8>
	<tr><td align="left"><b>Username </b></td>
	<td align="left"><b>Password</b></td></tr>';
	while($row = mysqli_fetch_array($response)){
		echo '<tr><td align="left">'.
		$row['username'].'</td><td align="left">'.
		$row['password'].'</td>';

		echo '</tr>';


	}
	echo '</table>';

}else{
	echo "couldn't issue database query<br>";
	echo mysqli_error($dbc);

}
mysqli_close($dbc);
?>