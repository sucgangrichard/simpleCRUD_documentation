<?php 
// Include the database connection file
include('dbcon.php'); 

// Check if the 'id' parameter is set in the URL
if(isset($_GET['id'])){
    // Store the 'id' parameter from the URL into the variable $id
    $id = $_GET['id'];

    // Create a SQL query to delete the user with the specified 'id' from the 'users' table
    $query = "delete from `users` where `id` = '$id'";

    // Execute the query and store the result in the $result variable
    $result = mysqli_query($connection, $query);

    // Check if the query execution failed
    if(!$result){
        // If the query failed, terminate the script and display an error message
        die("Query Failed".mysqli_error());
    }
    else{
        // If the query was successful, redirect to 'index.php' with a success message
        header('location:index.php?delete_msg=Record deleted successfully.');
    }
}

?>
