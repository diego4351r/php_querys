<?php
if (isset($_POST['submit'])) {

	try
	{
    //datos de la conexión
    $servidor = 'localhost';
    $dbname = 'nombreBD';
    $user = 'usuario';
		$password = 'password';
		
		//conexion a mysql
		$dsn = "mysql:host=localhost;dbname=$dbname";
		$dbh = new PDO($dsn, $user, $password);
		
		//Gestion de errores
		$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			
		// prepare the query
		$sql = "INSERT INTO 
				table
				(title, message) 
				VALUES 
				(:title, :message)";

		// bind date to the query
		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(':title',$sTitle, PDO::PARAM_STR);
		$stmt->bindParam(':message', $sMessage, PDO::PARAM_STR);
		
		// execute query
		$result = $stmt->execute();

		// print message on success
		if($result) {
			echo "<br>Added... ok";
		}
	}
	catch(PDOException $e)
	{
		echo '<pre>';
		echo 'Line: '.$e->getLine().'<br>';
		echo 'File: '.$e->getFile().'<br>';
		echo 'Message: '.$e->getMessage();
		echo '</pre>';
  } finally 
  {
    //cerrar la conexion 
    $dbh = null;
    
  }
}
