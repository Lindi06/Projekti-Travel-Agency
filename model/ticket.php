<?php

class Ticket {
    private $Id;
    private $departure_date;
    private $arrival_date;
    private $number_tickets;
    private $destination_id;

    public function __construct($departure_date, $arrival_date, $number_tickets, $destination_id) {
        $this->departure_date = $departure_date;
        $this->arrival_date = $arrival_date;
        $this->number_tickets = $number_tickets;
        $this->destination_id = $destination_id;
    }

    public function getDepartureDate() {
        return $this->departure_date;
    }

    public function setDepartureDate($d) {
        $this->departure_date = $d;
    }

    public function getArrivalDate() {
        return $this->arrival_date;
    }

    public function setArrivalDate($a) {
        $this->arrival_date = $a;
    }

    public function getNumberOfTickets() {
        return $this->number_tickets;
    }

    public function setNumberOfTickets($nt) {
        $this->number_tickets = $nt;
    }

    public function getDestinationId() {
        return $this->destination_id;
    }
    

}




?>