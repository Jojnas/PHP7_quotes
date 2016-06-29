<?php

require './vendor/autoload.php';

use Config\Quote;
include 'config.php';

if (isset($_POST['submit'])) {
  $text = $_POST['text'] ?: null;
  $author = $_POST['author'] ?: 'Unknown';


  try {

    $quoteObj = new Quote();
    $quotes = $quoteObj->add($text, $author);
  } catch (Throwable $e) {
    echo '<div class="alert alert-danger">' . get_class($e) . ' on line ' . $e->getLine() . ' of ' . $e->getFile() . ': ' . $e->getMessage() . '</div>';

  }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add quote</title>
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/bootstrap.css">
</head>
<body>
<div class="container">
  <div class="header clearfix">
    <nav>
      <ul class="nav nav-pills pull-right">
        <li role="presentation"><a href="index.php">Home</a></li>
        <li role="presentation"  class="active"><a href="new.php">New quote</a></li>
      </ul>
    </nav>
    <h3 class="text-muted">Srandicky</h3>
  </div>

  <div class="row marketing">
    <div class="col-lg-12">
      <h2 class="page-header">Add new quote</h2>
      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="form-group">
          <label>Quote text</label>
          <input type="text" class="form-control" name="text" placeholder="Quote text">
        </div>
        <div class="form-group">
          <label>Author</label>
          <input type="text" class="form-control" name="author" placeholder="Quote author">
        </div>
        <button type="submit" name="submit" class="btn btn-default">Submit</button>
      </form>
    </div>
  </div>

  <footer class="footer">
    <p>&copy; 2016 Srandicky, Inc.</p>
  </footer>

</div>


</body>
</html>