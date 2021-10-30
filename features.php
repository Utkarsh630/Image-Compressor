<html>

<head>
  <title>Compress Image and download Zip file</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
  <style type="text/css">


  </style>
</head>

<body>
  <?php include 'upload.php'; ?>

  <div id="loader-wrapper">
    <div id="loader"></div>

    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>

  </div>
  <div class="row">
    <div class="page-container row-12">
      <div class="wrap">
        <h2 class="col-12 text-center mb-5" style="color:#000;">Compress Image and download Zip file </h2>
        <div class="row-8 form-container">
          <?php
          if (!empty($error)) {
          ?>
            <p class="error text-center"><?php echo $error; ?></p>
          <?php
          }
          ?>
          <?php
          if (!empty($success)) {
          ?>
            <p class="success text-center">
              Files uploaded successfully and compressed into a zip format
              <br>

              <a href="uploads/<?php echo $success; ?>" target="__blank">Click here to download the zip file</a>
            </p>
          <?php
          }
          ?>
          <!-- <form action="" method="post" enctype="multipart/form-data">
				    <div class="input-group">
						<div class="input-group-prepend">
						    <input type="submit" name="submit" class="btn btn-success" value="Upload">
						</div>
						<div class="custom-file">
						    <input type="file" class="custom-file-input" name="file[]" multiple>
						    <label class="custom-file-label" >Choose File</label>
						</div>
					</div>
				</form> -->



          <h1>File upload multiple</h1>
          <form action="" name="form" method="post" enctype="multipart/form-data">
            <div class="file">
              <div class="file__input" id="file__input">
                <input class="file__input--file" id="customFile" type="file" multiple name="file[]" />
                <label class="file__input--label" for="customFile" data-text-btn="Upload">Add file:</label>
              </div>
              <input type="submit" name="submit" class="btn btn-success" value="Upload">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

      <script>
        $(document).ready(function() {

          // ------------  File upload BEGIN ------------
          $('.file__input--file').on('change', function(event) {
            var files = event.target.files;
            for (var i = 0; i < files.length; i++) {
              var file = files[i];
              $("<div class='file__value d-flex justify-content-between '> <div class='file__value--text'>" + file.name + "</div><div class='file__value--remove' data-id='" + file.name + "' ></div></div>").insertAfter('#file__input');
            }
          });

          //Click to remove item
          $('body').on('click', '.file__value', function() {
            $(this).remove();
          });
          // ------------ File upload END ------------ 



          $(document).ready(function() {

            // Fakes the loading setting a timeout
            setTimeout(function() {
              $('body').addClass('loaded');
            }, 2000);

          });


        });
      </script>
</body>

</html>