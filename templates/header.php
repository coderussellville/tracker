<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Family Tracker</title>
  <!-- Add modernizer? -->
  <link href="css/bootstrap.min.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
</head>
<body>
  <?php 
    $siteTitle = "Family Tracker";
  ?>
  <header id="top">
    <?php require 'templates/top-nav.php';?> <!-- Put in IF statement to display if logged in only -->
  </header>
  <main>