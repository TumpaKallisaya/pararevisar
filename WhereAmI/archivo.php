<?php
 
	DEFINE ('DBUSER', 'YourDatabaseUserName');
	DEFINE ('DBPW', 'YourPassword');
	DEFINE ('DBHOST', 'YourDatabaseHost');
	DEFINE ('DBNAME', 'YourDatabaseName');
	 
	$dbc = mysqli_connect(DBHOST,DBUSER,DBPW);
	if (!$dbc) {
	    die("La conexion con la base de datos fallo: " . mysqli_error($dbc));
	    exit();
	}
	 
	$dbs = mysqli_select_db($dbc, DBNAME);
	if (!$dbs) {
	    die("Select en la base de datos fallo: " . mysqli_error($dbc));
	    exit();
	}
	 
	$Latitud = mysqli_real_escape_string($dbc, $_GET['latitud']); 
	$Longitud = mysqli_real_escape_string($dbc,$_GET['longitud']);
	 
	$query = "INSERT INTO nombreTabla (latitud, longitud) VALUES ('$Latitud', '$Longitud')";
	 
	$result = mysqli_query($dbc, $query) or trigger_error("Query MySQL Error: " . mysqli_error($dbc));
	 
	mysqli_close($dbc);
	 
	?>
