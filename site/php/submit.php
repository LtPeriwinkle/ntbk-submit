<!DOCTYPE html>
<html lang="en">
<head>
  <title>9573X Notebook</title>
  <meta charset="UTF-8">
  <meta name="author" content="periwinkle">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="home.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Epilogue&display=swap">
</head>

<body>
  <div id="nav" class="w3-bar w3-black w3-text-white w3-bottom-bar w3-border-black">
    <a href=".." class="w3-bar-item w3-button w3-hover-dark-gray">home</a>
    <a href="contribute" class="w3-bar-item w3-button w3-hover-dark-gray">contribute</a>
    <a href="tutorial" class="w3-bar-item w3-button w3-hover-dark-gray">tutorial</a>
  </div>
  <div id="main">
  <?php
  //put the text based stuff into a file that i'll figure out how to deal with later lol
  $folder = "/data/{$_POST["year"]}/{$_POST["month"]}/{$_POST["date"]}/{$_POST["cat"]}";
  mkdir($folder, 0777, true);
  chdir($folder);
  $date = "{$_POST["month"]}/{$_POST["date"]}/{$_POST["year"]}";
  $name = "{$_POST["title"]}.md";
  $file = fopen($name, "w");
  $text = "{$_POST["title"]}\n";
  fwrite($file, $text);
  $text = "{$_POST["name"]}\n";
  fwrite($file, $text);
  $text = "{$_POST["cat"]} on {$date}\n";
  fwrite($file, $text);
  $text = "{$_POST["desc"]}\n";
  fwrite($file, $text);
  fclose($file);

  //deal with image upload for before
  if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["bpic"]["tmp_name"]);
    if($check !== false) {
      $uploadOk = 1;
    } else {
      echo "<h3>Your 'before' image file was detected to not be an image! Please resubmit with a different file.</h3>";
      $uploadOk = 0;
    }
    $bpic = "{$folder}{$_POST["title"]}-b.{$check["mime"]}";
    if (file_exists($bpic)) {
      echo "<h3>This submission already exists. Please try submitting again with a different title.</h3>";
      $uploadOk = 0;
    }
    if ($_FILES["bpic"]["size"] > 15000000) {
      echo "<h3>Your 'before' image file is too large. Please resubmit with a smaller image file.</h3>";
      $uploadOk = 0;
    }
    if($check["mime"] != "jpg" && $check["mime"] != "png" && $check["mime"] != "jpeg") {
      echo "<h3>Your 'before' file is not a jpg or png! Please convert the file and resubmit.</h3>";
      $uploadOk = 0;
    }
    if ($uploadOk == 0) {
      echo "<p>Because of this, your submission was not uploaded. Please try again.</p>";
      // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["bpic"]["tmp_name"], $bpic)) {
        echo "<h3 class='epilogue'>Thank you for submitting!</h3><p>Your submission will be reviewed by the moderator of the notebook,
        and as long as it is not spam or wildly inappropriate, it will<br>be added. Currently, you cannot preview the notebook but this
        feature is in the works.</p>";
      } else {
        echo "<p>Sorry, there was an unknown error uploading your file.</p>";
      }
    }
    //deal with after image
    $check = getimagesize($_FILES["apic"]["tmp_name"]);
    if($check !== false) {
      $uploadOk = 1;
    } else {
      echo "<h3>Your 'after' image file was detected to not be an image! Please resubmit with a different file.</h3>";
      $uploadOk = 0;
    }
    $apic = "{$folder}{$_POST["title"]}-a.{$check["mime"]}";
    if (file_exists($apic)) {
      echo "<h3>This submission already exists. Please try submitting again with a different title.</h3>";
      $uploadOk = 0;
    }
    if ($_FILES["apic"]["size"] > 15000000) {
      echo "<h3>Your 'after' image file is too large. Please resubmit with a smaller image file.</h3>";
      $uploadOk = 0;
    }
    if($check["mime"] != "jpg" && $check["mime"] != "png" && $check["mime"] != "jpeg") {
      echo "<h3>Your 'after' file is not a jpg or png! Please convert the file and resubmit.</h3>";
      $uploadOk = 0;
    }
    if ($uploadOk == 0) {
      echo "<p>Because of this, your submission was not uploaded. Please try again.</p>";
    } else {
      if (move_uploaded_file($_FILES["apic"]["tmp_name"], $bpic)) {
        echo "<h3 class='epilogue'>Thank you for submitting!</h3><p>Your submission will be reviewed by the moderator of the notebook,
        and as long as it is not spam or wildly inappropriate, it will<br>be added. Currently, you cannot preview the notebook but this
        feature is in the works.</p>";
      } else {
        echo "<p>Sorry, there was an unknown error uploading your file.</p>";
      }
    }
  }
  ?>
  </div>
</body>
</html>
