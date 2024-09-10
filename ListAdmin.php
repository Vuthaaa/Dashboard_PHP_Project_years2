<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Scheduling</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .navbar {
            margin-bottom: 20px;
        }

        .sidebar {
            height: 100vh;
            position: fixed;
            background-color: #f8f9fa;
            padding-top: 20px;
        }

        .sidebar .nav-link {
            font-size: 1.1rem;
            color: #333;
            padding: 10px 20px;
        }

        .sidebar .nav-link:hover {
            background-color: #e9ecef;
            color: #007bff;
        }

        .sidebar .nav-link.active {
            background-color: #007bff;
            color: #fff;
        }

        .employee-info {
            display: flex;
            align-items: center;
        }

        .employee-info img {
            border-radius: 50%;
            margin-right: 10px;
            height: 50px;
            width: 50px;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .shift {
            background-color: #e3f2fd;
            color: #0d47a1;
            border-radius: 4px;
            padding: 5px;
            cursor: grab;
            margin: 5px 0;
            text-align: center;
        }

        .shift.cna {
            background-color: #e1bee7;
            color: #4a148c;
        }

        .shift.rn {
            background-color: #ffcc80;
            color: #e65100;
        }

        .footer {
            margin-top: 20px;
        }

        .footer table {
            width: 100%;
            border-collapse: collapse;
        }

        .footer th,
        .footer td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }

        @media (max-width: 767.98px) {
            .sidebar {
                height: auto;
                position: relative;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">ABC Nursing & Rehab</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Dashboard <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">People</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Actions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Reports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Company</a>
                </li>
            </ul>
            <div class="dropdown">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    John Smith
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="#">Settings</a>
                    <a class="dropdown-item" href="#">Logout</a>
                </div>
            </div>
        </div>
    </nav> -->

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link " href="test.php"><i class="fas fa-tachometer-alt"></i> LIst Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="ListAdmin"><i class="fas fa-money-check-alt"></i> List Admin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=""><i class="fas fa-money-check-alt"></i> Home Page</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-briefcase"></i> Benefits</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-user-check"></i> Attendance</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-calendar-alt"></i> Scheduling</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-users"></i> Employee</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-envelope-open"></i> Requests</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="EmployeeManage.php"><i class="fas fa-tools"></i>ManageEmployee</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-user-cog"></i> ESS Admin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-share-alt"></i> Path Share</a>
                        </li> -->
                    </ul>
                </div>
            </nav>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">List admin</h1>
                </div>
                <h5>Add New Users <a href="adminRegister.php">Add New Admin</a>.</h5>	
                <div class="schedule">
                <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Admin</th>
                            </tr>
                        </thead>
                        <tbody id="employeeTable">
                            <?php

                                $db = mysqli_connect("localhost", "root", "", "stock_managment");
                                $query = "SELECT * FROM Users ";
                                $result = mysqli_query($db, $query);
                                while( $row = mysqli_fetch_array($result,MYSQLI_ASSOC) ) {
                                    echo"<br>";
                                    echo "<tr>";
                                    echo "<td>" . $row['id'] . "</td>";
                                    echo "<td>" . $row['first_name'] . "</td>";
                                    echo "<td>" . $row['last_name'] . "</td>";
                                    echo "<td>" . $row['email'] . "</td>";
                                    echo "<td>" . $row['password'] . "</td>";
                                     echo "<td><a href=\"adEdit.php?id=$row[id]\">Edit</a> | 
      <a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                                  // echo "<td>" . implode(", ", $employee['password']) . "</td>";
                                    echo "</tr>";

                                }

                            ?>
                        </tbody>
                    </table>
                </div>

                <!-- <footer class="footer">
                    <table>
                        <thead>
                            <tr>
                                <th>Period</th>
                                <th>Day</th>
                                <th>Start</th>
                                <th>End</th>
                                <th>Hours</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Monday</td>
                                <td>8:00 AM</td>
                                <td>4:00 PM</td>
                                <td>8</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Tuesday</td>
                                <td>8:00 AM</td>
                                <td>4:00 PM</td>
                                <td>8</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Wednesday</td>
                                <td>8:00 AM</td>
                                <td>4:00 PM</td>
                                <td>8</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Thursday</td>
                                <td>8:00 AM</td>
                                <td>4:00 PM</td>
                                <td>8</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Friday</td>
                                <td>8:00 AM</td>
                                <td>4:00 PM</td>
                                <td>8</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Saturday</td>
                                <td>8:00 AM</td>
                                <td>4:00 PM</td>
                                <td>8</td>
                            </tr>
                        </tbody>
                    </table>
                </footer> -->
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
