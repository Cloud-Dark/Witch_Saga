<!DOCTYPE html>
<html>
  <head>
    <title>Witch Problem</title>
  </head>
  <body>
    <h1>Witch Problem</h1>
    <div id="result"></div>

    <?php
      // Input data
      $personA = array("ageOfDeath" => 10, "yearOfDeath" => 12);
      $personB = array("ageOfDeath" => 13, "yearOfDeath" => 17);

      // Calculate number of people killed on each birth year
      $witchKills = array();
      $totalKills = 0;
      for ($i = 1; $i <= $personB["yearOfDeath"] - $personB["ageOfDeath"]; $i++) {
        if ($i === 1) {
          $witchKills[$i] = 1;
          $totalKills += 1;
        } else {
          $witchKills[$i] = $witchKills[$i - 1] + ($i - 1);
          $totalKills += $witchKills[$i];
        }
      }

      // Calculate birth year for each person and number of people killed on that year
      $birthYearA = $personA["yearOfDeath"] - $personA["ageOfDeath"];
      $killsA = isset($witchKills[$birthYearA]) ? $witchKills[$birthYearA] : 0;

      $birthYearB = $personB["yearOfDeath"] - $personB["ageOfDeath"];
      $killsB = isset($witchKills[$birthYearB]) ? $witchKills[$birthYearB] : 0;

      // Calculate average kills
      $averageKills = ($killsA + $killsB) / 2;
    ?>

    <div id="result">
      <p>Given:</p>
      <ul>
        <li>Person A: Age of death = <?php echo $personA["ageOfDeath"]; ?>, Year of Death = <?php echo $personA["yearOfDeath"]; ?></li>
        <li>Person B: Age of death = <?php echo $personB["ageOfDeath"]; ?>, Year of Death = <?php echo $personB["yearOfDeath"]; ?></li>
      </ul>
      <p>Answer:</p>
      <ul>
        <li>Person A born on Year = <?php echo $birthYearA; ?>, number of people killed on year <?php echo $birthYearA; ?> is <?php echo $killsA; ?>.</li>
        <li>Person B born on Year = <?php echo $birthYearB; ?>, number of people killed on year <?php echo $birthYearB; ?> is <?php echo $killsB; ?>.</li>
        <li>So the average is (<?php echo $killsA; ?> + <?php echo $killsB; ?>) / 2 = <?php echo $averageKills; ?>.</li>
      </ul>
    </div>
  </body>
</html>
