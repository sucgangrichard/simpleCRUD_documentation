<?php 

// Define constants for the database connection parameters
define("HOSTNAME", "localhost"); // The hostname of the database server
define("USERNAME", "root"); // The username for the database
define("PASSWORD", ""); // The password for the database (empty in this case)
define("DATABASE", "cruddb"); // The name of the database to connect to

// Establish a connection to the database using the defined parameters
$connection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);

// Check if the connection was successful
if(!$connection){
    // If the connection failed, display an error message and stop execution
    die("Connection Failed");
}

?>
