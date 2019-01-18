<?php
require("library.php");
$data=array();
$str=$_POST["emailfield"];
$c=0;
$first_name = $_POST['firstName'];
$last_name = $_POST['lastName'];
$pass = $_POST['newPassword'];
$cpass = $_POST['cnfirmPassword'];
$phone=$_POST["phone"];
$country = $_POST['u_country'];
	if(isset($_POST['gender']))
	{
		$gender = $_POST['gender'];
	}
	else
	{
		echo "<script>alert('You did not select your Gender!')</script>";
		echo "<script>window.open('Login.php', '_self')</script>";
	}
$birthday = $_POST['year']."-".$_POST["month"]."-".$_POST["day"];
$status = "verified";
$posts = "no";
$username = $_POST["userName"];

if($gender == "Male")
	$profile_pic = "boy.png";
else if($gender == "Female")
	$profile_pic = "girl.png";

if(trim($first_name) == "")
{
	 	echo "<script>alert('First-Name was empty!')</script>";
		echo "<script>window.open('Login.php', '_self')</script>";
}

else
{
	if(trim($last_name) == "")
	{
	 	echo "<script>alert('Last-Name was empty!')</script>";
		echo "<script>window.open('Login.php', '_self')</script>";
	}
	else
	{
		if(trim($username) == "")
		{
		 echo "<script>alert('UserName was empty!')</script>";
		 echo "<script>window.open('Login.php', '_self')</script>";
		}
		else
		{
			if(trim($str) == "")
			{
			    echo "<script>alert('Email was empty!')</script>";
		 		echo "<script>window.open('Login.php', '_self')</script>";
			}
			else
			{
				if(trim($phone) == "")
				{
				 echo "<script>alert('Phone Number was empty!')</script>";
		 		 echo "<script>window.open('Login.php', '_self')</script>";
				}
				else
				{
					if(is_numeric($phone))
					{
						if(trim($pass) == "")
						{
							 echo "<script>alert('New-Password was empty!')</script>";
		 					 echo "<script>window.open('Login.php', '_self')</script>";
						}
						else
						{
							if(trim($cpass) == "")
							{
								echo "<script>alert('Confirm-Password was empty!')</script>";
								echo "<script>window.open('Login.php', '_self')</script>";
							}
							else
							{
								if($pass != $cpass)
								{
									echo "<script>alert('Password was Miss-Matched!')</script>";
									echo "<script>window.open('Login.php', '_self')</script>";
								}
								else
								{
									if(strlen($pass) < 8)
									{
										echo "<script>alert('Password length is less than eight!')</script>";
										echo "<script>window.open('Login.php', '_self')</script>";
									}
									else
									{
										if($_POST['day'] == "day" || $_POST["month"] == "month" || $_POST["year"] =="year")
										{
											echo "<script>alert('You did not select your DOB!')</script>";
											echo "<script>window.open('Login.php', '_self')</script>";
										}
										else
										{
												$insert = "insert into users (f_name,l_name,user_name,describe_user,Relationship,user_pass,user_email,user_country,user_gender,user_birthday,user_image,user_cover,user_reg_date,status,posts,recovery_account,phone)
												values('$first_name','$last_name','$username','This is my default status!','...','$pass','$str','$country','$gender','$birthday','$profile_pic','default_cover.jpg',NOW(),'$status','$posts','I want to put adding intheuniverse.','$phone')";
		
													//echo $sql;
												$r=updateSQL($insert);
												echo $r;
												if($r==1)
												{
													echo '<script>alert("Well Done you are good to go.")</script>';
													echo "<script>window.open('Login.php', '_self')</script>";
												}
												else 
												{
													echo "<script>alert('Registration failed, please try again!')</script>";
													echo "<script>window.open('Login.php', '_self')</script>";
												}
										}
									}
								}
							}
						}
					}

					else
					{
						 echo "<script>alert('Phone Number was invalid!')</script>";
		 		 		 echo "<script>window.open('Login.php', '_self')</script>";
					}
				}
			}
		}
	}

}

?>