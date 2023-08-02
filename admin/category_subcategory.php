<?php
require_once "config.php";
$category_id = $_POST["category_id"];
$result = mysqli_query($conn,"SELECT * FROM lox_per_day_rate where lox_passanger_type = $category_id");
?>

<?php
while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row["id"];?>"><?php echo $row["lox_passanger_logistic_time"];?> Hour for <?php echo $row["lox_passanger_logistic_rate"];?> MK</option>

<?php
}
?>