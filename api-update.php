<?php
header('Content-Type:application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods
, Authorization,X-Requested-With');
$data= json_decode(file_get_contents("php://input"), true);
$id= $data['id'];
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
$sql="UPDATE  users SET name ='{$user_name}' , email='{$user_email}' , contactno={$user_contact}, password='{$user_password}', shippingAddress='{$user_address}',shippingState='{$user_state}',shippingCity='{$user_city}',shippingPincode='{$user_pin}',billingAddress='{$user_add}',billingState='{$user_bilstate}',billingCity='{$user_bilcity}',billingPincode='{$user_pincode}',updationDate='{$user_update}' WHERE id={$id}";

if(mysqli_query($conn,$sql)){
    echo json_encode(array('message' => 'users record updated.','status'=>true));

}else{
echo json_encode(array('message' => 'users record not updated.','status'=>false));
}
?>
