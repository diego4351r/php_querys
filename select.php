<?php
if (isset($_POST['submit'])) {

	try
	{
		//datos de la conexión
		$servidor = 'localhost';
		$dbname = 'nombreBD';
		$user = 'root';
		$password = 'password';
		
		//conexion a mysql
		$dsn = "mysql:host=localhost;dbname=$dbname";
		$dbh = new PDO($dsn, $user, $password);
		
		//Gestion de errores
		$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		// prepare the query
		$sql = "SELECT
				*
				FROM 
				table
				WHERE
				id - :id";

		// execute query
		$stmt = $dbh->query($sql);

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
