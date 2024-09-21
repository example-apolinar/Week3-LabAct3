<?php

// Base Vehicle class
class Vehicle {
    protected $make;
    protected $model;
    protected $year;

    public function __construct($make, $model, $year) {
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
    }

    // Final method to prevent overriding
    final public function getDetails() {
        return "Make: $this->make, Model: $this->model, Year: $this->year";
    }

    // Generic description method
    public function describe() {
        return "This is a vehicle.";
    }
}

// Car class extending Vehicle
class Car extends Vehicle {
    protected $doors;

    public function __construct($make, $model, $year, $doors) {
        parent::__construct($make, $model, $year);
        $this->doors = $doors;
    }

    // Override describe method for Car
    public function describe() {
        return "This is a car with $this->doors doors.";
    }
}

// Final Motorcycle class extending Vehicle
final class Motorcycle extends Vehicle {

    // Override describe method for Motorcycle
    public function describe() {
        return "This is a motorcycle.";
    }
}

// Electric Vehicle Interface
interface ElectricVehicle {
    public function chargeBattery();
}

// Electric Car class extending Car and implementing ElectricVehicle
class ElectricCar extends Car implements ElectricVehicle {
    private $batteryLevel;

    public function __construct($make, $model, $year, $doors, $batteryLevel = 100) {
        parent::__construct($make, $model, $year, $doors);
        $this->batteryLevel = $batteryLevel;
    }

    // Implement chargeBattery method from ElectricVehicle interface
    public function chargeBattery() {
        $this->batteryLevel = 100;
        return "The battery is fully charged.";
    }

    // Override describe method for ElectricCar
    public function describe() {
        return "This is an electric car with $this->doors doors and a battery level of $this->batteryLevel%.";
    }
}

// Testing the classes

// Create a Car instance
$car = new Car("Toyota", "Corolla", 2020, 4); 

echo $car->getDetails() . "<br>";    // Output basic vehicle details
echo $car->describe() . "<br>";      // Output Car specific description


// Create a Motorcycle instance
$motorcycle = new Motorcycle("Yamaha", "R3", 2021);
echo $motorcycle->getDetails() . "<br>";   // Output basic vehicle details
echo $motorcycle->describe() . "<br>";     // Output Motorcycle specific description


// Create an ElectricCar instance
$electricCar = new ElectricCar("Tesla", "Model 3", 2022, 4);
echo $electricCar->getDetails() . "<br>";  // Output basic vehicle details
echo $electricCar->describe() . "<br>";     // Output ElectricCar specific description
echo $electricCar->chargeBattery(). "<br>";  // Output battery charge status

?>
