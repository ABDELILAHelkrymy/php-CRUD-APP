<?php
include "header.php";
include "db_conn.php";

if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    $sql = "INSERT INTO `person`(`id`, `first_name`, `last_name`, `email`, `gender`) VALUES (NULL,'$first_name','$last_name','$email','$gender')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: index.php?msg=Record Inserted Successfully");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
    <div class="container">
        <?php
        if (isset($_GET['msg'])) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> ' . $_GET['msg'] . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }
        ?>
        <a href="add_new.php" class="btn btn-dark mb-3">Add New</a>
        <table class="table table-hover text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "db_conn.php";
                $sql = "SELECT * FROM `person`";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $row['id']; ?></th>
                        <td><?php echo $row['first_name']; ?></td>
                        <td><?php echo $row['last_name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                            <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php
                }
                ?>

            </tbody>
        </table>
    </div>






<?php
include "footer.php";
?>

