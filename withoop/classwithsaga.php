<?php
class Person
{
    private int $ageOfDeath;
    private int $yearOfDeath;

    public function __construct(int $ageOfDeath, int $yearOfDeath)
    {
        $this->ageOfDeath = $ageOfDeath;
        $this->yearOfDeath = $yearOfDeath;
    }

    public function getAgeOfDeath(): int
    {
        return $this->ageOfDeath;
    }

    public function getYearOfDeath(): int
    {
        return $this->yearOfDeath;
    }
}

class WitchProblem
{
    private array $persons = [];
    private array $kills = [];
    private int $totalKills = 0;

    public function addPerson(Person $person)
    {
        $this->persons[] = $person;
    }

    public function calculateKills()
    {
        $lastYear = end($this->persons)->getYearOfDeath();
        $lastAge = end($this->persons)->getAgeOfDeath();

        for ($i = 1; $i <= $lastYear - $lastAge; $i++) {
            if ($i === 1) {
                $this->kills[$i] = 1;
                $this->totalKills += 1;
            } else {
                $this->kills[$i] = $this->kills[$i - 1] + ($i - 1);
                $this->totalKills += $this->kills[$i];
            }
        }
    }

    public function getKillsForPerson(Person $person): int
    {
        $birthYear = $person->getYearOfDeath() - $person->getAgeOfDeath();
        return $this->kills[$birthYear] ?? 0;
    }

    public function getAverageKills(): float
    {
        $numPersons = count($this->persons);
        if ($numPersons === 0) {
            return 0;
        }

        $totalKills = 0;
        foreach ($this->persons as $person) {
            $totalKills += $this->getKillsForPerson($person);
        }

        return $totalKills / $numPersons;
    }
}