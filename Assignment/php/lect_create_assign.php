<?php
include_once '../includes/php/header.php';

$lecturerRow = $_SESSION['lecturerRow'];
$_SESSION['lecturerRow'] = $lecturerRow;

$sql = "SELECT lecturers_courses.courseId, courses.courseName, lecturers_courses.programId, 
    programs.programName FROM lecturers_courses INNER JOIN courses ON lecturers_courses.courseId = courses.courseId 
    INNER JOIN programs ON lecturers_courses.programId = programs.programId WHERE lecturerId = $lecturerRow->lecturerId";
$stmt = $pdo->query($sql);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
//print_r($results);
// die;

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

    .footi{
  margin-left: 19.5%;
    }
    @media screen and (max-width:600px) {
      .footi{
        margin-left: 0;

      }
    }
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
                <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="#">
                  <span>Inbox</span>
                </a>
                <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="#">
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
            <a class="nav-link" data-toggle="collapse" href="#data" aria-expanded="false" aria-controls="data"
              data-nav="data">
              <span class="icon-bg" style="color: white"><i class="fa-sharp fa-solid fa-house-chimney"></i></span>
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
            <a class="nav-link" data-toggle="collapse" href="#security" aria-expanded="false" aria-controls="security"
              data-nav="security">
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
                  <a href="two-factor-authentication.html"><i class="fa-solid fa-chevron-right"></i>Two-Factor
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
            <div class="col-12" style="color:#000">
            <form action="lect_submit_assign.php" method="post" id="createAssignmentForm"
    enctype="multipart/form-data" class="p-4 border rounded mx-auto shadow-lg"
    style="max-width: 800px;background-color:#ffff">

    <!-- Row for Course and Program -->
    <div class="row g-3 mb-3">
      <div class="col-md-6">
        <label for="course-select" class="form-label font-weight-bold" style="color:rgb(109, 109, 109); font-size: 18px;">Course</label>
        <select name="course" id="course-select" class="form-select" required>
          <option value="">--Choose a Course--</option>
          <?php
          foreach ($results as $result) {
              echo "<option value=\"" . $result['courseId'] . "\">" . $result['courseId'] . " " . $result['courseName'] . "</option>";
          }
          ?>
        </select>
      </div>
      <div class="col-md-6">
        <label for="program-select" class="form-label font-weight-bold" style="color:rgb(109, 109, 109); font-size: 18px;">Program</label>
        <select name="program" id="program-select" class="form-select" required>
          <option value="">--Choose Program--</option>
          <?php
          foreach ($results as $result) {
              echo "<option value=\"" . $result['programId'] . "\">" . $result['programName'] . "</option>";
          }
          ?>
        </select>
      </div>
    </div>

    <!-- Row for Title -->
    <div class="mb-3">
        <label for="assignTitle" class="form-label font-weight-bold" style="color:rgb(109, 109, 109); font-size: 18px;">Title</label>
        <input type="text" name="assignTitle" id="assignTitle" class="form-control"
            placeholder="Title is required." required>
    </div>

    <!-- Row for Task -->
    <div class="mb-3">
        <label for="assignText" class="form-label font-weight-bold" style="color:rgb(109, 109, 109); font-size: 18px;">Task</label>
        <textarea name="assignText" id="assignText" class="form-control"
            placeholder="Type here..."></textarea>
    </div>

    <div class="text-center mb-3">OR</div>

    <!-- Row for Upload File -->
    <div class="mb-3">
        <label for="assignFile" class="form-label font-weight-bold" style="color:rgb(109, 109, 109); font-size: 18px;">Upload File (PDF Only)</label>
        <input type="file" name="assignFile" id="assignFile" class="form-control" accept=".pdf">
    </div>

    <!-- Row for Submission Deadline and Allocated Marks -->
    <div class="row g-3 mb-3">
        <div class="col-md-6">
            <label for="submDeadline" class="form-label font-weight-bold" style="color:rgb(109, 109, 109); font-size: 18px;">Submission Deadline</label>
            <input type="datetime-local" name="submDeadline" id="submDeadline" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label for="allocMarks" class="form-label font-weight-bold" style="color:rgb(109, 109, 109); font-size: 18px;">Allocated Marks</label>
            <input type="number" name="allocMarks" id="allocMarks" class="form-control" step="any" min="1"
                max="40" required>
        </div>
    </div>

    <button type="submit" name="submit" class="btn btn-primary w-100" style=" font-size: 18px;">Submit</button>

    <div style="padding:20px;margin: 10px;background-color:white;border-radius: 20px;">
        <div id="error-message" style="color: red;text-align:center"></div>
    </div>
</form>


            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid clearfix fixed-bottom footi" style=" background-color: #ffff; height: 38px; display: flex; justify-content: space-between; align-items: center;border-top: 1px solid rgb(231, 227, 227);">
            <span class="text-muted d-block text-sm-left">
               <span style="color: #6d6a6a;font-size: 13px;" class=" font-weight-bold"> © 2012-2024</span> <span style="color: rgba(38, 81, 165, 0.828);font-size: 13px; word-spacing: 2px;" class="pl-3  font-weight-bold"> MBEYA UNIVERSITY OF SCIENCE AND TECHNOLOGY</span> 
            </span>
            <span class="text-muted d-block text-sm-right pr-4">
               <Span style="color: #6d6c6c;font-size: 13px;">Design and Developed by</Span> 
               <Span style="color:rgba(38, 81, 165, 0.828) ;font-size: 13px;" class="font-weight-bold">ICT SOLUTIONS DESIGN</Span>
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
  <script src="../includes/js/validLectAssignForm.js"></script>
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