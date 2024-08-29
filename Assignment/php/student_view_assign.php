<?php
  include_once '../includes/php/header.php'; 

  $studentId = $_SESSION['studentId'];
  $_SESSION['assignmentId'] = $_GET['assignmentId'];
  $assignmentId = $_GET['assignmentId'];

  $stmt = $pdo->prepare("SELECT * FROM students WHERE studentId = ?");
  $stmt->execute([$studentId]); 
  $studentRow = $stmt->fetch(PDO::FETCH_OBJ);

  $stmt = $pdo->prepare("SELECT *, assignment_texts.assignText,courses.courseName FROM assignments 
  INNER JOIN assignment_texts ON assignments.assignmentId = assignment_texts.assignmentId INNER JOIN courses
  ON courses.courseId = assignments.courseId WHERE assignments.assignmentId = ?");
  $stmt->execute([$assignmentId]); 
  $assignmentRow = $stmt->fetch(PDO::FETCH_OBJ);
  
  if($assignmentRow){
    $assignmentText = @$assignmentRow->assignText;

    //Date formatting
    $date = DateTime::createFromFormat('Y-m-d H:i:s', $assignmentRow->dateOfSubm);
    $dateOfSubm = $date->format('d-m-Y H:i:s');

    $date = DateTime::createFromFormat('Y-m-d H:i:s', $assignmentRow->submDeadline);
    $submDeadline = $date->format('d-m-Y H:i:s');
    
  }else{
    $stmt = $pdo->prepare("SELECT *, assignment_files.assignFile, courses.courseName FROM assignments 
    INNER JOIN assignment_files ON assignments.assignmentId = assignment_files.assignmentId INNER JOIN courses
    ON courses.courseId = assignments.courseId WHERE assignments.assignmentId = ?");
    $stmt->execute([$assignmentId]); 
    $assignmentRow = $stmt->fetch(PDO::FETCH_OBJ);
    $assignmentFile = @$assignmentRow->assignFile;

    //Date formatting
    $date = DateTime::createFromFormat('Y-m-d H:i:s', $assignmentRow->dateOfSubm);
    $dateOfSubm = $date->format('d-m-Y H:i:s');

    $date = DateTime::createFromFormat('Y-m-d H:i:s', $assignmentRow->submDeadline);
    $submDeadline = $date->format('d-m-Y H:i:s');
  }
  //die;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>SIMS | Dashboard</title>
    <!-- plugins:css -->
    <link
      rel="stylesheet"
      href="../assets/vendors/mdi/css/materialdesignicons.min.css"
    />
    <link
      rel="stylesheet"
      href="../assets/vendors/flag-icon-css/css/flag-icon.min.css"
    />
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css" />
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link
      rel="stylesheet"
      href="../assets/vendors/font-awesome/css/font-awesome.min.css"
    />
    <link
      rel="stylesheet"
      href="../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css"
    />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/style.css" />
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../assets/images/favicon.png" />
    <link rel="stylesheet" href="../includes/css/stylecss.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
      integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <style>
      .nav-item.grown {
        background-color: #2b3f4f;
      }
      .nav-itemii {
        background-color: #203444; /* Grey background for active item */
        border-left: 5px solid #38cfa7;
      }
      .nav-item.activ {
        background-color: #203444; /* Grey background for active item */
        border-left: 5px solid #38cfa7;
      }

      .sub-menu .nav-item {
        list-style: none; /* Remove default list styling */
      }

      .sub-menu .nav-item a {
        display: flex; /* Use flex to align items */
        align-items: center; /* Center align items */
        color: white; /* White text color */
        padding: 10px 15px; /* Add padding */
        text-decoration: none; /* Remove underline */
        font-size: 14px; /* Font size */
      }

      .sub-menu .nav-item a:hover {
        background-color: #1c2a33; /* Darker background on hover */
      }

      .sub-menu .nav-item a i {
        margin-right: 10px; /* Space between icon and text */
        color: white; /* White icon color */
      }

      .sub-menu .nav-item a::after {
        content: ""; /* Remove any trailing content */
      }
    </style>
  </head>

  <body>
    <div class="container-scroller">
      <div class="box">
        <div class="logg" style="width: 160px; height: 80px">
          <img
            class="must"
            src="../uploads/must_logo/must-logo.png"
            style="width: 100%; height: 100%"
          />
        </div>

        <div>
          <div class="box1">MBEYA UNIVERSITY OF SCIENCE AND TECHNOLOGY</div>
          <div class="box2">STUDENT INFORMATION MANAGEMENT SYSTEM { SIMS }</div>
        </div>
        <button
          class="align-self-center border-0 rounded position-absolute m-4"
          style="
            width: 39px;
            height: 32px;
            right: 0;
            background-color: #32a889;
            font-size: 18px;
          "
          type="button"
          data-toggle="minimize"
        >
          <span class="mdi mdi-menu text-white" style="font-size: 18px"></span>
        </button>
      </div>

      <div class="headerdiv"></div>

      <!-- partial:partials/_navbar.html -->
      <nav
        class="navbar default-layout-navbar col-lg-12 col-12 p-0 d-flex flex-row"
      >
        <div
          class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center"
          style="background-color: #203444"
        >
          <a
            class="navbar-brand brand-logo"
            href="index.html"
            style="font-weight: 700; font-size: 16px; color: #ffff"
            >Main Campus</a
          >
          <a
            class="navbar-brand brand-logo-mini"
            href="index.html"
            style="font-weight: 500; font-size: 18px; color: #ffff"
            >SIMS MUST</a
          >
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button
            class="navbar-toggler navbar-toggler align-self-center"
            type="button"
            data-toggle="minimize"
          >
            <span class="mdi mdi-menu"></span>
          </button>

          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a
                class="nav-link dropdown-toggle"
                id="profileDropdown"
                href="#"
                data-toggle="dropdown"
                aria-expanded="false"
              >
                <div class="nav-profile-img">
                  <img src="<?php echo "../".$studentRow->studentImage; ?>" alt="image" />
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black"><?php echo $studentRow->studentFirstName; ?></p>
                </div>
              </a>
              <div
                class="dropdown-menu navbar-dropdown dropdown-menu-right p-0 border-0 font-size-sm"
                aria-labelledby="profileDropdown"
                data-x-placement="bottom-end"
              >
                <div class="p-2">
                  <a
                    class="dropdown-item py-1 d-flex align-items-center justify-content-between"
                    href="#"
                  >
                    <span>Inbox</span>
                  </a>
                  <a
                    class="dropdown-item py-1 d-flex align-items-center justify-content-between"
                    href="#"
                  >
                    <span>Profile</span>
                  </a>
                  <a
                    class="dropdown-item py-1 d-flex align-items-center justify-content-between"
                    href="javascript:void(0)"
                  >
                    <span>Settings</span>
                  </a>
                </div>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a
                class="dropdown-item py-1 d-flex align-items-center justify-content-between"
                href="logout.php"
              >
                <i class="mdi mdi-logout ml-1"></i>
                <span>Log Out</span>
              </a>
            </li>
          </ul>
          <button
            class="navbar-toggler navbar-toggler-right d-lg-none align-self-center"
            type="button"
            data-toggle="offcanvas"
          >
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav
          class="sidebar sidebar-offcanvas"
          style="background-color: #475763; height: auto"
          id="sidebar"
        >
          <ul class="nav">
            <li
              class="nav-item nav-itemii activ grown nav-items"
              style="padding-left: 13.5%"
            >
              <a class="nav-link" href="#" data-nav="dashboard">
                <span class="icon-bg" style="color: white"
                  ><i class="fa-solid fa-grip"></i
                ></span>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                data-toggle="collapse"
                href="#payments"
                aria-expanded="false"
                aria-controls="payments"
                data-nav="payments"
              >
                <span class="icon-bg text-white"
                  ><i class="fa-regular fa-registered"></i
                ></span>
                <span class="menu-title">Payments</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="payments">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a href="create-invoice.html"
                      ><i class="fa-solid fa-chevron-right"></i>Create
                      Invoice</a
                    >
                  </li>
                  <li class="nav-item">
                    <a href="invoice-list.html"
                      ><i class="fa-solid fa-chevron-right"></i>Invoice List</a
                    >
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                data-toggle="collapse"
                href="#data"
                aria-expanded="false"
                aria-controls="data"
                data-nav="data"
              >
                <span class="icon-bg" style="color: white"
                  ><i class="fa-sharp fa-solid fa-house-chimney"></i
                ></span>
                <span class="menu-title">Assignments</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="data">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a href="student_assign_list.php"
                      ><i class="fa-solid fa-chevron-right"></i>Assignment List</a>
                  </li>
                  <li class="nav-item">
                    <a href="#"
                      ><i class="fa-solid fa-chevron-right"></i>Submitted Works</a
                    >
                  </li>
                  <li class="nav-item">
                    <a href="#"
                      ><i class="fa-solid fa-chevron-right"></i>Assignments Results</a
                    >
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" data-nav="course">
                <span class="icon-bg" style="color: white"
                  ><i class="fa-regular fa-square-plus"></i
                ></span>
                <span class="menu-title">Course Registration</span>
              </a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                data-toggle="collapse"
                href="#examinationResult"
                aria-expanded="false"
                aria-controls="examinationResult"
                data-nav="examinationResult"
              >
                <span class="icon-bg text-white"
                  ><i class="fa-solid fa-book"></i
                ></span>
                <span class="menu-title">Examination Result</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="examinationResult">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a href="create-invoice.html"
                      ><i class="fa-solid fa-chevron-right"></i>Create
                      Invoice</a
                    >
                  </li>
                  <li class="nav-item">
                    <a href="invoice-list.html"
                      ><i class="fa-solid fa-chevron-right"></i>Invoice List</a
                    >
                  </li>
                </ul>
              </div>
            </li>           
            <li class="nav-item">
              <a class="nav-link" href="#" data-nav="myProfile">
                <span class="icon-bg text-white"
                  ><i class="fa-solid fa-list"></i
                ></span>
                <span class="menu-title">My Full Profile</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" data-nav="messages">
                <span class="icon-bg text-white"
                  ><i class="fa-solid fa-envelope"></i
                ></span>
                <span class="menu-title">Messages</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" data-nav="news">
                <span class="icon-bg text-white"
                  ><i class="fa-regular fa-newspaper"></i
                ></span>
                <span class="menu-title">News</span>
              </a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                data-toggle="collapse"
                href="#security"
                aria-expanded="false"
                aria-controls="security"
                data-nav="security"
              >
                <span class="icon-bg text-white"
                  ><i class="fa-solid fa-lock"></i
                ></span>
                <span class="menu-title">Security</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="security">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a href="change-password.html"
                      ><i class="fa-solid fa-chevron-right"></i>Change
                      Password</a
                    >
                  </li>
                  <li class="nav-item">
                    <a href="two-factor-authentication.html"
                      ><i class="fa-solid fa-chevron-right"></i>Two-Factor
                      Authentication</a
                    >
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
                <div style="width: 85%;" class="course-info bg-white">
                  <div style="margin-left: 5%; display: flex; flex-direction: column; justify-content: center; min-height: 70vh;">
                    <!-- Header Section -->
                    <div class="container">
                      <div class="row">
                        <div class="col-3">
                          <h4 style="color:#1c2a33">Course Code :</h4>
                        </div>
                        <div class="col-9">
                          <span style="font-size: 16px; color:#1c2a33">
                            <?php
                              echo $assignmentRow->courseId;
                            ?>
                          </span>
                        </div>
                      </div>
                      <div class="row mt-2">
                        <div class="col-3">
                          <h4 style="color:#1c2a33">Course Name :</h4>
                        </div>
                        <div class="col-9">
                          <span style="font-size: 16px; color:#1c2a33">
                            <?php
                              echo $assignmentRow->courseName;
                            ?>
                          </span>
                        </div>
                      </div>
                      <hr>
                    </div>                                                 
                    <!-- Second Section -->
                    <div class="container">
                      <div class="row mb-2">
                        <div class="col-3 font-weight-bold">
                          <h4 style="color:#1c2a33">Title :</h4>
                        </div>
                        <div class="col-9">
                          <span style="font-size: 18px; color:#1c2a33">
                            <?php
                              echo $assignmentRow->assignTitle;
                            ?>
                          </span>
                        </div>
                      </div>
                      <div class="row mb-2">
                        <div class="col-3 font-weight-bold">
                          <h4 style="color:#1c2a33">Uploaded :</h4>
                        </div>
                        <div class="col-9">
                          <span style="font-size: 16px; color:#1c2a33">
                            <?php
                              echo $dateOfSubm;
                            ?>
                          </span>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-3 font-weight-bold">
                          <h4 style="color:#1c2a33">Subm. Deadline :</h4>
                        </div>
                        <div class="col-9">
                          <span style="font-size: 16px; color:#1c2a33">
                            <?php
                            echo $submDeadline;
                          ?>
                          </span>
                        </div>
                      </div>
                      <hr >
                    </div>                         
                    <!-- Task Section -->
                    <?php
                      if (@$assignmentText){
                        echo '
                          <div class="container">
                            <div class="row align-items-center">
                              <div class="col-3 font-weight-bold">
                                <h4 style="color:#1c2a33">Task :</h4>
                              </div>
                              <div class="col-9">
                                <div style="border: 2px solid grey; height: 100px; border-radius: 25px;">
                                  <p class="pl-4 pt-4" style="color:#1c2a33">
                                    '.@$assignmentText.'
                                  </p>
                                </div>
                              </div>
                            </div>
                          </div>                          
                        ';
                      }else{
                        echo '
                          <embed src="'.@$assignmentFile.'" type="">
                        ';
                      }
                    ?>
                    <!-- Buttons Section -->
                    <div class="text-center mt-4">
                      <button id="respondButton" class="btn btn-primary mx-2">Respond</button>
                      <a href="student_assign_list.php">
                        <button class="btn btn-secondary mx-2">Back</button>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid clearfix fixed-bottom" style="margin-left: 20.5%; background-color: #ffff; height: 20px">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">
                © 2024 MBEYA UNIVERSITY OF SCIENCE AND TECHNOLOGY.
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
    
    <!-- endinject -->
    <!-- inject:js -->
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../assets/js/dashboard.js"></script>
    <script src="../includes/js/student_subm_assig_nform.js"></script>

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
