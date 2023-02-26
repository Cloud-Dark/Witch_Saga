<form id="my-form">
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
    <button type="submit"  value="Submit" >Calculate</button>
</form>
<div id="contentData"></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js" integrity="sha512-nO7wgHUoWPYGCNriyGzcFwPSF+bPDOR+NvtOYy2wMcWkrnCNPKBcFEkU80XIN14UVja0Gdnff9EmydyLlOL7mQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
$(document).ready(function() {
  $('#my-form').submit(function(event) {
    event.preventDefault(); // prevent default form submission
    var formData = $(this).serialize(); // serialize form data
    $.ajax({
      type: 'POST',
      url: 'process.php',
      data: formData,
      success: function(response) {
        // alert(response); // handle success response
        $('#contentData').html(response);
      },
      error: function() {
        alert('Error! Please try again.'); // handle error
      }
    });
  });
});
</script>
