<?php 
session_start();
    if(!isset($_SESSION['id']))
   {
    header("location:adminlogin.php");
   }
   else
   { 

include "header.php"?>

			<div class="content mt-3">
				<div class="animated fadeIn">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<strong class="card-title">Dashboard</strong>
								</div>
								<div class="card-body">
									<p align="center"><img src="img/mypic1.jpg"></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> 
    

    <?php include "footer.php";}

        if(time() - $_SESSION['timestamp'] > 900) 
        { //subtract new timestamp from the old one
               unset($_SESSION['id'],  $_SESSION['timestamp']);
               header("Location:adminlogin.php"); //redirect to index.php
               exit;
        }
        else 
        {
            $_SESSION['timestamp'] =  time();
        }
?>