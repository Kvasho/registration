<?php 

if(!$name) {
    $errors[] = 'შეიყვანეთ სახელი !!!';
}
if(!$surname) {
    $errors[] = 'შეიყვანეთ გვარი !!!';
}
if(!$id_number) {
    $errors[] = 'შეიყვანეთ პირადი ნომერი !!!';
}
if(!$email) {
    $errors[] = 'შეიყვანეთ იმეილი !!!';
}
if(!$password) {
    $errors[] = 'შეიყვანეთ პაროლი !!!';
}
if($password !== $password2){
    $errors[] = 'პაროლები არ ემთხვევა ერთმანეთს !!!';
}

?>