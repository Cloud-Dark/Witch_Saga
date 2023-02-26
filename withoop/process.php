<?php

include_once('./helper.php');
include_once('./classwithsaga.php');

if (!empty(post('ageA')) && !empty(post('yearA')) && !empty(post('ageB')) && !empty(post('yearB'))) {
    // Example usage
    $personA = new Person(post('ageA'), post('yearA'));
    $personB = new Person(post('ageB'), post('yearB'));

    $witchProblem = new WitchProblem();
    $witchProblem->addPerson($personA);
    $witchProblem->addPerson($personB);
    $witchProblem->calculateKills();
    echo '
    Given: <br>
    Person A: Age of death = ' . $personA->getAgeOfDeath() . ', Year of Death = ' . $personA->getYearOfDeath() . '<br>
    Person B: Age of death = ' . $personB->getAgeOfDeath() . ', Year of Death = ' . $personB->getAgeOfDeath() . '<br>
    Answer:<br>
    Person A born on Year = ' . $personA->getYearOfDeath() . ' – ' . $personA->getAgeOfDeath() . ' = ' . ($personA->getYearOfDeath() - $personA->getAgeOfDeath()) . ', number of people killed on year ' . ($personA->getYearOfDeath() - $personA->getAgeOfDeath()) . ' is ' . $witchProblem->getKillsForPerson($personA) . '.<br>
    Person B born on Year = ' . $personB->getYearOfDeath() . ' – ' . $personB->getAgeOfDeath() . ' = ' . ($personB->getYearOfDeath() - $personB->getAgeOfDeath()) . ', number of people killed on year ' . ($personB->getYearOfDeath() - $personB->getAgeOfDeath()) . ' is ' . $witchProblem->getKillsForPerson($personB) . '.<br>
    <hr>
    So the average is ' . $witchProblem->getAverageKills() . '<br>
    ';
} else {
    echo 'Please fill out all required fields.';
}
