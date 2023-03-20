<?php
include "db_conn.php";


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM `person` WHERE id=$id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: index.php?msg=User Deleted Successfully");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>