<div align="center">
	<?php  if (!empty($_SESSION['message_success']))
		{?>
			<?php echo $_SESSION['message_success']; unset($_SESSION['message_success']);?>
<?php } ?>

</div>