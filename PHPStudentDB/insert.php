<?php 
include('db.php'); 

$successMessage = ""; // Variable to hold the success message

if (isset($_POST['submit'])) { 
    $name = $_POST['name']; 
    $email = $_POST['email']; 
    $phone = $_POST['phone']; 
    $course = $_POST['course']; 

    // Insert query 
    $sql = "INSERT INTO students (name, email, phone, course) VALUES ('$name', '$email', '$phone', '$course')"; 

    if ($conn->query($sql) === TRUE) { 
        $successMessage = "New record created successfully.";
    } else { 
        echo "Error: " . $sql . "<br>" . $conn->error; 
    } 
} 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New Student</title>
    <link rel="stylesheet" type="text/css" href="style.css"> <!-- Aurora Theme CSS -->
    <style>
        /* Popup Notification Styling */
        .popup {
            visibility: hidden;
            background-color: #4CAF50;
            color: white;
            text-align: center;
            border-radius: 5px;
            padding: 15px;
            position: fixed;
            z-index: 1;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%); /* Centering */
            font-size: 17px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .show {
            visibility: visible;
            animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }

        @keyframes fadein {
            from {opacity: 0;} 
            to {opacity: 1;}
        }

        @keyframes fadeout {
            from {opacity: 1;} 
            to {opacity: 0;}
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Add New Student</h1>
        <form method="post">
            Name: <input type="text" name="name" required><br><br>
            Email: <input type="email" name="email" required><br><br>
            Phone: <input type="text" name="phone"><br><br>
            Course: <input type="text" name="course" required><br><br>
            <input type="submit" name="submit" value="Add Student" class="button">
        </form>
        <br>
        <a href="display.php" class="button">View Students</a> <!-- View Students Button -->
    </div>

    <!-- Popup Notification -->
    <div id="successPopup" class="popup"><?php echo $successMessage; ?></div>

    <script>
        // Display popup notification if there's a success message
        window.onload = function() {
            var successMessage = "<?php echo $successMessage; ?>";
            if (successMessage) {
                var popup = document.getElementById("successPopup");
                popup.classList.add("show");
                // Hide the popup after 3 seconds
                setTimeout(function(){ 
                    popup.classList.remove("show");
                }, 3000);
            }
        };
    </script>
</body>
</html>
