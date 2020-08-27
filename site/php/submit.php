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

  mkdir("{$folder}/images/{$_POST["title"]}/", 0777, true);
  if (isset($_FILES["bpic"]["name"])) {
    $number = count($_FILES["bpic"]["name"]);
    for($key = 0; $key < $number; $key++;) {
      move_uploaded_file($_FILES["bpic"]["tmp_name"][$key], "{$folder}/images/{$_POST["title"]}/{$number}-b.png");
      $key += 1;
    }
  }
  if (isset($_FILES["apic"]["name"])) {
    $number = count($_FILES["apic"]["name"]);
    for($key = 0; $key < $number; $key++;) {
      move_uploaded_file($_FILES["apic"]["tmp_name"][$key], "{$folder}/images/{$_POST["title"]}/{$number}-b.png");
      $key += 1;
    }
  }
  ?>
  <h3>Thank you for submitting!</h3>
  <p>Your submission will be reviewed manually and added to the notebook as long as it is not spam or inappropriate.<br> In the future, a feature will
    be added to let you view the notebook also.</p>
  </div>
</body>
</html>
