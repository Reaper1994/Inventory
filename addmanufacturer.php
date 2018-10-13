<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Manufacturer</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>
      $(document).ready(function () {

 

        $('form#add_maufacture').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'save.php',
            data: $('form#add_maufacture').serialize(),
            success: function (response) {
              console.log('add_manufacturer request sent');
              $("#result").html(response);
            }
          })

        });

      });
    </script>
</head>

<body>

<div class="container">
  <h3>Add Manufacturer</h3>
  <form  name="form1" id="add_maufacture" method="POST">
    <input type="hidden"  name="type" value="manufacturerform">
    <div class="form-group">
      <label for="manudacturer">Manufacturer </label>
      <input type="text" class="form-control" id="manufacturer" placeholder="Manufacturer Name" name="manufacturer" required>
    </div>

  <div id="result">
    
  </div>
   
<button type="submit" id="submit" class = "btn btn-default pull-left">Submit</button>
<button  onclick="location.href='/Carinventory/addmodel.php'; return false;" class = "btn btn-default pull-right">Next</button>
  </form>
</div>




</body>
</html>
