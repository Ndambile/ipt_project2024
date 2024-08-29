<?php
include_once '../includes/php/header.php';

$lecturerRow = $_SESSION['lecturerRow'];

$sql = "SELECT assignments.*,courses.courseName,programs.programName FROM assignments INNER JOIN courses  
ON assignments.courseId = courses.courseId INNER JOIN programs ON assignments.programId = programs.programId 
WHERE lecturerId = $lecturerRow->lecturerId ORDER BY programs.programName ASC";
$stmt = $pdo->query($sql);
$assignmentRows = $stmt->fetchAll(PDO::FETCH_ASSOC);
//print_r($results);
//die;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>SIMS | Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="../assets/vendors/flag-icon-css/css/flag-icon.min.css" />
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css" />
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/style.css" />
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../assets/images/favicon.png" />
    <link rel="stylesheet" href="../includes/css/stylecss.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .table-borderless td,
        .table-borderless th {
            border: none;
        }

        .table .action-links a {
            text-decoration: underline;
            margin-right: 10px;
        }

        .table tbody tr {
            border: 1px solid #dee2e6;
            border-radius: 20px;
            overflow: hidden;
            background-color: #f8f9fa;
            /* Optional: Add background color to highlight the rows */
        }

        .table tbody tr td {
            padding: 15px;
        }
    </style>

    <style>
        .nav-item.grown {
            background-color: #2b3f4f;
        }

        .nav-itemii {
            background-color: #203444;
            /* Grey background for active item */
            border-left: 5px solid #38cfa7;
        }

        .nav-item.activ {
            background-color: #203444;
            /* Grey background for active item */
            border-left: 5px solid #38cfa7;
        }

        .sub-menu .nav-item {
            list-style: none;
            /* Remove default list styling */
        }

        .sub-menu .nav-item a {
            display: flex;
            /* Use flex to align items */
            align-items: center;
            /* Center align items */
            color: white;
            /* White text color */
            padding: 10px 15px;
            /* Add padding */
            text-decoration: none;
            /* Remove underline */
            font-size: 14px;
            /* Font size */
        }

        .sub-menu .nav-item a:hover {
            background-color: #1c2a33;
            /* Darker background on hover */
        }

        .sub-menu .nav-item a i {
            margin-right: 10px;
            /* Space between icon and text */
            color: white;
            /* White icon color */
        }

        .sub-menu .nav-item a::after {
            content: "";
            /* Remove any trailing content */
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <div class="box">
            <div class="logg" style="width: 160px; height: 80px">
                <img class="must" src="../uploads/must_logo/must-logo.png" style="width: 100%; height: 100%" />
            </div>

            <div>
                <div class="box1">MBEYA UNIVERSITY OF SCIENCE AND TECHNOLOGY</div>
                <div class="box2">STUDENT INFORMATION MANAGEMENT SYSTEM { SIMS }</div>
            </div>
            <button class="align-self-center border-0 rounded position-absolute m-4" style="
            width: 39px;
            height: 32px;
            right: 0;
            background-color: #32a889;
            font-size: 18px;
          " type="button" data-toggle="minimize">
                <span class="mdi mdi-menu text-white" style="font-size: 18px"></span>
            </button>
        </div>

        <div class="headerdiv"></div>

        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center"
                style="background-color: #203444">
                <a class="navbar-brand brand-logo" href="index.html"
                    style="font-weight: 700; font-size: 16px; color: #ffff">Main Campus</a>
                <a class="navbar-brand brand-logo-mini" href="index.html"
                    style="font-weight: 500; font-size: 18px; color: #ffff">SIMS MUST</a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>

                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown"
                            aria-expanded="false">
                            <div class="nav-profile-img">
                                <img src="<?php echo "../" . $lecturerRow->lecturerImage; ?>" alt="image" />
                            </div>
                            <div class="nav-profile-text">
                                <p class="mb-1 text-black"><?php echo $lecturerRow->lecturerFirstName; ?></p>
                            </div>
                        </a>
                        <div class="dropdown-menu navbar-dropdown dropdown-menu-right p-0 border-0 font-size-sm"
                            aria-labelledby="profileDropdown" data-x-placement="bottom-end">
                            <div class="p-2">
                                <a class="dropdown-item py-1 d-flex align-items-center justify-content-between"
                                    href="#">
                                    <span>Inbox</span>
                                </a>
                                <a class="dropdown-item py-1 d-flex align-items-center justify-content-between"
                                    href="#">
                                    <span>Profile</span>
                                </a>
                                <a class="dropdown-item py-1 d-flex align-items-center justify-content-between"
                                    href="javascript:void(0)">
                                    <span>Settings</span>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="logout.php">
                            <i class="mdi mdi-logout ml-1"></i>
                            <span>Log Out</span>
                        </a>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" style="background-color: #475763; height: auto" id="sidebar">
                <ul class="nav">
                    <li class="nav-item nav-itemii activ grown nav-items" style="padding-left: 13.5%">
                        <a class="nav-link" href="#" data-nav="dashboard">
                            <span class="icon-bg" style="color: white"><i class="fa-solid fa-grip"></i></span>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#data" aria-expanded="false"
                            aria-controls="data" data-nav="data">
                            <span class="icon-bg" style="color: white"><i
                                    class="fa-sharp fa-solid fa-house-chimney"></i></span>
                            <span class="menu-title">Assignments</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="data">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a href="lect_create_assign.php"><i class="fa-solid fa-chevron-right"></i>Create Assignment</a>
                                </li>
                                <li class="nav-item">
                                    <a href="lect_assign_list.php"><i class="fa-solid fa-chevron-right"></i>Assignment List</a>
                                </li>
                                <li class="nav-item">
                                    <a href="lect_view_worked_assign.php"><i class="fa-solid fa-chevron-right"></i>Mark Assignments</a>
                                </li>
                            </ul>
                        </div>
                    </li>                  
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-nav="myProfile">
                            <span class="icon-bg text-white"><i class="fa-solid fa-list"></i></span>
                            <span class="menu-title">My Full Profile</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-nav="messages">
                            <span class="icon-bg text-white"><i class="fa-solid fa-envelope"></i></span>
                            <span class="menu-title">Messages</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-nav="news">
                            <span class="icon-bg text-white"><i class="fa-regular fa-newspaper"></i></span>
                            <span class="menu-title">News</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#security" aria-expanded="false"
                            aria-controls="security" data-nav="security">
                            <span class="icon-bg text-white"><i class="fa-solid fa-lock"></i></span>
                            <span class="menu-title">Security</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="security">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a href="change-password.html"><i class="fa-solid fa-chevron-right"></i>Change
                                        Password</a>
                                </li>
                                <li class="nav-item">
                                    <a href="two-factor-authentication.html"><i
                                            class="fa-solid fa-chevron-right"></i>Two-Factor
                                        Authentication</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <!-- Your content goes here -->
                    <div class="row" id="proBanner">
                        <div class="col-12">
                            <center><p style ="color: black; font-size:20px">Assignment List:</p></center>
                            <table class="table table-striped table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>S/N</th>
                                    <th>Title</th>
                                    <th>Course</th>
                                    <th>Program</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody><a href=""></a>
                                <?php
                                    $s_no = 1;
                                    foreach($assignmentRows as $assignmentRow){
                                        
                                        echo '<tr>';
                                            echo '<td>';
                                                echo $s_no;
                                            echo '</td>';
                                            echo '<td>';
                                                echo $assignmentRow['assignTitle'];
                                            echo '</td>';
                                            echo '<td>';
                                                echo $assignmentRow['courseId']." ".$assignmentRow['courseName'];
                                            echo '</td>';
                                            echo '<td>';
                                                echo $assignmentRow['programName'];
                                            echo '</td>';
                                            echo '<td>';
                                                echo '<a href="lect_submissions.php?assignmentId='.$assignmentRow['assignmentId'].'" class="btn btn-primary btn-sm">View Submissions</a>';
                                                //echo '<a href="#" class="btn btn-warning btn-sm">Edit</a>';
                                            echo '</td>';
                                        echo '</tr>'; //var_dump($_SESSION['assignmentRow']);
                                        $s_no ++;
                                    }
                                ?>
                                <!-- Add more rows as needed -->
                            </tbody>
                        </table>

                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="container-fluid clearfix fixed-bottom"
                        style="margin-left: 20.5%; background-color: #ffff; height: 20px">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">© 2024 MBEYA
                            UNIVERSITY OF SCIENCE AND TECHNOLOGY.
                        </span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- plugins:js -->
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../includes/js/validateForm.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../assets/js/dashboard.js"></script>

    <script>
        // JavaScript for handling active state
        document.addEventListener("DOMContentLoaded", function () {
            // Get all nav items
            const navItems = document.querySelectorAll(".nav-item");

            // Function to clear active class from all items
            function clearActive() {
                navItems.forEach((item) => {
                    item.classList.remove("activ");
                });
            }

            // Set initial active item
            const initialActiveItem = document.querySelector(".nav-item.activ");
            if (initialActiveItem) {
                initialActiveItem.classList.add("activ");
            }

            // Add click event listener to each nav item
            navItems.forEach((item) => {
                item.addEventListener("click", function () {
                    // Clear active class from all items
                    clearActive();
                    // Add active class to the clicked item
                    this.classList.add("activ");
                });
            });
        });

    </script>
</body>

</html>