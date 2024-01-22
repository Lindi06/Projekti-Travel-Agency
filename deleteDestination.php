<?php
include_once 'C:\xampp\htdocs\Projekti-Travel-Agency\Projekti-Travel-Agency\model\destinationRepository.php';


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $destinationRepository = new destinationrespository();
    $destinationRepository->deleteDestination($id);

    header("location:destinations.php");
} else {
    echo "Invalid request: No 'id' parameter provided.";
}
?>
