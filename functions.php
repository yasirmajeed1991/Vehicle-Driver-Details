<?php 
 if(!isset($_SESSION)) 
		{ 
			session_start(); 
		}
ob_start();
	$universal_id = $_SESSION['user_id'];
include "config.php";
//User Payment History Record and stopping access of a customer once time expired
	 
	if(!empty($universal_id))
	 {
	 	$universal_id = $_SESSION['user_id'];	
		$query	=	"select * from lox_payments where lox_user_id='".$universal_id."'";
		$rs		 =	mysqli_query($conn,$query) or die(mysqli_error());
		$serial_no=0;
		$html = "";
		while($row		=	mysqli_fetch_array($rs))
		{	$serial_no = $serial_no+1;
			$payment_date = $row['lox_payment_date'];	
			$row_id		  = $row['id'];	
			$current_date =  date('y-m-d H:i:s');
			$old_date  = date($payment_date);
			$time1 = new DateTime($old_date);
			$time2 = new DateTime($current_time);
			$timediff = $time1->diff($time2);
			$time_expire =$timediff->format('%h hour %i minute %s second');
		 	$time_extend = $timediff->h;
		 	$access_time_exceed = $row['access_time'];

			
			if (($time_extend>=$access_time_exceed) && ($row['lox_access_time_expiry'])=='1')
			{
				$query = "update lox_payments set lox_access_time_expiry='0' where id=$row_id";
				mysqli_query($conn,$query) or die(mysqli_error());
			}
			else 
			{
				if($row['lox_access_time_expiry']=="0")
				{
					$time_expire = "<h6><span class='badge badge-danger'>Time Expired</span></h6>";
				}
				if($row['lox_access_time_expiry']!="0")
				{				
					 $time_expire= $timediff->format('%h hour %i minute %s second');
					 $time_expire= "<h6><span class='badge badge-success'>$time_expire</span></h6>";
				}
			}	
						
           			//Accessing user type
           			$query					=	"select cat_name from category where cat_id = '".$row['lox_passanger_type']."' ";
            		$rs1112	    		=	mysqli_query($conn,$query) or die(mysqli_error());
           			$row1112		  			=	mysqli_fetch_array($rs1112);
							
           			if($row['lox_payment_status']==1)
           			{
           				$completed='Completed';
           			}


								$payment_history_result	.=	'<tr style="font-size:11px">
								<td >'.$serial_no.'</td>
								<td >'.$row['lox_payment_date'].'</td>
								<td >'.$row1112['cat_name'].'</td>
								<td >'.$row['lox_payment_amount'].' '.$currency .'</td>
								<td >'.$row['lox_transaction_id'].'</td>
								<td >'.$row['lox_payment_method'].'</td>
								<td >'.$completed.'</td>
								<td >'.$row['access_time'].' Hr</td>
								<td >'.$time_expire.'</td>
								<td >'.$row['lox_comments'].'</td>
								
								</tr>';
		}		

	}


//FEEDBACK FUNCTION TO SHOW FEEDBACKS TO USERS ON INDEX PAGE
   		include "config.php";
		$feedback_clients='';
		$loop_circle=0;
		$feedback_state="active";
		$query	=	"select * from lox_feedback where status='Active' ORDER BY id DESC  ";
		$rs		 =	mysqli_query($conn,$query) or die(mysqli_error());
		$html = "";
		while($row		=	mysqli_fetch_array($rs))
		{			
					if($loop_circle!=0)
					{
					$feedback_state = "";			
					}
					$feedback_clients	.=	'	<div class="carousel-item '.$feedback_state.'">
										<blockquote class="rn-testimonial2-item">
											<p>'.$row['content'].'</p>
												<footer>
												<div class="rn-testimonial-author"><strong>'.$row['username'].'</strong>
													<p>'.$row['company'].'</p>
												</div>
											</footer>
										</blockquote>
									</div> ';
									$loop_circle=$loop_circle+1;
		}

//COUNT OF CATEGORIES DISPLAY ON INDEX PAGE AND ABOUT US PAGE
$query = "SELECT category.cat_name,users.role_id,
    count(*) AS total
FROM users INNER JOIN category ON category.cat_id = users.role_id
GROUP by role_id
";
$total_users		 =	mysqli_query($conn,$query) or die(mysqli_error());
$count_up='';
while($totalling_users   =	mysqli_fetch_array($total_users))
{

	$count_up.='<div class="col-6">

					<!-- CountUp Item-->
					<div class="rn-counter-item">
						<div class="rn-counter-number-container">
							<span class="rn-counter-number">'.$totalling_users['total'].'</span>
							<span class="rn-counter-postfix">+</span>
						</div>
						<div class="rn-counter-text">'.$totalling_users['cat_name'].'</div>
					</div>

				</div>';
}


		/*


$query = "select * from lox_service_rider_transport where service_completed_status='completed'";
$result= mysqli_query($conn,$query) or die(mysqli_error());
$lox_service_rider_transport1=mysqli_num_rows($result); */
//POSITIVE_RATING_WILL_ADDED_LATER_ON

//NEWS_SECTION_NEEDS_TO_BE_APPEARED_ON_INDEX_PAGE
		$query	=	"select * from lox_news ORDER BY id DESC LIMIT 3";
			$rs		 =	mysqli_query($conn,$query) or die(mysqli_error());
		$news_section = "";
		while($row		=	mysqli_fetch_array($rs))
		{
//EXPLODING DATE 
$orderdate = explode('-', $row['date']);
$year	 = $orderdate[0];
$month   = $orderdate[1];
$day   	 = $orderdate[2];	
if($month ==1){ $month='January';}
if($month ==2){ $month='Feburary';}
if($month ==3){ $month='March';}
if($month ==4){ $month='April';}
if($month ==5){ $month='May';}
if($month ==6){ $month='June';}
if($month ==7){ $month='July';}
if($month ==8){ $month='August';}
if($month ==9){ $month='September';}
if($month ==10){ $month='October';}
if($month ==11){ $month='November';}
if($month ==2){ $month='December';}
		$news_section	.=	'<div class="col-md-4">
								<div class="rn-post-item rn-post-size-sm">
										<div class="rn-post-item-thumb">
											<a href="news.php">
												<img src="uploads/news/'.$row['news_picture'].'" alt="'.$row['news_title'].'" width="300" height="250" />
											</a>
										</div>
										<div class="rn-post-item-header">
											<div class="rn-post-date">
												<div class="rn-post-date-inner">
													<div class="rn-post-date-d">'.$day.'</div>
													<div class="rn-post-date-m-y">'.$month.', '.$year.'</div>
												</div>
											</div>
											<div class="rn-post-item-title-meta">
												<div class="rn-post-item-title-meta-inner">
													<h3 class="rn-post-item-title">
														<a href="news.php">'.$row['news_title'].'</a>
													</h3>
												</div>
											</div>
										</div>
								</div>
							</div>';
			}
//SHOWING THE SAME NEWS ON THE NEWS PAGE IN DIFFERENT SCENARIO
$query	=	"select * from lox_news ORDER BY id DESC ";
			$rs		 =	mysqli_query($conn,$query) or die(mysqli_error());
		$news_page = "";
		while($row		=	mysqli_fetch_array($rs))
		{
//EXPLODING DATE 
$orderdate = explode('-', $row['date']);
$year	 = $orderdate[0];
$month   = $orderdate[1];
$day   	 = $orderdate[2];	
if($month ==1){ $month='January';}
if($month ==2){ $month='Feburary';}
if($month ==3){ $month='March';}
if($month ==4){ $month='April';}
if($month ==5){ $month='May';}
if($month ==6){ $month='June';}
if($month ==7){ $month='July';}
if($month ==8){ $month='August';}
if($month ==9){ $month='September';}
if($month ==10){ $month='October';}
if($month ==11){ $month='November';}
if($month ==2){ $month='December';}
        
        $news_image=$row['news_picture'];
		$news_page	.=	'<article class="rn-post-item rn-post-size-lg">
							<div class="rn-post-item-thumb">
								<span>
									<a href="news.php">
										<img src="uploads/news/'.$row['news_picture'].'" alt="'.$row['news_title'].'" width="550" height="350" />
									</a>	
								</span>
							</div>
							<div class="rn-post-item-header">
								<div class="rn-post-date">
									<div class="rn-post-date-inner">
										<div class="rn-post-date-d">'.$day.'</div>
										<div class="rn-post-date-m-y">'.$month.', '.$year.'</div>
									</div>
								</div>
								<div class="rn-post-item-title-meta">
									<div class="rn-post-item-title-meta-inner">
										<h3 class="rn-post-item-title">
											<span>'.$row['news_title'].'</span>
										</h3>
									</div>
								</div>
							</div>
							<div class="rn-post-item-body">
								<p>'.$row['news_content'].'</p>
							</div>
							</article>';
		}
//FAQ_SECTION_NEEDS_TO_BE_APPEARED_ON_INDEX_PAGE
		$query	=	"select * from lox_faq ";                                                       
		$rs		 =	mysqli_query($conn,$query) or die(mysqli_error());
		$faq_section = "";
		while($row		=	mysqli_fetch_array($rs))
		{
	//EXPLODING DATE 
		$faq_section	.=	'<div class="rn-faq-item">
								<div class="rn-faq-icon">
									<i class="fas fa-question"></i>
								</div>
								<div class="rn-faq-content">
									<h2 class="rn-faq-title">'.$row['faq_question'].'?</h2>
									<p>'.$row['faq_answer'].'.</p>
								</div>
							</div>';
		}

//SHOWING SYMBOL FOR PRICING
$query					=	"select * from settings where id = 1  ";
$rs1		    		=	mysqli_query($conn,$query) or die(mysqli_error());
$row		  			=	mysqli_fetch_array($rs1);
$currency       		= 	$row['currency'];
//SHOWING RATES/PRICES TO THE USERS



//Pricing Page Setup
$serial_no = 0;
$query	=	"SELECT lox_per_day_rate.id,lox_per_day_rate.lox_passanger_logistic_rate,lox_per_day_rate.lox_passanger_logistic_time,category.cat_name FROM lox_per_day_rate INNER JOIN category ON lox_per_day_rate.lox_passanger_type = category.cat_id";
		$rs		 =	mysqli_query($conn,$query) or die(mysqli_error());
		
		while($row		=	mysqli_fetch_array($rs))
		{
			$_SESSION['user_id']=='';
			if($_SESSION['user_id']!='')
			{
						$pay_now='<a class="btn btn-success" target="_blank"  href="dpo_payment.php?service_id='.md5($row['id']).'&payment_make='.md5('fasdfa').'"  >Pay Via Card - Airtel</a>';
				$pay_now1='<a class="btn btn-success"   href="tnm_payment.php?service_id='.md5($row['id']).'&payment_make='.md5('fasdfa').'"  >Pay Via Tnm</a>';
			}
			else
			{
				$pay_now='<a class="btn btn-success  " href="login.php" >Pay Via Card - Airtel</a>';
				$pay_now1='<a class="btn btn-success  " href="login.php" >Pay Via Tnm</a>';		
			}
				
				$pricing_section .='	<div class="col-md-4 ex1">
			                	               <!--PRICE CONTENT START-->
							                    <div class="generic_content active clearfix ">
							                        <!--HEAD PRICE DETAIL START-->
							                        <div class="generic_head_price clearfix">
							                            <!--HEAD CONTENT START-->
							                            <div class="generic_head_content clearfix">
							      	                      <!--HEAD START-->
							                                <div class="head_bg"></div>
							                               	<div class="head"><span>'.$row['cat_name'].'</span></div>
							                                <!--//HEAD END-->
							                            </div>
							                            <!--//HEAD CONTENT END-->
							                            <!--PRICE START-->
							                            <div class="generic_price_tag clearfix">
							                                <span class="price">
							                                    <span class="sign">'.$currency.'</span>
							                                    <span class="currency">'.$row['lox_passanger_logistic_rate'].'</span>
							                                    <span class="month">/'.$row['lox_passanger_logistic_time'].'Hr</span>
							                                </span>
							                            </div>
							                            <!--//PRICE END-->
							                        </div>                            
							                        <!--//HEAD PRICE DETAIL END-->
							                        <!--FEATURE LIST START-->
							                    	<div>
							                            <li>Get Full Access To <br>
							                            '.$row['cat_name'].' Details <br>
							                            in '.$row['lox_passanger_logistic_rate'].' '.$currency .' for 
							                             '.$row['lox_passanger_logistic_time'].' Hr
							                            </li>
							                                <li> In case of any issue reach us via email</li>
							                        </div>
							                        <!--//FEATURE LIST END-->
							                        <!--BUTTON START-->
							                        <div class="btn-success">
								                        <a  href="#">'.$pay_now.'</a>
								                        <a  href="#">'.$pay_now1.'</a>
								                    </div>
							                        <!--//BUTTON END-->
							                    </div>
										</div>';					
		}	




//DELETING THE RECORD OF RIDES AND ALSO UPDATING THE STATUS OF RIDES WITH
//Deleting a user from drivers record and also images related to driver
if($_GET['rider_id']!="" && $_GET['rider_del']!=""){
	
	$id		=	$_GET['rider_id'];
	 $query	="DELETE From lox_service_rider_transport where id = $id";
	$rs		 =	mysqli_query($conn,$query) or die(mysqli_error());
	$_SESSION['message_success']  = '<p class="alert alert-danger" role="alert">
   Record Has Been Deleted Succesfully.
</p>';
	header ('location: rides.php');
    }
	
//RIDE DATA HAS TO BE INSERTED
if($_GET['ride_created']!="")
{
	
	$_SESSION['message_success']='<p class="alert alert-success" role="alert"> Ride Has Been Added Successfully!</p>'; 
	header("location:rides.php");
}	
 if($_GET['ride_pm']!="")
{
	
	$_SESSION['message_success']='<p class="alert alert-success" role="alert"> Payment Method Has Been Updated Successfully!</p>'; 
	header("location:ridepm.php");
} 
	//WHEN USER MAKES A WITHDRAW FROM ACCOUNT
	 if(!empty($_GET['withdraw']) && !empty($_GET['user']) && !empty($_GET['id']))
	 {
		
		$id = $_GET['id'];
		$query = "SELECT * FROM lox_drivers WHERE id=$id";	
		$rs = mysqli_query($conn,$query) or die(mysqli_error());
		$row	= mysqli_fetch_array($rs);
		$withdrawl_amount	=	$row['wallet_amount'];
		if($withdrawl_amount>5)
		{	
			//FETCHING RIDER PAYMENT METHOD DETAIL 
			$query = "SELECT * FROM lox_payment_method WHERE user_id=$id";	
			$rs = mysqli_query($conn,$query) or die(mysqli_error());
			$row1	= mysqli_fetch_array($rs);
			$payment_method = $row1['payment_method_name'];
			$title_of_account = $row1['title_of_account'];
			$account_no = $row1['account_number'];
			$payment_method1 = $payment_method .'<br>'. $title_of_account .'<br>'. $account_no;
			if(empty($payment_method) && empty($title_of_account) && empty($account_no) )
			{
				$_SESSION['message_success']='<p class="alert alert-danger" role="alert"> Please <a href="ridepm.php"></a>update your payment method before withdrawing fund! Thank You!</p>'; 
				header("location:ridewh.php");
			}
			else
			{	
				//UPDATING RIDER RECORD IN DRIVER TABLE
				$query = "UPDATE lox_drivers SET wallet_amount='0' WHERE id=$id";	
				mysqli_query($conn,$query) or die(mysqli_error());
				//INSERTING WITHDRAWL HISTORY
				$query = "INSERT INTO lox_withdraw_history (user_id,user_type,amount,payment_method,status) VALUES('$id','rider','$withdrawl_amount','$payment_method1','Pending')";	
				mysqli_query($conn,$query) or die(mysqli_error());
				$_SESSION['message_success']='<p class="alert alert-success" role="alert"> Withdrawl is submitted for approval please allow us 24 to 72 hours for processing! Thank You!</p>'; 
				header("location:ridewh.php");	
			}
			
		}	
		
	} 
 if($_GET['update_rider']!="")
{
	
	$_SESSION['message_success']='<p class="alert alert-success" role="alert"> Record Has Been Updated Succesfully!</p>'; 
	header("location:ridersetting.php");
} 
 if($_GET['profile_updated']!="")
{
	
	$_SESSION['message_success']='<p class="alert alert-success" role="alert"> Profile Has Been Updated Succesfully!</p>'; 
	header("location:passanger.php");
} 
//Logisitc Record For Shwoing Message after succesfully work
if($_GET['logistic_created']!="")
{
	
	$_SESSION['message_success']='<p class="alert alert-success" role="alert"> Logistic Detail Has Been Added Successfully!</p>'; 
	header("location:ridesl.php");
}	
//Deleting a user from logistic record 
if($_GET['logistic_id']!="" && $_GET['logistic_del']!=""){
	
	$id		=	$_GET['logistic_id'];
	 $query	="DELETE From lox_service_rider_transport where id = $id";
	$rs		 =	mysqli_query($conn,$query) or die(mysqli_error());
	$_SESSION['message_success']  = '<p class="alert alert-danger" role="alert">
   Record Has Been Deleted Succesfully.
</p>';
	header ('location: ridesl.php');
    }

//WHEN LOGISTIC USER MAKES A WITHDRAW FROM ACCOUNT
	 if(!empty($_GET['logistic_withdraw']) &&  !empty($_GET['user']) && !empty($_GET['id']))
	 {
		
		$id = $_GET['id'];
		$query = "SELECT * FROM  lox_logistic_company WHERE id=$id";	
		$rs = mysqli_query($conn,$query) or die(mysqli_error());
		$row	= mysqli_fetch_array($rs);
		$withdrawl_amount	=	$row['wallet_amount'];
		if($withdrawl_amount>5)
		{	
			//FETCHING Logistic PAYMENT METHOD DETAIL 
			$query = "SELECT * FROM lox_payment_method WHERE user_id=$id";	
			$rs = mysqli_query($conn,$query) or die(mysqli_error());
			$row1	= mysqli_fetch_array($rs);
			$payment_method = $row1['payment_method_name'];
			$title_of_account = $row1['title_of_account'];
			$account_no = $row1['account_number'];
			$payment_method1 = $payment_method .'<br>'. $title_of_account .'<br>'. $account_no;
			if(empty($payment_method) && empty($title_of_account) && empty($account_no) )
			{
				$_SESSION['message_success']='<p class="alert alert-danger" role="alert"> Please <a href="ridepml.php"></a>update your payment method before withdrawing fund! Thank You!</p>'; 
				header("location:ridewhl.php");
			}
			else
			{	
				//UPDATING LOGISTIC RECORD IN LOGISTIC TABLE
				$query = "UPDATE  lox_logistic_company SET wallet_amount='0' WHERE id=$id";	
				mysqli_query($conn,$query) or die(mysqli_error());
				//INSERTING WITHDRAWL HISTORY
				$query = "INSERT INTO lox_withdraw_history (user_id,user_type,amount,payment_method,status) VALUES('$id','logistic','$withdrawl_amount','$payment_method1','pending')";	
				mysqli_query($conn,$query) or die(mysqli_error());
				$_SESSION['message_success']='<p class="alert alert-success" role="alert"> Withdrawl is submitted for approval please allow us 24 to 72 hours for processing! Thank You!</p>'; 
				header("location:ridewhl.php");	
			}
			
		}	
		
	} 
if($_GET['logistic_pm']!="")
{
	
	$_SESSION['message_success']='<p class="alert alert-success" role="alert"> Payment Method Has Been Updated Successfully!</p>'; 
	header("location:ridepml.php");
} 
 if($_GET['update_logistic']!="")
{
	
	$_SESSION['message_success']='<p class="alert alert-success" role="alert"> Profile Has Been Updated Succesfully!</p>'; 
	header("location:ridersettingl.php");
} 
 if($_GET['logistic_add_error']!="")
{
	
	$_SESSION['message_success']='<p class="alert alert-danger" role="alert"> This Record Has been Already Existed Please Add Another!</p>'; 
	header("location:newvehc.php");
} 
if($_GET['logistic_add_success']!="")
{
	
	$_SESSION['message_success']='<p class="alert alert-success" role="alert"> New Logistic Has Been Added Succesfully!</p>'; 
	header("location:logvehc.php");
} 
//DELETING VEHICLE TYPE and the Image related to It
	if($_GET['vehicle_id_del']!="")
	{
		
		$id		=	$_GET['vehicle_id_del'];
		//Selecting the date of image to delete
		$query	="Select * From lox_logistic_vehicles where id = $id limit 1";
		$rs = mysqli_query($conn,$query);
		$row =	mysqli_fetch_array($rs);
		$imageUrl = $row['lox_driver_vehicle_picture'];
		 //check if image exists
		if(file_exists($imageUrl))
  		{
    		//delete the image
    		unlink($imageUrl);
		}
		//Deleting the record of the user
		$query	="DELETE From  lox_logistic_vehicles where id = $id";
		$rs		 =	mysqli_query($conn,$query) or die(mysqli_error());
		$_SESSION['message_success']  = '<p class="alert alert-danger" role="alert">
	   	Record Has Been Deleted Succesfully.
		</p>';
		header ('location:logvehc.php');
    }
	if($_GET['logistic_update_error']!="")
	{
		
		$_SESSION['message_success']='<p class="alert alert-danger" role="alert"> This Record Has been Already Existed Please Add Another!</p>'; 
		header("location:newvehc.php?logistic_vehicle=1");
	}  
	if($_GET['logistic_update_success']!="" && $_GET['id']!="")
	{
		
		$id = $_GET['id'];
		$_SESSION['message_success']='<p class="alert alert-success" role="alert"> This Record Has been Updated Successfully!</p>';
		 header("location:updatevehc.php?id=".$id."");
	}
	if($_GET['email']!="")
{
	
	$_SESSION['message_success']='<p class="alert alert-success" role="alert"> Email Has Been Sent On Your Registered Email With Activation Link For Resetting Password!</p>'; 
	header("location:forgotpassword.php");
} 
if($_GET['email-sent']!="")
{
	
	$_SESSION['message_success']='<p class="alert alert-danger" role="alert"> Invalid Details! <a href="register.php">click here</a> to Register Account!!</p>'; 
	header("location:forgotpassword.php");
} 
if($_GET['user_update']!="")
{
	
	$_SESSION['message_success']='<p class="alert alert-success" role="alert"> Passanger Details Has Been Updated Successfully!</p>'; 
	header("location:passangerse.php");
}
//user already existed
if($_GET['user_existed']!="")
{
	
	$_SESSION['message_success']='<p class="alert alert-danger" role="alert">  User Record already registered <a href="forgotpassword.php">click here</a> to recover your password!</p>'; 
	header("location:register.php");
}
//user already existed
if($_GET['invalid_login_details']!="")
{
	
	$_SESSION['message_success']='<p class="alert alert-danger" role="alert">  Invalid Login Details! <a href="register.php">click here</a> to Register Account! or <a href="forgotpassword.php">Recover Your Password</a></p>'; 
	header("location:login.php");
}
//user already existed
if($_GET['register_user_detail']!="")
{
	
	$_SESSION['message_success']='<div class="alert alert-success" role="alert">  User Has Been Registered Successfully! Please Login With The Provided Details!</a></div>'; 
	header("location:login.php");
}
if($_GET['feedback_inserted']!="")
{
	
	$_SESSION['message_success']='<p class="alert alert-success" role="alert">Feedback Has Been Given Successfully!</a></p>'; 
	header("location:passanger.php");
}
if($_GET['feedback_existed']!="")
{
	
	$_SESSION['message_success']='<p class="alert alert-danger" role="alert">Feedback Has Been already Given you cannot give twice!</a></p>'; 
	header("location:passanger.php");
}
if($_GET['pcp']!="")
{
	
	$_SESSION['message_success']='<p class="alert alert-success" role="alert"> Password has been changed successfully!</p>'; 
	header("location:passanger.php");
}
if($_GET['rcp']!="")
{
	
	$_SESSION['message_success']='<p class="alert alert-success" role="alert"> Password has been changed successfully!</p>'; 
	header("location:rider.php");
}
if($_GET['lcp']!="")
{
	
	$_SESSION['message_success']='<p class="alert alert-success" role="alert"> Password has been changed successfully!</p>'; 
	header("location:logistic.php");
}
?>
