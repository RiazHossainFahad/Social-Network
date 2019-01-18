<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="bootstrap3/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap3/js/bootstrap.min.js"></script>
    <title>Chat Me</title>

    <style type="text/css">
    	.overlap-text{
    		position: relative;
    	}
    	.overlap-text a{
    		position: absolute;
    		top:8px;
    		right: 10px;
    		font-size: 14px;
    		font-family: 'overpass Mono', monospace;
    		letter-spacing: -1px;

    	}

    </style>

    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
        //    var flag = true;
        //function authCheckLogin(){//error check for login
        //    var textFieldEmail = document.loginForm.emailLogin.value;
        //    var passwordField = document.loginForm.pass.value;
        //    if (textFieldEmail == "") {
        //        alert("*Email is required.");
        //         flag = false;
        //    }
            
        //    if (passwordField == "") {
        //        alert( "*Password is required.");
        //        flag = false;
        //    }
        //    return flag;
        //}

        var flag = true;
        function compareForMultiple(str, resp) {
            for (i = 0; i < resp.length; i++) {
                if (str == resp[i].user_email) {
                    alert("*Already registered for this email ");
                    flag = false;
                    break;
                }
                else if (str != resp[i].user_email) {
                    flag = true;
                }

            }

        }

        function showHintEmail() {

            var xmlhttp = new XMLHttpRequest();
            var str = document.registrationForm.emailfield.value;
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    var m = xmlhttp.responseText;
                    var resp = JSON.parse(m);
                    //alert(resp[0].email);
                    compareForMultiple(str, resp);
                }
            };
            var url = "fetchForEmail.php";
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }

        function showHint() {

            var xmlhttp = new XMLHttpRequest();
            var str = document.registrationForm.userName.value;
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    r = xmlhttp.responseText;
                    if (r == "*UserName Already taken") {
                        alert(r);
                        flag = false;
                    }

                    else flag = true; 
                }
            };
            var url = "fetch.php?uname=" + str;
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }

        function confirmRegistration() {
        	if(flag == false)
        	{
        		alert("Error in Email or UserName.Please fix it.");
        	}
            return flag;
        }

    </script>

</head>
<body>

    <div class="col-lg-12">
        <br />
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="Login.php">Chat ME</a>
                </div>
                
                <div class="collapse navbar-collapse" id="myNavbar">

                    <form class="form-inline navbar-form navbar-right" name="loginForm" action="auth.php" method="post">
                        <div class="form-group">
                            <input type="email" name="emailLogin" required class="form-control" data-toggle="tooltip" title="Enter your email address" placeholder="Email Address">
                        </div>
                        <div class="form-group overlap-text">
                            <input type="password" name="pass" required class="form-control" data-toggle="tooltip"  title="Enter your password" placeholder="Password">
                            <a href="forgot_password.php" data-toggle="tooltip" data-placement="bottom" style="text-decoration:none;float: right; " title="Forgot Password">Forgot?</a>
                        </div>
                        <button type="submit" title="Click to login" data-toggle="tooltip"  class="btn btn-info"><span class="glyphicon glyphicon-log-in"> Login</span></button>
                    </form>
                   </div>
                </div>
        </nav>
    </div>
   
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-6 col-md-offset-1">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="users/access-933128_960_720.jpg" alt="Welcome" style="width:100%;height:500px;">
                        </div>

                        <div class="item">
                            <img src="users/wonder-woman-blu-ray-cover.jpg" alt="Wonder Women" style="width:100%;height:500px;">
                        </div>

                        <div class="item">
                            <img src="users/harley-quinn.jpg" alt="Harley quinn" style="width:100%;height:500px;">
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

            </div>

            <div class="col-md-5">
                <center><h2>Create account<br /></h2></center>
                <center><footer>It's always free to create a new account</footer></center>
                <form action="writeData.php" method="post" name="registrationForm">
                    <div class="form-group col-xs-6">
                        <input name="firstName" type="text" class="form-control" data-toggle="tooltip" required title="Enter your firstname" placeholder="Firstname" />
                    </div>

                    <div class="form-group col-xs-6">
                        <input name="lastName" type="text" class="form-control" data-toggle="tooltip" required title="Enter your surname" placeholder="Surname" />
                    </div>

                    <div class="form-group col-xs-12">
                        <input name="userName" onkeyup="showHint()" type="text" class="form-control" data-toggle="tooltip" required title="Enter your username" placeholder="Username" />
                    </div>

                    <div class="form-group col-xs-12">
                        <input  name="emailfield" onkeyup="showHintEmail()" type="email" class="form-control" data-toggle="tooltip" required title="Enter your Email-Address" placeholder="Email Address" />
                    </div>

                    <div class="form-group col-xs-12">
                        <input  name="phone" type="text" class="form-control" data-toggle="tooltip" required title="Enter your phone number" placeholder="Phone Number" />
                    </div>

                    <div class="form-group col-xs-12">
                        <input name="newPassword" type="password" class="form-control" data-toggle="tooltip" required title="Enter your new password" placeholder="New password" />
                    </div>

                    <div class="form-group col-xs-12">
                        <input name="cnfirmPassword" type="password" class="form-control" data-toggle="tooltip" required title="Enter your confirm password" placeholder="Confirm password" />
                    </div>

                    <div class="col-xs-12">
                        <label class="h3">Gender:  </label>
                        <div class="radio-inline">
                            <label class="h4"><input type="radio" name="gender" value="Male">Male</label>
                        </div>
                        <div class="radio-inline">
                            <label class="h4"><input type="radio" name="gender" value="Female">Female</label>
                        </div>

                    </div>
                        <div class="form-group form-inline col-xs-12">

                            <label class="h3">DOB:</label>
                            <select name="day" class="form-control" style="width:25%">
                                <option value="day">Day</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>

                            </select>

                            <select name="month" class="form-control" style="width:25%">
                                <option value="month">Month</option>
                                <option value="1">Jan</option>
                                <option value="2">Feb</option>
                                <option value="3">Mar</option>
                                <option value="4">Apr</option>
                                <option value="5">May</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">Aug</option>
                                <option value="9">Sep</option>
                                <option value="10">Oct</option>
                                <option value="11">Nov</option>
                                <option value="12">Dec</option>
                            </select>

                            <select name="year" class="form-control" style="width:25%">
                                <option value="year">Year</option>
                                <option value="1990">1990</option>
                                <option value="1991">1991</option>
                                <option value="1992">1993</option>
                                <option value="1994">1994</option>
                                <option value="1995">1995</option>
                                <option value="1996">1996</option>
                                <option value="1997">1997</option>
                                <option value="1998">1998</option>
                                <option value="1999">1999</option>
                                <option value="2000">2000</option>
                                <option value="2001">2001</option>
                                <option value="2002">2002</option>
                                <option value="2003">2003</option>
                                <option value="2004">2004</option>
                                <option value="2005">2005</option>
                                <option value="2006">2006</option>
                                <option value="2007">2007</option>
                                <option value="2008">2008</option>
                                <option value="2009">2009</option>
                                <option value="2010">2010</option>
                                <option value="2011">2011</option>
                                <option value="2012">2012</option>
                                <option value="2013">2013</option>
                                <option value="2014">2014</option>
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                            </select>

                        </div>
                        
                        <div class="form-group form-inline col-xs-12">
                            <label class="h3">Country:</label>
                            <select name="u_country" class="form-control" style="width:60%">
                                <option disabled>Select your Country</option>
                                <option>Bangladesh</option>
                                <option>United States of America</option>
                                <option>India</option>
                                <option>Japan</option>
                                <option>UK</option>
                                <option>France</option>
                                <option>Germany</option>
                            </select>

                        </div>

                        <div class="col-xs-12">
                            <center> <button type="submit" style="width:50%" onclick="return confirmRegistration()" data-toggle="tooltip" title="Click to signin" class="btn btn-block btn-success"><span class="glyphicon glyphicon-user"> SignUp</span></button></center>
                        </div>

                </form>
            </div>
        </div>
    </div>

</body>
</html>