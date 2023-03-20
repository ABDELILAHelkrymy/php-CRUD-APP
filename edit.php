<?php
include "header.php";
include "db_conn.php";
$id = $_GET['id'];

if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    $sql = "UPDATE `person` SET `id`='$id',`first_name`='$first_name',`last_name`='$last_name',`email`='$email',`gender`='$gender' WHERE id=$id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: index.php?msg=User Updated Successfully");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>


    <div class="container">
        <div class="text-center mb-4">
            <h3>Edit user Informations</h3>
            <p class="text-muted">Click update after chaging any information</p>
        </div>

        <?php
        if (isset($_GET['id'])) {
            $sql = "SELECT * FROM person WHERE id = $id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
        }
        ?>
        <div class="container d-flex justify-content-center">
            <form action="" method="post" class="myForm">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">First Name:</label>
                        <input type="text" class="form-control" name="first_name" value="<?php echo $row['first_name']; ?>">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Last Name:</label>
                        <input type="text" class="form-control" name="last_name" value="<?php echo $row['last_name']; ?>">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Email:</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>">
                    </div>
                </div>
                <div class="form-group mb-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="male" <?php echo $row['gender'] == 'male' ? "checked" : "" ?>>
                        <label class="form-check-label" for="male">M</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="female" <?php echo $row['gender'] == 'female' ? "checked" : "" ?>>
                        <label class="form-check-label" for="female">F</label>
                    </div>
                </div>

                <div>
                    <button type="submit" class="btn btn-dark" name="submit">Update</button>
                    <a href="index.php" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>

<?php
include "footer.php";
?>
