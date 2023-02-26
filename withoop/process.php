<?php

include_once('./classwithsaga.php');
// Example usage
$personA = new Person(10, 12);
$personB = new Person(13, 17);

$witchProblem = new WitchProblem();
$witchProblem->addPerson($personA);
$witchProblem->addPerson($personB);
$witchProblem->calculateKills();

echo "Person A born on Year = " . ($personA->getYearOfDeath() - $personA->getAgeOfDeath());
echo ", number of people killed on that year is " . $witchProblem->getKillsForPerson($personA). "<br>";

echo "Person B born on Year = " . ($personB->getYearOfDeath() - $personB->getAgeOfDeath());
echo ", number of people killed on that year is " . $witchProblem->getKillsForPerson($personB). "<br>";

echo "Average number of kills is " . $witchProblem->getAverageKills(). "<br>";