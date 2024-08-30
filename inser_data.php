<?php 
// Include the database connection file
include 'dbcon.php';

// Check if the form is submitted
if (isset($_POST['add_users'])) {
    // Get user input from form fields
    $u_name = $_POST['u_name'];
    $email = $_POST['email'];

    // Check if the username field is empty
    if ($u_name == "" || empty($u_name)) {
        // Redirect back to the form with a message if the username is not provided
        header('location:index.php?message=Fill out the form!');
    } else {
        // Prepare the SQL query to insert user data into the database
        $query = "INSERT INTO `users` (`username`, `email`) VALUES ('$u_name', '$email')";

        // Execute the query
        $result = mysqli_query($connection, $query);

        // Check if the query execution was successful
        if (!$result) {
            // If the query fails, display an error message
            die("Query Unsuccessful: " . mysqli_error($connection));
        } else {
            // If the query is successful, redirect to the index page with a success message
            header('location:index.php?insert_msg=Your data has been added!');
        }
    }
}
?>
