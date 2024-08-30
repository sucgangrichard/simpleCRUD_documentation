<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Specifies the document type and language -->
    <meta charset="UTF-8">
    <!-- Sets the character encoding for the document to UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Ensures the page is responsive on all devices -->
    <title>Document</title>
    <!-- Title of the webpage -->

    <!-- Links to the Bootstrap CSS file hosted on CDN for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Links to an external stylesheet for additional custom styling -->
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <!-- Includes PHP file for database connection -->
    <?php include('dbcon.php'); ?>

    <!-- Main title of the page -->
    <h1 id="main_title">CRUD APPLICATION</h1>
    <div class="container">
        <!-- Container for holding all content -->

        <div class="box1">
            <!-- Section for displaying all users and adding new users -->
            <h2>ALL USERS</h2>
            <!-- Button to open the modal for adding users -->
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">ADD USERS</button>
        </div>

        <!-- Table to display all users' data -->
        <table class="table table-hover table-bordered table-striped">
            <thead>
                <!-- Table header row -->
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetches all users from the database
                $query = "select * from `users`";
                $result = mysqli_query($connection, $query);

                // Checks for query failure and outputs an error message
                if (!$result) {
                    die("Query Failed" . mysqli_error());
                } else {
                    // Loops through each user and displays their data in the table
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <!-- Update button with a link to the update page -->
                            <td><a href="update_page_1.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Update</a></td>
                            <!-- Delete button with a link to the delete page -->
                            <td><a href="delete_page.php?id=<?php echo $row['id']; ?>" class="btn btn btn-danger">Delete</a></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>

        <!-- Display messages for various actions such as insert, update, delete -->
        <?php
        if (isset($_GET['message'])) {
            echo "<h6>" . $_GET['message'] . "</h6>";
        }
        ?>

        <?php
        if (isset($_GET['insert_msg'])) {
            echo "<h6>" . $_GET['insert_msg'] . "</h6>";
        }
        ?>

        <?php
        if (isset($_GET['update_msg'])) {
            echo "<h6>" . $_GET['update_msg'] . "</h6>";
        }
        ?>

        <?php
        if (isset($_GET['delete_msg'])) {
            echo "<h6>" . $_GET['delete_msg'] . "</h6>";
        }
        ?>

        <!-- Modal for adding a new user -->
        <form action="inser_data.php" method="post">
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <!-- Modal title -->
                            <h5 class="modal-title" id="exampleModalLabel">ADD USERS</h5>
                            <!-- Button to close the modal -->
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Form fields for user input -->
                            <form action="">
                                <div class="form-group">
                                    <label for="">Username</label>
                                    <input type="text" name="u_name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" name="email" class="form-control">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <!-- Button to close the modal -->
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <!-- Submit button for adding a new user -->
                            <input type="submit" class="btn btn-primary" name="add_users" value="ADD">
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>

    <!-- Bootstrap JavaScript bundle for interactive components -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
