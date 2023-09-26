<?php 

if(!$name) {
    $errors[0] = 'შეიყვანეთ სახელი !!!';
}
if(!$surname) {
    $errors[1] = 'შეიყვანეთ გვარი !!!';
}
if(!$id_number) {
    $errors[2] = 'შეიყვანეთ პირადი ნომერი !!!';
}
if(!$email) {
    $errors[3] = 'შეიყვანეთ იმეილი !!!';
}
if(!$password) {
    $errors[4] = 'შეიყვანეთ პაროლი !!!';
}
if($password !== $password2){
    $errors[5] = 'პაროლები არ ემთხვევა ერთმანეთს !!!';
}

?>