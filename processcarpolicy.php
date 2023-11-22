<?php

require_once 'CarPolicy2.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $policyNumber = $_POST['policyNumber'];
    $yearlyPremium = $_POST['yearlyPremium'];
    $lastClaimDate = $_POST['lastClaimDate'];

    
    $carPolicy = new CarPolicy($policyNumber, $yearlyPremium);
    $carPolicy->setDateOfLastClaim($lastClaimDate);

    
    $initialPremium = $carPolicy->getYearlyPremium();
    $discountedPremium = $carPolicy->getDiscountedPremium();

    
    echo "Policy Number: " . $carPolicy->__toString() . "\n";
    echo "Initial Premium: $" . $initialPremium . "\n";
    echo "Discounted Premium: $" . $discountedPremium . "\n";
} else {
    echo "Invalid request method.";
}

?>
