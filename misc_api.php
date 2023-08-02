<?php
$category = array(); 
$vehicle_type = array();
$city = array();
$pricing = array();
$faq = array();
$news = array();
error_reporting(0);
include "config.php";
	
//Fetching vehcile category to show in the select options

		$query	=	"select * from lox_vehicle_category ";
		$rs		 =	mysqli_query($conn,$query) or die(mysqli_error());
		while($row		=	mysqli_fetch_array($rs))
		{
			
			$vehicle_type['vehicle_category']=$row['vehicle_category'];
			echo json_encode($vehicle_type);
		}
		
//Fetching cities name
		$query	=	"select * from lox_cityname ";
		$rs		 =	mysqli_query($conn,$query) or die(mysqli_error());
		while($row		=	mysqli_fetch_array($rs))
		{
			
			$city['cityname']=$row['cityname'];
			echo json_encode($city);
		}	
		
//Fetching user type category
		$query	=	"select * from category ";
		$rs		 =	mysqli_query($conn,$query) or die(mysqli_error());
		while($row		=	mysqli_fetch_array($rs))
		{
			
			$category['category_id']=$row['cat_id'];
			$category['category_name']=$row['cat_name'];
			echo json_encode($category);
		}		
		
			
//Fetching Prices
//SHOWING SYMBOL FOR PRICING
$query					=	"select * from settings where id = 1  ";
$rs1		    		=	mysqli_query($conn,$query) or die(mysqli_error());
$row		  			=	mysqli_fetch_array($rs1);
$currency       		= 	$row['currency'];
//SHOWING RATES/PRICES TO THE USERS
//Pricing Page Setup
$query	=	"SELECT lox_per_day_rate.id,lox_per_day_rate.lox_passanger_logistic_rate,lox_per_day_rate.lox_passanger_logistic_time,category.cat_name FROM lox_per_day_rate INNER JOIN category ON lox_per_day_rate.lox_passanger_type = category.cat_id";
		$rs		 =	mysqli_query($conn,$query) or die(mysqli_error());
		
		while($row		=	mysqli_fetch_array($rs))
		{
		
			$pricing['category_name']=$row['cat_name'];
			$pricing['price']=$row['lox_passanger_logistic_rate'] .' '. $currency;
			$pricing['access_time']=$row['lox_passanger_logistic_time'] .' Hour';
			echo json_encode($pricing);
							
		}		
//Fetching Faqs 
		$query	=	"select * from  lox_faq ";
		$rs		 =	mysqli_query($conn,$query) or die(mysqli_error());
		while($row		=	mysqli_fetch_array($rs))
		{
			
			$faq['faq_question']=$row['faq_question'];
			$faq['faq_answer']=$row['faq_answer'];
			echo json_encode($faq);
		}		
//Fetching News
$query	=	"select * from lox_news ORDER BY id DESC ";
			$rs		 =	mysqli_query($conn,$query) or die(mysqli_error());
		$news_page = "";
		while($row		=	mysqli_fetch_array($rs))
		{
        $news['image']='uploads/news/'.$row['news_picture'].'';
		$news['news_title']=$row['news_title'];
		$news['news_content']=$row['news_content'];
		echo json_encode($news);
		}									
		?>