<?php
 session_start();
    if(!isset($_SESSION['id']))
   {
    header("location:adminlogin.php");
   }
   else
   { 


include 'config.php';
include 'header.php'; 

			$count=0;
            //SHOWING SYMBOL FOR PRICING
            $query					=	"select * from settings where id = 1  ";
            $rs11		    		=	mysqli_query($conn,$query) or die(mysqli_error());
            $row11		  			=	mysqli_fetch_array($rs11);
            $currencysymbol12       		= 	$row11['currency'];
            //payments showing
		$query	=	"select * from lox_payments ORDER BY lox_payment_date DESC";
		$rs		 =	mysqli_query($conn,$query) or die(mysqli_error());
		$html = "";
		while($row		=	mysqli_fetch_array($rs))
		{	
			$payment_date = $row['lox_payment_date'];	
			$row_id		  = $row['id'];	
			$current_date =  date('y-m-d H:i:s');
			$old_date  = date($payment_date);
			$time1 = new DateTime($old_date);
			$time2 = new DateTime($current_time);
			$timediff = $time1->diff($time2);
			$time_expire =$timediff->format('%h hour %i minute %s second');
			$time_extend = $timediff->d;
			if (($time_extend>0) && ($row['lox_access_time_expiry'])=='1')
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
						//Accessing username
						$query					=	"select username from users where id = '".$row['lox_user_id']."'  ";
            		$rs111	    		=	mysqli_query($conn,$query) or die(mysqli_error());
           			$row111		  			=	mysqli_fetch_array($rs111);

           			//Accessing user type
           			$query					=	"select cat_name from category where cat_id = '".$row['lox_passanger_type']."' ";
            		$rs1112	    		=	mysqli_query($conn,$query) or die(mysqli_error());
           			$row1112		  			=	mysqli_fetch_array($rs1112);
							
           			if($row['lox_payment_status']==1)
           			{
           				$completed='Completed';
           			}
           			if($row['lox_comments']!='Payment Successfull' && $row['lox_comments']!='Process service request successfully.')
           			{
           				$completed='Failed';
           			}


						$count=$count+1;		
					   $html	.=	'
					   
					   <tr style="font-size:11px">
					   <td >'.$count.'</td>
					   <td >'.$row['lox_payment_date'].'</td>
								<td >'.$row111['username'].'</td>
								<td >'.$row1112['cat_name'].'</td>
								<td >'.$row['lox_payment_amount'].' '.$currencysymbol12.'</td>
								<td >'.$row['lox_transaction_id'].'</td>
								<td >'.$row['lox_payment_method'].'</td>
								<td >'.$completed.'</td>
								<td >'.$row['access_time'].' Hr</td>
								<td >'.$time_expire.'</td>
								<td >'.$row['lox_comments'].'</td>
								<td><a href="functions.php?payment_del='.$row['id'].'&&id='.$row['id'].'"><i class="fa fa-minus-square icon-white"></i></a> </td>
								</tr>';
		}
?>



<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">List of Users Payments and Website Access Time</strong>
                    </div>
                    <div class="card-body">
                        <p align="right"><a class="btn btn-success" href="lox_add_payment_manually.php"><i
                                    class="glyphicon glyphicon-edit icon-white"></i>Add Manual Payment</a></p>
                        <table id="bootstrap-data-table-export"
                            class="table table-sm table-bordered bootstrap-datatable datatable responsive">
                            <thead>
                                <tr>

                                <th>Sr No#</th>    
								<th>Date & Time</th>
                                    <th>Username</th>
                                    <th>Category</th>
                                    <th>Amount</th>
                                    <th>Trx Id</th>
                                    <th>Payment Method</th>
                                    <th>Status</th>
                                    <th>Access Time</th>
                                    <th>Time Utilize</th>
                                    <th>Payment Comment</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <?php echo $html;?>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if($_SESSION['error_msg']!=''){echo $_SESSION['error_msg']; $_SESSION['error_msg']='';}?>










<?php }

 include 'footer.php';

?>