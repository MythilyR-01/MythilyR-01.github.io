

<?php
$name=$_POST['u_name'];
$email=$_POST['u_email'];
$mobileno=$_POST['u_phone'];
$doorno=$_POST['u_dno'];
$street=$_POST['u_strt'];
$dist=$_POST['u_dist'];
$pin=$_POST['u_pin'];
$state=$_POST['u_state'];
$adults=$_POST['adult_c'];
$child=$_POST['child_c'];

//database connection
$conn=new mysqli('localhost','root','','themepark');
if($conn->connect_error){
	die('Connection Failed :'.$conn->connect_error);
}else{
	$stmt=$conn->prepare("insert into booking(name, email, mobileno, doorno, street, district, pincode, state, adult, child) value(?,?,?,?,?,?,?,?,?,?)");
	$stmt->bind_param("ssisssisii",$name,$email,$mobileno,$doorno,$street,$dist,$pin,$state,$adults,$child);
	$stmt->execute();
	//$last_id = $conn->insert_id;
	//echo "Last inserted ID is: " . $last_id;
	echo '<script>alert("Your ticket is booked!!");</script>';
	//echo "Your ticket is booked !! <br>ENJOY your day in our park ..!";
}
?>