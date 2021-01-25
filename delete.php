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
		$dbh->setAttribute(PDO::ATTRR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// prepare the query
		$sql = "DELETE FROM table WHERE id = :id";

		// bind date to the query
		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(':id', $sId);
		
		// execute query
		$result = $stmt->execute();

		// print message on success
		if($result) {
			echo "<br>Removed... ok";
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
