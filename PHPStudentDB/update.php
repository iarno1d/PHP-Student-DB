<?php
include('db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM students WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];

    $sql = "UPDATE students SET name='$name', email='$email', phone='$phone', course='$course' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: display.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Student</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="form-container">
        <h1>Update Student</h1>
        <form method="post">
            Name: <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br><br>
            Email: <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br><br>
            Phone: <input type="text" name="phone" value="<?php echo $row['phone']; ?>"><br><br>
            Course: <input type="text" name="course" value="<?php echo $row['course']; ?>" required><br><br>
            <input type="submit" name="update" value="Update Student" class="button">
        </form>
    </div>
</body>
</html>
