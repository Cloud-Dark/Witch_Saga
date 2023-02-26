<form action="process.php" method="post">
    <div>
        <label for="age1">Person A Age of Death:</label>
        <input type="number" id="age1" name="ageA" min="0">
        <label for="year1">Person A Year of Death:</label>
        <input type="number" id="year1" name="yearA" min="0">
    </div>
    <div>
        <label for="age2">Person B Age of Death:</label>
        <input type="number" id="age2" name="ageB" min="0">
        <label for="year2">Person B Year of Death:</label>
        <input type="number" id="year2" name="yearB" min="0">
    </div>
   <button type="submit">Calculate</button>
</form>