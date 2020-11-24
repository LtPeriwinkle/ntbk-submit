<!DOCTYPE html>
<html lang="en">
<head>
  <title>9573X Notebook</title>
  <meta charset="UTF-8">
  <meta name="author" content="periwinkle">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://apexnotebook.ml/home.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Epilogue&display=swap">
</head>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$file = fopen("apex_data/apex_raw.csv", "a");
	fwrite($file, "{$_POST['name']},{$_POST['score']}\n");
	fclose($file);
    }
    ?>
  <div id="nav" class="w3-bar w3-black w3-text-white w3-bottom-bar w3-border-black">
    <a href=".." class="w3-bar-item w3-button w3-hover-dark-gray">home</a>
    <a href="../contents" class="w3-bar-item w3-button w3-hover-dark-gray">notebook</a>
    <a href="../contribute" class="w3-bar-item w3-button w3-hover-dark-gray">contribute</a>
    <a href="../tutorial" class="w3-bar-item w3-button w3-hover-dark-gray">tutorial</a>
    <a href="../contact" class="w3-bar-item w3-button w3-hover-dark-gray">contact</a>
    <a href="../data" class="w3-bar-item w3-button w3-hover-dark-gray">data</a>
  </div>
  <div id="main">
    <h1 class="epilogue">9573X driver data</h5>
    <table class="w3-table w3-bordered w3-border">
      <tr>
        <th>Driver name</th>
        <th>Mean score</th>
        <th>Max score</th>
        <th>Min score</th>
        <th>Std. Deviation</th>
      <tr>
      <?php
      shell_exec("./data_fmt.py");
      $data = fopen("apex_data/apex_data.txt", "r");
      echo fread($data, filesize("apex_data/apex_data.txt"));
      ?>
    </table>
    <form method="post" enctype="multipart/form-data">
      <label for="name">Driver name. PLEASE check if this person is already in the table, and if so, spell it the same way</label><br>
      <input name="name" type="text" id="name"><br>
      <label for="score">Driver score><br>
      <input name="score" type="number" id="score">
      <input name="submit" value="Submit" type="submit">
    </form>
  </div>
