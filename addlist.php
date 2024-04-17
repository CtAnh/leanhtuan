<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
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
</table>
<?php
    //Add student
    include "db_conn.php";
    if(isset($_POST['btnAdd']))
    {
        //Get data from student form
        $Rollno = $_POST['Rollno'];
        $Sname = $_POST['Sname'];
        $Address = $_POST['Address'];
        $Email = $_POST['Email'];
        if($Rollno=="" || $Sname=="" || $Address=="" || $Email=="")
        {
            echo "(*) is not empty";
        }
        else
        {
            //Retrieving data from table
            $sql = "select Rollno from students where Rollno='$Rollno'";
            //Executing query
            $result = mysqli_query($conn,$sql);
            //Testing exist data and then insert into table
            if(mysqli_num_rows($result)==0)
            {
                $sql = "INSERT INTO students VALUES ('$Rollno', '$Sname', '$Address', '$Email')";
                mysqli_query($conn,$sql);
                echo '<meta http-equiv="refresh" content="0; URL=StudentList.php"';
            }
            else
            {
                echo "Existed student in list";
            }

        }
    }

    ?>

</table>

        <form method="post" id="AddStudent">
            <fieldset>
                <legend>Adding Student</legend>
                <div class="form-row">
                    <label for="Rollno">Roll No:</label>
                    <input type="text" id="Rollno" name="Rollno" required>
                </div>
                <div class="form-row">
                    <label for="Sname">Student Name:</label>
                    <input type="text" id="Sname" name="Sname" required>
                </div>
                <div class="form-row">
                    <label for="Address">Address:</label>
                    <input type="text" id="Address" name="Address" required>
                </div>
                <div class="form-row">
                    <label for="Email">Student Email:</label>
                    <input type="email" id="Email" name="Email" required>
                </div>
                <div class="form-row">
                    <input type="submit" value="Add" name="btnAdd">
                    <input type="reset" value="Cancel" name="btnCancel">
                </div>

            </fieldset>
            
       <!-- Thêm một nút hoặc liên kết để quay lại biểu mẫu thêm sinh viên -->
<div class="form-row">
    <a href="addstudent.php">Back to Add Student Form</a>
</div>
     
    
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    
</head>
<body>
    <?php
        include "db_conn.php";
        $sql = "SELECT * FROM students";
        // Executing query
        $result = mysqli_query($conn,$sql);
    ?>