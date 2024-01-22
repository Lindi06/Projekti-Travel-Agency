<?php

$userId = $_GET['id'];
include_once 'C:\xampp\htdocs\Projekti-Travel-Agency\Projekti-Travel-Agency\model\userrespository.php';



$userRepository = new userrespository();

$userRepository->deleteUser($userId);

header("location:dashboard.php");


?>