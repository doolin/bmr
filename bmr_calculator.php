#!/usr/bin/env php
<?php

require_once __DIR__ . '/BmrCalculator.php';

function prompt($message)
{
  echo $message . ": ";
  return trim(fgets(STDIN));
}

echo "BMR Calculator (Mifflin-St Jeor, Imperial Units)\n";
echo "---------------------------------------------\n";

$weight = (int) prompt("Enter weight (lbs)");
$height = (int) prompt("Enter height (inches)");
$age = (int) prompt("Enter age (years)");
$gender = strtolower(prompt("Enter gender (male/female)"));

try {
  $bmr = BmrCalculator::calculate($weight, $height, $age, $gender);
  echo "\nYour BMR is: " . number_format($bmr, 2) . " calories/day\n";
} catch (InvalidArgumentException $e) {
  echo "Error: " . $e->getMessage() . "\n";
  exit(1);
}



