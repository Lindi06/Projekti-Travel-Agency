<?php
include_once 'C:\xampp\htdocs\Projekti-Travel-Agency\Projekti-Travel-Agency\dbConnect.php';
include_once 'C:\xampp\htdocs\Projekti-Travel-Agency\Projekti-Travel-Agency\model\ticket.php';
include_once 'C:\xampp\htdocs\Projekti-Travel-Agency\Projekti-Travel-Agency\model\ticketRepository.php';


$ticketRepository = new TicketRepository();



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();

    if (isset($_POST['destination_id']) && !empty($_POST['destination_id'])) {
        $destinationId = $_POST['destination_id'];
        $departureDate = $_POST['departure_date'];
        $arrivalDate = $_POST['arrival_date'];
        $numTickets = $_POST['number_tickets'];

        $ticket = new Ticket($departureDate, $arrivalDate, $numTickets, $destinationId);


        $ticketRepository->insertTicket($ticket);
        echo "<script> alert ('Booked Succesfully')alert </script>";
        header("Location:index.php");
    } else {

        echo "Error: Destination ID not provided.";
    }
}
?>
