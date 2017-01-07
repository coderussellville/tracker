<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Family Tracker</title>
  <!-- Add modernizer? -->
  <link href="css/bootstrap.min.css" rel="stylesheet" />
  <link href="css/bootstrap-override.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <link href="css/site.css" rel="stylesheet" />
</head>
<body>
  <?php 
    $siteTitle = "Family Tracker";
  ?>
  <noscript>
    You must have JavaScript enabled in order to use this site. For more details, check your browser's documentation...
  </noscript>
  <header id="top">
    <?php require 'templates/top-nav.php';?> <!-- Put in IF statement to display if logged in only -->
  </header>
  <main>