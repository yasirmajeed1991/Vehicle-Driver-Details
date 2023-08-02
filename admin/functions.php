<?php
session_start();
ob_start();
/*-----------------------------------------------------------------------------------------------------------------------*/	
include"config.php"; 
// USERMANAGEMENT DETAILS

//message for adding user	

if($_GET['add_user']!="")
	{
		$_SESSION['error_msg']  = '<p class="alert alert-success" role="alert">
		User Registered Successfully.
		</p>';
		header ('location: lox_view_user.php');
    }	
   if($_GET['profile_updated']!="" && $_GET['id']!="")
	{	

		$id=$_GET['id'];
		$_SESSION['error_msg']  = '<p class="alert alert-success" role="alert">
		User profile has been updated succesfully.
		</p>';
		header ("location: lox_update_user.php?id=".$id."");
    } 
    if($_GET['register_user_detail']!="" )
	{	

		$id=$_GET['id'];
		$_SESSION['error_msg']  = '<p class="alert alert-success" role="alert">
		New User profile has been registered succesfully.
		</p>';
		header ("location: lox_view_user.php");
    }
//message for existing user	
if($_GET['exist_user']!="")
	{
		$_SESSION['error_msg']  = '<p class="alert alert-danger" role="alert">
		User Record Already Existed.
		</p>';
		header ('location: lox_view_user.php');
    }	
//message for updating user

if($_GET['update_user']!="")
	{
		$_SESSION['error_msg']  = '<p class="alert alert-success" role="alert">
		User Updated Successfully.
		</p>';
		header ('location: lox_view_user.php');
    }
if($_GET['user_delete']!="" )
	{
		$id		=	mysqli_real_escape_string($conn,($_GET['user_delete']));
		$query	="Select * From users where id = $id and status=0 limit 1";
		$rs = mysqli_query($conn,$query);
		$row =	mysqli_fetch_array($rs);
		$imageUrl = '../uploads/'.$row['picture'];
	 	unlink($imageUrl);
		$query	="DELETE FROM users WHERE id=$id";
		$rs = mysqli_query($conn,$query);

		$query	="DELETE FROM lox_payments WHERE lox_user_id=$id";
		$rs = mysqli_query($conn,$query);

		$query	="DELETE FROM lox_customer_feedback WHERE user_id=$id";
		$rs = mysqli_query($conn,$query);

		$query	="DELETE FROM role WHERE user_id=$id;";
		$rs = mysqli_query($conn,$query);
		
		$_SESSION['error_msg']  = '<p class="alert alert-danger">User record Has Been deleted Successfully!</p>';
		header ('location: lox_view_inactive_user.php');
	}		
	
	
/*-----------------------------------------------------------------------------------------------------------------------*/		

 

//Deactivating  a user from  record

if($_GET['user_inactive']!="" )
	{
		$id		=	mysqli_real_escape_string($conn,($_GET['user_inactive']));
		$query	="UPDATE users SET status=0 where id = $id";
		$rs = mysqli_query($conn,$query);
		$_SESSION['error_msg']  = '<p class="alert alert-danger">User Has Been Deactivated Successfully!</p>';
		header ('location: lox_view_user.php');
	}
if($_GET['user_active']!="" )
	{
		$id		=	mysqli_real_escape_string($conn,($_GET['user_active']));
		$query	="UPDATE users SET status=1 where id = $id";
		$rs = mysqli_query($conn,$query);
		$_SESSION['error_msg']  = '<p class="alert alert-success">User Has Been Activated Successfully!</p>';
		header ('location: lox_view_user.php');
	}
	


	
/*-----------------------------------------------------------------------------------------------------------------------*/		
		
//DELETING_CATEGORY_LIST_VEHICLES

//Deleting A CATEGORY FROM VEHICLES LIST

if($_GET['category_del']!="" && $_GET['vechicle_category']!="")
	{
		$id		=	mysqli_real_escape_string($conn,($_GET['category_del']));
		$query	="DELETE From lox_vehicle_category where id = $id";
		$rs = mysqli_query($conn,$query);
		$row =	mysqli_fetch_array($rs);
		//check if image exists
		$_SESSION['error_msg']  = '<p class="alert alert-danger" role="alert">
		Vechile Type '.$_GET['vechicle_category'].' Has Been Deleted Succesfully.
		</p>';
		header ('location: lox_view_vehicle_category.php');
    }
	
//updating vehicle category	
if($_GET['update_vehicle_category']!="")
	{
		$_SESSION['error_msg']  = '<p class="alert alert-success" role="alert">
		Vechile Category Updated Successfully.
		</p>';
		header ('location: lox_view_vehicle_category.php');
    }



//adding vehicle category

if($_GET['add_vehicle_category']!="")
	{
		$_SESSION['error_msg']  = '<p class="alert alert-success" role="alert">
		Vechile Category added Successfully.
		</p>';
		header ('location: lox_view_vehicle_category.php');
    }		

//message for existing vehicle category

if($_GET['exist_vehicle_category']!="")
	{
		$_SESSION['error_msg']  = '<p class="alert alert-danger" role="alert">
		Vehicle Category Already Existed.
		</p>';
		header ('location: lox_view_vehicle_category.php');
	}		
	
	
	
/*-----------------------------------------------------------------------------------------------------------------------*/	
	

//Deleting A CITY FROM CITY NAME LIST

if($_GET['city_del']!="" && $_GET['city_name']!="")
	{
		$id		=	mysqli_real_escape_string($conn,($_GET['city_del']));
		$query	="DELETE From lox_cityname where id = $id";
		$rs = mysqli_query($conn,$query);
		$row =	mysqli_fetch_array($rs);
		$_SESSION['error_msg']  = '<p class="alert alert-danger" role="alert">
		City Name '.$_GET['city_name'].' Has Been Deleted Succesfully.
		</p>';
		header ('location: lox_view_cityname.php');
    }

//message for updating city

if($_GET['update_city']!="")
	{
		$_SESSION['error_msg']  = '<p class="alert alert-success" role="alert">
		City Updated Successfully.
		</p>';
		header ('location: lox_view_cityname.php');
    }	
//Updating category
    if($_GET['update_category']!="")
	{
		$_SESSION['error_msg']  = '<p class="alert alert-success" role="alert">
		Category Updated Successfully.
		</p>';
		header ('location: lox_view_category.php');
    }	
//message for adding city

if($_GET['add_city']!="")
	{
		$_SESSION['error_msg']  = '<p class="alert alert-success" role="alert">
		City Name added Successfully.
		</p>';
		header ('location: lox_view_cityname.php');
    }

//message for existing city
	
if($_GET['exist_city']!="")
	{
		$_SESSION['error_msg']  = '<p class="alert alert-danger" role="alert">
		City name Already Existed. Try another one.
		</p>';
		header ('location: lox_view_cityname.php');
	}


/*-----------------------------------------------------------------------------------------------------------------------*/	

//DELETING_PAYMENT_AMOUNT

//Deleting A PAYMENT AMOUNT RECORD FROM LOX-PAYMENT TABLE

if($_GET['payment_del']!="" && $_GET['id']!="")
	{
		$id		=	mysqli_real_escape_string($conn,($_GET['id']));
		$query	="DELETE From lox_payments where id = $id";
		$rs = mysqli_query($conn,$query);
		$row =	mysqli_fetch_array($rs);
		$_SESSION['error_msg']  = '<p class="alert alert-danger" role="alert">
		Payment Record Has Been Deleted Succesfully.
		</p>';
		header ('location: lox_view_payment_manually.php');
    }	

/*-----------------------------------------------------------------------------------------------------------------------*/	

//DELETING_FEEDBACK

//Deleting A FEEDBACK FROM FEEDBACK TABLE

if($_GET['feedback_del']!="" && $_GET['id']!="")
	{
		$id		=	mysqli_real_escape_string($conn,($_GET['id']));
		$query	="DELETE From lox_feedback where id = $id";
		$rs = mysqli_query($conn,$query);
		$row =	mysqli_fetch_array($rs);
		$_SESSION['error_msg']  = '<p class="alert alert-danger" role="alert">
		Feddback Has Been Deleted Succesfully.
		</p>';
		header ('location: lox_view_feedback.php');
    }	
//Deleting A user FEEDBACK FROM user FEEDBACK TABLE

if($_GET['feedback_user_del']!="" && $_GET['id']!="")
	{
		$id		=	mysqli_real_escape_string($conn,($_GET['id']));
		$query	="DELETE From lox_customer_feedback where id = $id";
		$rs = mysqli_query($conn,$query);
		$row =	mysqli_fetch_array($rs);
		$_SESSION['error_msg']  = '<p class="alert alert-danger" role="alert">
		Feedback Has Been Deleted Succesfully.
		</p>';
		header ('location: lox_view_c_feedback.php');
    }	
//message for adding feedback

if($_GET['add_feedback']!="")
	{
		$_SESSION['error_msg']  = '<p class="alert alert-success" role="alert">
		Feedback has been Added Successfully.
		</p>';
		header ('location: lox_view_feedback.php');				
	}
	
//message for updating feedback

if($_GET['update_feedback']!="")
	{
		$_SESSION['error_msg']  = '<p class="alert alert-success" role="alert">
		Feedback has been Updated Successfully.
		</p>';
		header ('location: lox_view_feedback.php');				
	}
	

/*-------------------------------------------------------------------------------------------------------------------------*/

//Deleting A News From News with Image

if($_GET['id']!="" && $_GET['news_del']!="")
	{
		$id		=	mysqli_real_escape_string($conn,($_GET['id']));
		$query	="Select * From lox_news where id = $id limit 1";
		$rs = mysqli_query($conn,$query);
		$row =	mysqli_fetch_array($rs);
		$imageUrl = '../uploads/news/'.$row['news_picture'];
		 //check if image exists
	  
			//delete the image
			unlink($imageUrl);
			//after deleting image you can delete the record
			$query	="DELETE From lox_news where id = $id";
			$rs = mysqli_query($conn,$query);
			$_SESSION['error_msg']  = '<p class="alert alert-danger" role="alert">
			News Has Been Deleted Succesfully.
			</p>';
			header ('location: lox_view_news.php');
		
	}

//message for adding news

if($_GET['add_news']!="")
	{
		$_SESSION['error_msg']  = '<p class="alert alert-success" role="alert">
		News has been Added Successfully.
		</p>';
		header ('location: lox_view_news.php');				
	}

//message for updating news

if($_GET['update_news']!="")
	{
		$_SESSION['error_msg']  = '<p class="alert alert-success" role="alert">
		News has been Updated Successfully.
		</p>';
		header ('location: lox_view_news.php');				
	}		
	
	
/*-------------------------------------------------------------------------------------------------------------------------*/


//Deleting A FAQ FROM FAQ TABLE

if($_GET['faq_del']!="" && $_GET['id']!="")
	{
		$id		=	mysqli_real_escape_string($conn,($_GET['id']));
		$query	="DELETE From lox_faq where id = $id";
		$rs = mysqli_query($conn,$query);
		$row =	mysqli_fetch_array($rs);
		$_SESSION['error_msg']  = '<p class="alert alert-danger" role="alert">
		Faq Has Been Deleted Succesfully.
		</p>';
		header ('location: lox_view_faq.php');
    }
//message for adding faq
if($_GET['add_faq']!="")
	{
		$_SESSION['error_msg']  = '<p class="alert alert-success" role="alert">
		FAQ Added Successfully.</p>';
		header ('location: lox_view_faq.php');
    }	

//message for updating faq
if($_GET['update_faq']!="")
	{
		$_SESSION['error_msg']  = '<p class="alert alert-success" role="alert">
		FAQ Updated Successfully.
		</p>';
		header ('location: lox_view_faq.php');
    }		
	
//message for existing faq

if($_GET['exist_faq']!="")
	{
		$_SESSION['error_msg']  = '<p class="alert alert-danger" role="alert">
		FAQ Already existed.
		</p>';
		header ('location: lox_view_faq.php');
    }

/*-------------------------------------------------------------------------------------------------------------------------*/	
	
//message for updating settings

if($_GET['update_setting']!="")
	{
		$_SESSION['error_msg']  = '<p class="alert alert-success" role="alert">
		Settings Updated Successfully.
		</p>';
		header ('location: settings.php');
    }

/*-------------------------------------------------------------------------------------------------------------------------*/	
	

//DELETING_ADMIN_USER

//Deleting A ADMIN RECORD FROM ADMIN LIST

if($_GET['admin_del']!="" && $_GET['id']!="")
	{
		$id		=	mysqli_real_escape_string($conn,($_GET['id']));
		$query	="DELETE From lox_admin_user where id = $id";
		$rs = mysqli_query($conn,$query);
		$row =	mysqli_fetch_array($rs);
		$_SESSION['error_msg']  = '<p class="alert alert-danger" role="alert">
		Admin User '.$_GET['admin_del'].' Has Been Deleted Succesfully.
		</p>';
		header ('location: lox_view_user_admin.php');
    }	

//updating driver
	
if($_GET['update_adminn']!="")
{
	$_SESSION['error_msg']  = '<p class="alert alert-success" role="alert">
	Admin Updated Successfully.
	</p>';
	header ('location: lox_view_user_admin.php');
}
	
//adding admin user	
	
if($_GET['add_admin']!="")
	{
		$_SESSION['error_msg']  = '<p class="alert alert-success" role="alert">
		User Admin added Successfully.
		</p>';
		header ('location: lox_view_user_admin.php');
    }

//existing admin user
	
if($_GET['exist_admin']!="")
	{
		$_SESSION['error_msg']  = '<p class="alert alert-danger" role="alert">
		Admin User Already Existed. Try another one.
		</p>';
		header ('location: lox_view_user_admin.php');
	}

/*-------------------------------------------------------------------------------------------------------------------------*/
	
//updating per day rate	
	
if($_GET['update_rate']!="")
{
	$_SESSION['error_msg']  = '<p class="alert alert-success" role="alert">
	Per Day Rate Updated Successfully.
	</p>';
	header ('location: lox_view_per_day_rate.php');
}
if($_GET['add_rate']!="")
{
	$_SESSION['error_msg']  = '<p class="alert alert-success" role="alert">
	New Price detail added succesfully.
	</p>';
	header ('location: lox_view_per_day_rate.php');
}
if($_GET['lox_rate_del']!="")
{
	$id = $_GET['lox_rate_del'];
	$query	="DELETE  from lox_per_day_rate where id = $id";
		$rs = mysqli_query($conn,$query);
	$_SESSION['error_msg']  = '<p class="alert alert-danger" role="alert">
	Price has been removed succesfully.
	</p>';
	header ('location: lox_view_per_day_rate.php');
}
/*-------------------------------------------------------------------------------------------------------------------------*/	
//Payment Manually
if($_GET['payment_success']!="")
{
	
	
	$_SESSION['error_msg']  = '<p class="alert alert-success" role="alert">
	Manual Access Granted To a Specified user.
	</p>';
	header ('location: lox_view_payment_manually.php');
}			

/*------------------------------------------------------*/
//Deleting A Licence from Licence Table

if($_GET['id']!="" && $_GET['licence']!="")
	{
		$id		=	mysqli_real_escape_string($conn,($_GET['id']));
		$query	="Select * From licences where id = $id limit 1";
		$rs = mysqli_query($conn,$query);
		$row =	mysqli_fetch_array($rs);
		$imageUrl="../licences/".$row['image'];
		
		 //check if image exists
	  
			//delete the image
			unlink($imageUrl);
			//after deleting image you can delete the record
			$query	="DELETE From licences where id = $id";
			$rs = mysqli_query($conn,$query);
			$_SESSION['error_msg']  = '<p class="alert alert-danger" role="alert">
			Licence Record Has Been Deleted Succesfully.
			</p>';
			header ('location: licence_view.php');
		
	}


?>