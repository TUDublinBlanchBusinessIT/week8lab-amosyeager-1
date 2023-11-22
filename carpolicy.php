<?php

class CarPolicy {
    private $policyNumber;
    private $yearlyPremium;
    private $dateOfLastClaim;

    public function __construct($policyNumber, $yearlyPremium) {
        $this->policyNumber = $policyNumber;
        $this->yearlyPremium = $yearlyPremium;
        $this->dateOfLastClaim = null;
    }

    public function setDateOfLastClaim($date) {
        $this->dateOfLastClaim = $date;
    }

    public function getTotalYearsNoClaims() {
        $currentDate = new DateTime();
        $lastDate = new DateTime($this->dateOfLastClaim);
        $interval = $currentDate->diff($lastDate);
        return $interval->format("%y");
    }

    public function __toString() {
        return "PN: " . $this->policyNumber;
    }
}

$carPolicy = new CarPolicy(1234, 500);
$carPolicy->setDateOfLastClaim('2023-01-01');

echo $carPolicy->__toString() . "\n";
echo "Total Years No Claims: " . $carPolicy->getTotalYearsNoClaims() . "\n";

?>
