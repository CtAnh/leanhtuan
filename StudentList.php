        
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="stylestudent.css">
    <style>
        /* Add any additional styles here */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .sidebar {
            background-color: #333;
            color: #fff;
            padding: 20px;
        }

        .dropdown-toggle {
            cursor: pointer;
            color: #fff;
            font-weight: bold;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #333;
            min-width: 120px;
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            padding: 12px 16px;
            display: block;
            color: #fff;
            text-decoration: none;
            text-align: center;
        }

        .dropdown-content a:hover {
            background-color: #555;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .container {
            flex: 1;
            padding: 20px;
        }

        .container h1 {
            margin-bottom: 20px;
            text-align: center;
        }

        .search-bar {
            text-align: center;
            margin-bottom: 20px;
        }

        .search-input {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 300px;
            box-sizing: border-box;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
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

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Student List</title>
    
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
     
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <link rel="stylesheet" href="stylestudent.css">
</head>
<body>
    <div class="sidebar">
        <div class="dropdown">
            <div class="dropdown-toggle" onclick="toggleDropdown()">
                User
            </div>
            <div class="dropdown-content" id="dropdown-content">
               
                <a href="logout.php" onclick="return confirm('Are you sure you want to logout?')">Logout</a>
            </div>
        </div>
    </div>
    <div class="container">
        <h1>Student List</h1>
        <<div class="search-bar">
    <input type="text" class="search-input" placeholder="Search..." onkeyup="searchFunction()">
</div>
        <table align="center" border="1px" cellpadding="5" cellspacing="0" id="studentTable">
            <thead>
                <tr>
                    <th>Roll No</th>
                    <th>Student Full Name</th>
                    <th>Address</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "db_conn.php";
                $sql = "SELECT * FROM students";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($result)) {        
                ?>
                <tr>
                    <td><?php echo $row['Rollno']; ?></td>
                    <td><?php echo $row['Sname']; ?></td>
                    <td><?php echo $row['Address']; ?></td>
                    <td><?php echo $row['Email']; ?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <script>
        function searchFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.querySelector(".search-input");
            filter = input.value.toUpperCase();
            table = document.getElementById("studentTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        function toggleDropdown() {
            var dropdownContent = document.getElementById("dropdown-content");
            dropdownContent.classList.toggle("show");
        }
        window.onclick = function(event) {
if (!event.target.matches('.dropdown-toggle')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }

    </script>
</body>
</html>
        </form>
    <a href="addstudent.php">
    <button> Edit
    </button
</a>
    <script>
document.addEventListener("DOMContentLoaded", function() {
    var redirectButton = document.getElementById('redirectButton');
    redirectButton.addEventListener('click', function() {
        window.location.href = 'addstudent.php';
    });
});

</script>
    </body>
    </html>

    
    
