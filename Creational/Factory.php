<?php
/*
Factory Method is a creational design pattern that provides an interface for creating objects in a superclass, 
but allows subclasses to alter the type of objects that will be created.
*/

interface Transport
{
    public function ready(): void;

    public function dispatch(): void;

    public function deliver(): void;
}

class PlaneTransport implements Transport
{
    public function ready(): void
    {
        echo "Courier is ready to send from Plane \n";
    }

    public function dispatch(): void
    {
        echo "Courier is dispatch from from Plane \n";
    }

    public function deliver(): void
    {
        echo "Courier is deliver through  Plane \n";
    }
}


class TruckTransport implements Transport
{
    public function ready(): void
    {
        echo "Courier is ready to send from Truck \n";
    }

    public function dispatch(): void
    {
        echo "Courier is dispatch from from Truck \n";
    }

    public function deliver(): void
    {
        echo "Courier is deliver through  Truck \n";
    }
}

abstract class Courier
{
    //Factory method
    abstract function getCourierTransport(): Transport;

    public function sendCourier()
    {
        $transport = $this->getCourierTransport();
        $transport->ready();
        $transport->dispatch();
        $transport->deliver();
    }
}


class AirCourier extends Courier
{
    public function getCourierTransport(): Transport
    {
        return new PlaneTransport();
    }
}

class GroundCourier extends Courier
{
    public function getCourierTransport(): Transport
    {
        return new TruckTransport();
    }
}


// client code work with  an instance of concrete creator or subclass 

function deliverCourier(Courier $courier)
{
    $courier->sendCourier();
}


echo " Test couries \n";

deliverCourier(new AirCourier());
