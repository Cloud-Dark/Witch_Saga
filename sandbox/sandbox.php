<?php
if (isset($_POST["ageA"], $_POST["yearA"], $_POST["ageB"], $_POST["yearB"])) {
  $ageA = $_POST["ageA"];
  $yearA = $_POST["yearA"];
  $ageB = $_POST["ageB"];
  $yearB = $_POST["yearB"];

  // Calculate birth year for each person
  $birthYearA = $yearA - $ageA;
  $birthYearB = $yearB - $ageB;

  // Calculate number of people killed on each birth year
  $witchKills = [];
  $totalKills = 0;
  for ($i = 1; $i <= $yearB - $ageB; $i++) {
    if ($i === 1) {
      $witchKills[$i] = 1;
      $totalKills += 1;
    } else {
      $witchKills[$i] = $witchKills[$i - 1] + ($i - 1);
      $totalKills += $witchKills[$i];
    }
  }

  // Calculate number of people killed on birth year of each person
  $killsA = isset($witchKills[$birthYearA]) ? $witchKills[$birthYearA] : 0;
  $killsB = isset($witchKills[$birthYearB]) ? $witchKills[$birthYearB] : 0;

  // Calculate average kills
  $averageKills = ($killsA + $killsB) / 2;

  // Display result
  $result = "
<p>Given:</p>
<ul>
<li>Person A: Age of death = {$ageA}, Year of Death = {$yearA}</li>
<li>Person B: Age of death = {$ageB}, Year of Death = {$yearB}</li>
</ul>
<p>Answer:</p>
<ul>
<li>Person A born on Year = {$birthYearA}, number of people killed on year {$birthYearA} is {$killsA}.</li>
<li>Person B born on Year = {$birthYearB}, number of people killed on year {$birthYearB} is {$killsB}.</li>
<li>So the average is ({$killsA} + {$killsB}) / 2 = {$averageKills}.</li>
</ul>
";

  echo $result;
}

?>
<!DOCTYPE html>
<html>

<head>
  <title>Witch Problem</title>
</head>

<body>
  <script>
    function calculate() {
      // Get user input
      const ageA = parseInt(document.getElementById("ageA").value);
      const yearA = parseInt(document.getElementById("yearA").value);
      const ageB = parseInt(document.getElementById("ageB").value);
      const yearB = parseInt(document.getElementById("yearB").value);

      // Validate input
      // if (ageA < 0 || ageB < 0 || yearA <= yearB) {
      //   document.getElementById("result").innerHTML = "Invalid input.";
      //   return;
      // }

      // Calculate number of people killed on each birth year
      const witchKills = {};
      let totalKills = 0;
      for (let i = 1; i <= yearB - ageB; i++) {
        if (i === 1) {
          witchKills[i] = 1;
          totalKills += 1;
        } else {
          witchKills[i] = witchKills[i - 1] + (i - 1);
          totalKills += witchKills[i];
        }
      }

      // Calculate birth year for each person and number of people killed on that year
      const birthYearA = yearA - ageA;
      const killsA = witchKills[birthYearA] || 0;

      const birthYearB = yearB - ageB;
      const killsB = witchKills[birthYearB] || 0;

      // Calculate average kills
      const averageKills = (killsA + killsB) / 2;

      // Display result
      const resultDiv = document.getElementById("result");
      resultDiv.innerHTML =
        `
          <p>Given:</p>
          <ul>
            <li>Person A: Age of death = ${ageA}, Year of Death = ${yearA}</li>
            <li>Person B: Age of death = ${ageB}, Year of Death = ${yearB}</li>
          </ul>
          <p>Answer:</p>
          <ul>
            <li>Person A born on Year = ${birthYearA}, number of people killed on year ${birthYearA} is ${killsA}.</li>
            <li>Person B born on Year = ${birthYearB}, number of people killed on year ${birthYearB} is ${killsB}.</li>
            <li>So the average is (${killsA} + ${killsB}) / 2 = ${averageKills}.</li>
          </ul>
          `
    };
  </script>
  <h1>Witch Problem</h1>
  <div>
    <label for="ageA">Age of Death for Person A:</label>
    <input type="number" id="ageA" name="ageA">
    <br>
    <label for="yearA">Year of Death for Person A:</label>
    <input type="number" id="yearA" name="yearA">
    <br>
    <label for="ageB">Age of Death for Person B:</label>
    <input type="number" id="ageB" name="ageB">
    <br>
    <label for="yearB">Year of Death for Person B:</label>
    <input type="number" id="yearB" name="yearB">
    <br>
    <button type="button" onclick="calculate()">Calculate</button>
  </div>

  <div id="result"></div>


</body>

</html>