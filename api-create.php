<?php
header('Content-Type:application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods
, Authorization,X-Requested-With');
$data= json_decode(file_get_contents("php://input"), true);
$user_name = $data['name'];
$user_email = $data['email'];
$user_contact = $data['contactno'];
$user_password = $data['password'];
$user_address = $data['shippingAddress'];
$user_state = $data['shippingState'];
$user_city = $data['shippingCity'];
$user_pin = $data['shippingPincode'];
$user_add = $data['billingAddress'];
$user_bilstate = $data['billingState'];
$user_bilcity = $data['billingCity'];
$user_pincode = $data['billingPincode'];
$user_update = $data['updationDate'];

include "config.php";
$sql="INSERT into users(name, email, contactno, password, shippingAddress,shippingState,shippingCity,shippingPincode,billingAddress,billingState,billingCity,billingPincode,updationDate) VALUES('{$user_name}','{$user_email}',{$user_contact},'{$user_password}','{$user_address}','{$user_state}','{$user_city}','{$user_pin}','{$user_add}','{$user_bilstate}','{$user_bilcity}','{$user_pincode}','{$user_update}')";

if(mysqli_query($conn,$sql)){
    echo json_encode(array('message' => 'users record inserted.','status'=>true));

}else{
echo json_encode(array('message' => 'users record not inserted.','status'=>false));
}
?>
