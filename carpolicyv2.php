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

    public function getDiscount() {
        $totalYearsNoClaims = $this->getTotalYearsNoClaims();

        if ($totalYearsNoClaims >= 3 && $totalYearsNoClaims <= 5) {
            return 0.10; 
        } elseif ($totalYearsNoClaims > 5) {
            return 0.15; 
        } else {
            return 0; 
        }
    }

    public function getDiscountedPremium() {
        $discount = $this->getDiscount();
        return $this->yearlyPremium - ($this->yearlyPremium * $discount);
    }

    public function __toString() {
        return "PN: " . $this->policyNumber;
    }
}

?>
