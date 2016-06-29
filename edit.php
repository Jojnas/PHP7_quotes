<?php

require './vendor/autoload.php';

use Config\Quote;
include 'config.php';

try {

  $quoteObj = new Quote();
  $quote = $quoteObj->getSingle($_GET['id']);
} catch (Throwable $e) {
  echo '<div class="alert alert-danger">'. get_class($e) . ' on line ' . $e->getLine() . ' of ' . $e->getFile().': ' . $e->getMessage() . '</div>';

}

if(isset($_POST['submit'])){
  $id = $_GET['id'];
  $text = $_POST['text'] ?: null;
  $author = $_POST['author'] ?: 'Unknown';
 
  try {
    $quoteObj = new Quote();
    $quoteObj->update($id, $text, $author);
  } catch (Throwable $e) {
    echo '<div class="alert alert-danger">'. get_class($e) . ' on line ' . $e->getLine() . ' of ' . $e->getFile().': ' . $e->getMessage() . '</div>';
  }
}

if(isset($_POST['delete'])){
  $id = $_GET['id'];
  try {
    $quoteObj = new Quote();
    $quoteObj->remove($id);
  } catch (Throwable $e) {
    echo '<div class="alert alert-danger">'. get_class($e) . ' on line ' . $e->getLine() . ' of ' . $e->getFile().': ' . $e->getMessage() . '</div>';
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
      <h2 class="page-header">Edit quote</h2>
      <form action=edit.php?id=<?php echo $_GET['id'] ?> class="pull-right" method="post">
        <button type="submit" name="delete" class="btn btn-danger">Delete</button>
      </form>
      <form action="edit.php?id=<?php echo $_GET['id'] ?>" method="post">
        <div class="form-group">
          <label>Quote text</label>
          <input type="text" class="form-control" name="text" value="<?php echo $quote['text']?>" placeholder="Quote text">
        </div>
        <div class="form-group">
          <label>Author</label>
          <input type="text" class="form-control" name="author" value="<?php echo $quote['creator']?>" placeholder="Quote author">
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