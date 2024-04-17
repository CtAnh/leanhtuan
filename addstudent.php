<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <div class="form-row">
    <a href="StudentList.php">Back to StudentList Form</a>
</div>
<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        caption {
            font-size: 1.2em;
            font-weight: bold;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            text-align: center;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }

        #AddStudent {
            width: 400px;
            margin: 20px auto;
            font-family: Arial, sans-serif;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
        }

        fieldset {
            border: none;
            padding: 0;
            margin: 0;
        }

        legend {
            font-size: 20px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        .form-row {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="submit"],
        input[type="reset"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <!-- Your PHP code here -->
</body>
</html>

</head>
    <body>
        <?php
include "db_conn.php";
        $sql = "SELECT * FROM students";
        //Executing query
        $result = mysqli_query($conn,$sql);
        ?>

        <table align="center" border="1px" cellpadding="0" cellspacing="0">
        <caption align="center">Student List</caption>
        <tr>
            <th>Roll No</th>
            <th>Student Fullname</th>
            <th>Address</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>

        <?php
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
            {        
        ?>

        
        <tr id="student_<?php echo $row['Rollno']; ?>">
    <td><?php echo $row['Rollno']; ?></td>
    <td><?php echo $row['Sname']; ?></td>
    <td><?php echo $row['Address']; ?></td>
    <td><?php echo $row['Email']; ?></td>
    <td>
        <a href="studentedit.php?id=<?php echo $row['Rollno']; ?>">Edit</a> |
        <a href="#" onclick="deleteStudent(<?php echo $row['Rollno']; ?>)">Delete</a>
    </td>
</tr>
<?php
    }
?>
<!-- Thêm một nút hoặc liên kết để chuyển hướng đến biểu mẫu thêm sinh viên -->
<div class="form-row">
    <input type="button" value="Add New Student" onclick="goToAddForm()">
</div>

<!-- Script JavaScript để xử lý hành động khi nút được nhấp -->
<script>
    // Function để chuyển hướng đến biểu mẫu thêm sinh viên
    function goToAddForm() {
        window.location.href = "addlist.php"; // Đường dẫn đến biểu mẫu thêm sinh viên
    }
</script>

<script>
    // Function to delete student
    function deleteStudent(studentId) {
        if (confirm("Are you sure you want to delete this student?")) {
            // Send delete request via Ajax
            var xhr = new XMLHttpRequest();
            xhr.open("POST", window.location.href, true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    // Remove corresponding row from HTML table
                    var row = document.getElementById('student_' + studentId);
                    row.parentNode.removeChild(row);
                }
            };
            xhr.send("action=delete&student_id=" + studentId);
        }
    }
    </script>
   <?php
// Include database connection file
include "db_conn.php";

// Check if action and student_id are set
if (isset($_POST['action']) && isset($_POST['student_id'])) {
    // Check if the action is delete
    if ($_POST['action'] === 'delete') {
        // Sanitize and validate student ID
        $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
        
        // Prepare a delete statement
        $sql = "DELETE FROM students WHERE Rollno = $student_id";

        // Execute the delete statement
        if (mysqli_query($conn, $sql)) {
            // Return success response
            http_response_code(200);
            echo "Student deleted successfully.";
        } else {
            // Return error response
            http_response_code(500);
            echo "Error deleting student: " . mysqli_error($conn);
        }
    } else {
        // Return error response for invalid action
        http_response_code(400);
        echo "Invalid action.";
    }
} else {
    // Return error response for missing parameters
    http_response_code(400);
    echo "";
}

// Close database connection
mysqli_close($conn);
?>



    
   
