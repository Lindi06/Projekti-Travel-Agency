<?php
include_once 'C:\xampp\htdocs\Projekti-Travel-Agency\Projekti-Travel-Agency\dbConnect.php';
include_once 'ticket.php';


class ticketRepository{
    private $connection;

    public function __construct()
    {
        $conn=new databaseconnection();
        $this->connection=$conn->startConnection();
        
    }


    public function insertTicket($ticket) {
        $conn = $this->connection;

        $departureDate = $ticket->getDepartureDate();
        $arrivalDate = $ticket->getArrivalDate();
        $numTickets = $ticket->getNumberOfTickets();
        $destinationId = $ticket->getDestinationId(); 


        $sql = "INSERT INTO ticket (depart_time, arrival_time, tickets, destination_id) VALUES (?, ?, ?, ?)";
        $statement = $conn->prepare($sql);

        $statement->execute([$departureDate, $arrivalDate, $numTickets, $destinationId]);
    }


   function getAvailableDestinations() {
    $conn = $this->connection;

    try {
        $sql = "SELECT * FROM destinations";
        $statement = $conn->prepare($sql);
        $statement->execute();

        $destinations = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $destinations;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return [];
    }
}

public function getAllBookedTickets() {
    $conn = $this->connection;
    
    $sql = "SELECT * FROM ticket";
    $statement = $conn->prepare($sql);
    $statement->execute();

    $tickets = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $tickets;
}

}










?>