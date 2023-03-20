<?php
include "header.php";
include "db_conn.php";

if(isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    $sql = "INSERT INTO `person`(`id`, `first_name`, `last_name`, `email`, `gender`) VALUES (NULL,'$first_name','$last_name','$email','$gender')";

    $result = mysqli_query($conn, $sql);

    if($result) {
        header("Location: index.php?msg=Record Inserted Successfully");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>


    <div class="container">
        <div class="text-center mb-4">
            <h3>Add New User</h3>
            <p class="text-muted">Complete the form below to add w new user</p>
        </div>
        <div class="container d-flex justify-content-center">
            <form action="" method="post" class="myForm">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">First Name:</label>
                        <input type="text" class="form-control" name="first_name" placeholder="Your First Name">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Last Name:</label>
                        <input type="text" class="form-control" name="last_name" placeholder="Your Last Name">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Email:</label>
                        <input type="email" class="form-control" name="email" placeholder="name@exemple.com">
                    </div>
                </div>
                <div class="form-group mb-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                        <label class="form-check-label" for="male">M</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                        <label class="form-check-label" for="female">F</label>
                    </div>
                </div>

                <div>
                    <button type="submit" class="btn btn-dark" name="submit">Save</button>
                    <a href="index.php" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>

<?php
include "footer.php";
?>