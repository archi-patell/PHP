<?php
$con = mysqli_connect("localhost", "root", "", "watch_databse");

if (isset($_POST['submit'])) {

    if (!empty($_POST['uname']) && !empty($_POST['add']) && !empty($_POST['mno']) && !empty($_POST['email']) && !empty($_POST['city'])) {
        $uname = $_POST['uname'];
        $add = $_POST['add'];
        $mno = $_POST['mno'];
        $email = $_POST['email'];
        $city = $_POST['city'];
        $pwd = $_POST['pwd'];
        $img = $_FILES['img']['name'];
        move_uploaded_file($img, "upload_img/$img");
        $qry = mysqli_query($con, "INSERT INTO `user_details`(`user_name`, `address`, `mobile_no`, `email`, `password`, `city`, `photo`) VALUES ('{$uname}','{$add}','{$mno}','{$email}','{$pwd}','{$city}','{$img}')");
        echo "<script>alert('Your Data successfully Registered.');
            window.location.href='login.php';
            </script>";
     }
    //   else {
    //     echo "<script>alert('Please Insert all the required data.')</script>";
    // }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <style>
        .fluid-container .row .col-sm-8 {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .fluid-container .row .col-sm-8 form {
            padding: 10px;
        }

        .fluid-container .row .col-sm-8 form h4 {
            text-align: center;
            background-color: rgb(59, 59, 59);
            color: white;
            font-size: 30px;
        }
        .error-message {
            color: red;
            font-size: 12px;
        }
    </style>

         <script>
        function validateForm() {
            let isValid = true;

            // Email validation regex pattern
            const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

            // Get form fields
            let uname = document.getElementById("uname").value;
            let add = document.getElementById("add").value;
            let mno = document.getElementById("mno").value;
            let email = document.getElementById("email").value;
            let city = document.getElementById("city").value;
            let pwd = document.getElementById("pwd").value;
            let img = document.getElementById("img").value;

            // Clear previous error messages
            document.querySelectorAll('.error-message').forEach(e => e.innerHTML = '');

            // Validate fields
            if (uname === "") {
                document.getElementById("uname-error").innerHTML = "User Name is required";
                isValid = false;
            }
            if (add === "") {
                document.getElementById("add-error").innerHTML = "Address is required";
                isValid = false;
            }
            if (mno === "" || mno.length != 10) {
                document.getElementById("mno-error").innerHTML = "Enter a valid 10-digit mobile number";
                isValid = false;
            }
            if (email === ""  || !emailPattern.test(email) ) {
                document.getElementById("email-error").innerHTML = " Enter Correct Email";
                isValid = false;
            }
            if (pwd === "") {
                document.getElementById("pwd-error").innerHTML = "Password is required";
                isValid = false;
            }
            if (city === "") {
                document.getElementById("city-error").innerHTML = "City is required";
                isValid = false;
            }
            if (img === "") {
                document.getElementById("img-error").innerHTML = "Photo is required";
                isValid = false;
            }

            return isValid; // Prevent form submission if validation fails
        }

         // Real-time validation function
         function checkInput(id, condition, errorMessage) {
            const input = document.getElementById(id);
            const errorElement = document.getElementById(`${id}-error`);
            
            // If condition is not met, show error, else remove error
            if (!condition) {
                errorElement.innerHTML = errorMessage;
            } else {
                errorElement.innerHTML = "";
            }
        }

        // Add event listeners for real-time validation
        window.onload = function() {
            document.getElementById("uname").oninput = function() {
                checkInput("uname", this.value !== "", "User Name is required");
            };
            document.getElementById("add").oninput = function() {
                checkInput("add", this.value !== "", "Address is required");
            };
            document.getElementById("mno").oninput = function() {
                checkInput("mno", this.value.length === 10, "Enter a valid 10-digit mobile number");
            };
            document.getElementById("email").oninput = function() {
                checkInput("email", this.value !== "", "Email is required");
            };
            document.getElementById("pwd").oninput = function() {
                checkInput("pwd", this.value !== "", "Password is required");
            };
            document.getElementById("city").onchange = function() {
                checkInput("city", this.value !== "", "City is required");
            };
            document.getElementById("img").onchange = function() {
                checkInput("img", this.value !== "", "Photo is required");
            };
        };
   
    </script>
</head>

<body>
    <div class="fluid-container">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8 bg-light p-4 border rounded">
                <form action="#" method="post" name="form" enctype="multipart/form-data" onsubmit="return validateForm();">
                    <h4 class="text-light p-3">User Registration</h4>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="uname">User Name : </label>
                                <input type="text" name="uname" id="uname" class="form-control">
                                <b><div id="uname-error" class="error-message"></div></b>
                            </div>

                            <div class="form-group">
                                <label for="add">Address : </label>
                                <input type="text" name="add" id="add" class="form-control">
                                <b><div id="add-error" class="error-message"></div></b>
                            </div>

                            <div class="form-group">
                                <label for="mno">Mobile No. : </label>
                                <input type="number" name="mno" id="mno" class="form-control">
                               <b> <div id="mno-error" class="error-message"></div></b>
                            </div>
                            <div class="form-group">
                                <label for="email">Email : </label>
                                <input type="email" name="email" id="email" class="form-control">
                               <b> <div id="email-error" class="error-message"></div></b>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="city">City : </label>
                                <select name="city" id="city" class="form-control">
                                    <option value=""></option>
                                    <option value="Surat">Surat</option>
                                    <option value="Vapi">Vapi</option>
                                    <option value="Bharuch">Bharuch</option>
                                    <option value="Vadodara">Vadodara</option>
                                    <option value="Ahemdabad">Ahemdabad</option>
                                    <option value="Bhavnagar">Bhavnagar</option>
                                </select>
                                <b><div id="city-error" class="error-message"></div></b>
                            </div>
                            <div class="form-group">
                                <label for="pwd">Password : </label>
                                <input type="password" name="pwd" id="pwd" class="form-control">
                                <b><div id="pwd-error" class="error-message"></div></b>
                            </div>
                            <div class="form-group">
                                <label for="img">Photo : </label>
                                <input type="file" name="img" id="img" class="form-control">
                              <b>  <div id="img-error" class="error-message"></div></b>
                            </div>
                        </div>
                    </div>
                    <input type="submit" name="submit" value="submit" class="btn-lg btn-primary form-control">
                    <p>Already have an account?<a href="login.php">SignIn Now</a></p>
                </form>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>
</body>

</html>