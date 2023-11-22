<?php

require_once 'CarPolicy2.php';

$carPolicy = new CarPolicy(1234, 500);
$carPolicy->setDateOfLastClaim('2023-01-01');

echo $carPolicy->__toString() . "\n";
echo "Total Years No Claims: " . $carPolicy->getTotalYearsNoClaims() . "\n";
echo "Discount: " . ($carPolicy->getDiscount() * 100) . "%\n";
echo "Discounted Premium: $" . $carPolicy->getDiscountedPremium() . "\n";

?>
