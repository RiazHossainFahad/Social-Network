<?php
session_start();
include("includes/header.php");

	if (isset($_POST['confirm']))
		{

			$delete_user = " delete from users where user_id='$user_id' ";

			$run = mysqli_query($con, $delete_user);

			$delete_posts = " delete from posts where user_id='$user_id' ";

			$run_p = mysqli_query($con, $delete_posts);

			$delete_messages_to= " delete from user_messages where user_to='$user_id' ";

			$run_m_t = mysqli_query($con, $delete_messages_to);
			
			$delete_messages_from= " delete from user_messages where user_from='$user_id' ";

			$run_m_f = mysqli_query($con, $delete_messages_from);	

			$delete_friends = " delete from friends where user_id='$user_id' ";

			$run_f = mysqli_query($con, $delete_friends);

			$delete_friends_f_id = " delete from friends where f_id='$user_id' ";

			$run_f_id = mysqli_query($con, $delete_friends_f_id);

			$delete_comment = " delete from comments where comment_author='$user_name' ";

			$run_c = mysqli_query($con, $delete_comment);



				if($run != 0)
				{

					echo"<script> alert('Account Deleted')</script>";
					echo"<script>window.open('Login.php','_self')</script>";

				}
				else
				{
				echo"<script> alert('Error while updating information')</script>";
				echo"<script>window.open('edit_profile.php?u_id=$user_id','_self')</script>";
												
				}
		}
?>