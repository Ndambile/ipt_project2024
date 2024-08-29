<?php
    if(isset($_GET['incorrectLogin']) && $_GET['incorrectLogin'] == 1){
        $incorrectLogin = "Incorrect Login!";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMS</title>
    <script src="includes/js/submitLoginForm.js" defer></script>
    <script src="includes/js/currentDate.js" defer></script>
    <link rel="stylesheet" href="includes/css/style.css">
    
<body>
   
        <div class="box">
            <div class="logg"><img class="must" src="uploads/must_logo/must-logo.png" style="width: 100%;height: 100%;"></div>

            <div>
                <div class="box1">MBEYA UNIVERSITY OF SCIENCE AND TECHNOLOGY</div>
                <div class="box2">STUDENT INFORMATION MANAGEMENT SYSTEM { SIMS }</div>
            </div>
        </div>

        <div class="headerdiv"></div>
  
    
        <div style="width: 100%; display: flex; padding-top: 10px;">
            <h2 class="academic">Academic Year : 2023/2024</h2>
            <h2 id="date" style="right: 0; position: absolute; margin-right: 17%; font-family:'Arial Narrow'; font-weight: 1.2em; font-size: 17px;"></h2>
        </div>
        <main class="main">
            <aside class="aside1">
                <div style="width: 86%; margin-left: 7%;">
                    <div class="p-row">
                        <p2>Welcome to SIMS</p2>
                        <p1>The Student Information Management System (SIMS) holds all the information relating to students.</p1>
                    </div>
                    <div class="p-row">
                        <p2>Students</p2>
                        <p1>*Register for Course online</p1>
                        <p1>*View Course Progress and Results</p1>
                        <p1>*Forums</p1>
                    </div>
                    <div class="p-row">
                        <p2>Teaching Staff</p2>
                        <p1>*View List of Student per Course</p1>
                        <p1>*Publish Course Results</p1>
                        <p1>*Track Students Progress/Reports</p1>
                    </div>
                    <div class="p-row">
                        <p2>Others</p2>
                        <p1>*Payment Management</p1>
                        <p1>*Configuration</p1>
                    </div>
                </div>
            </aside>
            <aside class="aside2">
                <div style="width: 78%; margin-left: 6%;">
                    <h2 id="h2">Login</h2>
                    <h4><?php echo @$incorrectLogin; ?></h4>

                    <form action="php/login.php" method="post" id="loginForm" style="width: 80%;">
                        <label for="username" class="label1">Username</label>
                        <input type="text" id="username" name="username" placeholder="Username" maxlength="15" required>
                        <label for="password" class="label1">Password</label>
                        <input type="password" id="password" name="password" placeholder="Password" required>
                    </form>
                    <div class="row">
                        <div>
                            <input type="checkbox">
                            <label for="remember me" style="color: hsl(0, 0%, 54%); font-weight: lighter;">Remember me</label>
                        </div>
                        <div style="display: flex; padding-left: 50px;">
                            <a href="forget.html" style="font-size: 14px; color: rgb(222, 101, 80); font-family: 'Arial Narrow'; font-weight: 400;">Forgot your password?</a>
                            <a href="#" style="padding-left: 35px; color: rgb(222, 101, 80); font-family: 'Arial Narrow'; font-size: 14px; font-weight: 400;">HELP</a>
                        </div>
                    </div>
                    <div style="width: 100%; padding-top: 15px; margin-left: 30px;">
                        <button id="submitButton" class="button" style="color: #ffff; background-color: rgb(15, 141, 200); height: 35px; width: 165px; border-radius: 5px;">Login to Your Account</button>
                    </div>
                </div>
            </aside>
        </main>

    <div style="width: 100%; background-color: #719dbce7;">
        <div class="headerdiv" style="height: 7px;"></div>
        <div class="footer">
            <div style="font-weight: 600;">&copy; 2012-2024 MBEYA UNIVERSITY OF SCIENCE AND TECHNOLOGY</div>
            <div style="right: 0;position: absolute;margin-right: 5%;font-style: italic;">Designed and Developed by: <span style=" font-weight: 600;font-style: normal;">ICT SOLUTIONS DESING</span></div>
        </div>
    </div>
</body>

</html>
