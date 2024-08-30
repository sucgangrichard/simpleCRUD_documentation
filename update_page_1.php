<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Specifies the character set for the HTML document -->
    <meta charset="UTF-8">
    <!-- Sets the viewport for responsive design -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title of the HTML document -->
    <title>Document</title>
    <!-- Link to Bootstrap CSS for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Link to custom CSS file -->
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php include('dbcon.php'); ?> <!-- Include the database connection file -->

<!-- Main title of the page -->
<h1 id="main_title">CRUD UPDATE APPLICATION</h1>

<!-- Bootstrap container for layout -->
<div class="container">

<?php 
// Check if an 'id' is passed in the URL query string
if(isset($_GET['id'])){
    $id = $_GET['id']; // Store the 'id' value from the URL query string

    // Query to select the user data from the 'users' table based on the given 'id'
    $query = "select * from `users` where `id` = '$id'";
    $result = mysqli_query($connection, $query); // Execute the query

    // Check if the query execution failed
    if (!$result) {
        die("Query Failed".mysqli_error()); // Display error message if query fails
    } else {
        $row = mysqli_fetch_assoc($result); // Fetch user data as an associative array
    }
}
?>

<?php 
// Check if the 'update_users' form has been submitted
if(isset($_POST['update_users'])){  

    // Check if a new 'id' is passed in the URL query string
    if(isset($_GET['id_new'])){
        $idnew = $_GET['id_new']; // Store the 'id_new' value from the URL query string
    }

    // Retrieve form data for 'username' and 'email'
    $u_name = $_POST['u_name'];
    $email = $_POST['email'];

    // Query to update the user's data in the 'users' table
    $query = "update `users` set `username` = '$u_name', `email` = '$email' where `id` = '$idnew'";
    $result = mysqli_query($connection, $query); // Execute the update query

    // Check if the query execution failed
    if(!$result) {
        die("Query Failed".mysqli_error()); // Display error message if query fails
    } else {
        header('location:index.php?update_msg=Update Successfully'); // Redirect to 'index.php' with success message
    }
}
?>

<!-- Form for updating user information -->
<form action="update_page_1.php?id_new=<?php echo $id; ?>" method="post">
    <div class="form-group">
        <label for="">Username</label>
        <!-- Input field for the 'username' -->
        <input type="text" name="u_name" class="form-control" value = "<?php echo $row['username']?>">
    </div>
    <div class="form-group">
        <label for="">Email</label>
        <!-- Input field for the 'email' -->
        <input type="text" name="email" class="form-control" value = "<?php echo $row['email']?>">
    </div>
    <!-- Submit button to update user information -->
    <input type="submit" class="btn btn-primary" name="update_users" value="UPDATE">
</form>

</div> <!-- End of container div -->

</body>
</html>
