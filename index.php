<?php

require './vendor/autoload.php';

use Config\Quote;


include 'config.php';

try {

  $quoteObj = new Quote();
  $quotes = $quoteObj->index();
} catch (Throwable $e) {
  echo '<div class="alert alert-danger">'. get_class($e) . ' on line ' . $e->getLine() . ' of ' . $e->getFile().': ' . $e->getMessage() . '</div>';

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Srandicky s PHP7</title>
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/bootstrap.css">
</head>
<body>
<div class="container">
  <div class="header clearfix">
    <nav>
      <ul class="nav nav-pills pull-right">
        <li role="presentation" class="active"><a href="index.php">Home</a></li>
        <li role="presentation"><a href="new.php">New quote</a></li>
      </ul>
    </nav>
    <h3 class="text-muted">Srandicky</h3>
  </div>

  <div class="jumbotron">
    <h1>Got a quote</h1>
    <p class="lead">Store you favorite quotes here to access and read them whenever you want</p>
    <p><a class="btn btn-lg btn-success" href="new.php" role="button">Add Quote Now</a></p>
  </div>

  <div class="row marketing">
    <div class="col-lg-12">
      <?php foreach($quotes as $quote) : ?>
      <h3><a href="edit.php?id=<?php echo $quote['id']; ?>"><?php echo $quote['text']; ?></a></h3>
      <p><?php echo $quote['creator'] ?></p>

      <?php endforeach;; ?>
    </div>
  </div>

  <footer class="footer">
    <p>&copy; 2016 Srandicky, Inc.</p>
  </footer>

  </div>


</body>
</html>