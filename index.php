<?php

require_once 'src/Model/Lines.php';
require_once 'src/Helper.php';

$sentence = Lines::get_sentence();

?>

<!doctype html>
<html lang="en">

<head>
  <?php
  require_once 'views/partials/head.php';
  ?>
</head>

<body>

  <?php
    $partial_names = [
      'header',
      'info-modal',
      'letters',
      'footer',
      'activity-modal',
    ];

    foreach($partial_names AS $partial_name) {
      require_once 'views/partials/' . $partial_name . '.php';
    }
  ?>

  <script src="/assets/js/bootstrap.min.js"></script>
  <script src="/assets/js/app.js?v=<?php echo Helper::get_version() ?>"></script>

</body>
</html>
