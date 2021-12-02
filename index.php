<?php

require_once 'src/Helper.php';
$words = require_once 'database/words.php';

$sentence = Helper::make_sentence($words);

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <title>Merry Christmas And A Happy New Year</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta property="og:title" content="Merry Christmas And A Happy New Year">
  <meta property="og:type" content="website">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/app.css">

  <link rel="apple-touch-icon" sizes="120x120" href="/favicons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon-16x16.png">
  <link rel="manifest" href="/favicons/site.webmanifest">
  <link rel="mask-icon" href="/favicons/safari-pinned-tab.svg" color="#5bbad5">
  <link rel="shortcut icon" href="/favicons/favicon.ico">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="msapplication-config" content="/favicons/browserconfig.xml">
  <meta name="theme-color" content="#ffffff">

</head>

<body>

  <div class="container visually-hidden">
    <div class="row">
      <div class="col-12">Merry Christmas & A Happy New Year!</div>
      <p>This page shows Strava activities using GPS-art to spell "<?php echo $sentence; ?>".</p>
    </div>
  </div>

  <div class="container-fluid h-100 d-flex align-items-center align-content-center flex-wrap main">
    <?php
    foreach($words AS $word => $word_details) {

      echo '<div class="row">';

      $letters_in_word = str_split($word);
      $word_folder_name = str_replace(' ', '-', trim($word));

      foreach($word_details AS $letter_index => $letter) {

        echo '<div class="col">';

        if(!empty($letter)) {

          $letter_img_src = 'img/' . $word_folder_name . '/' . $letter['image_name'] . '.png';

          echo '<div class="ratio" style="--bs-aspect-ratio: 58%;">';
          echo '<button class="btn h-100 activity-btn" data-bs-toggle="modal" data-bs-target="#activity-modal" style="background-image: url(' . $letter_img_src . ')" data-activity-id-1="' . $letter['activity_id_1'] . '" data-activity-id-2="' . $letter['activity_id_2'] . '" title="View activity details"><span class="visually-hidden">View details for the activity representing the letter ' . strtoupper($letters_in_word[$letter_index]) . '</span></button>';
          echo '</div>';

        }

        echo '</div>';

      }

      echo '</div>';

    }

    ?>

    <div class="row mt-4 w-100">
      <div class="col">
        <span class="w-100 text-center landscape-recommendation">Put your device in landscape mode to see the maps a bit better</span>
      </div>
    </div>

  </div>

  <div class="modal fade" id="info-modal" tabindex="-1" aria-labelledby="info-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="info-modal-label">About merrychristmasandahappynewyear.com</h2>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <p>Made by <a href="https://folbert.com">Folbert</a>, probably the best Bear in the world<sup>&trade;</sup>, using <a href="https://www.strava.com/athletes/2962650">Strava</a> on December XX, 2021.</p>

          <p>Total letter distance XX km (~YY miles).</p>

          <p>Code available at <a href="https://github.com/folbert/merrychristmasandahappynewyear-2021">folbert/merrychristmasandahappynewyear-2021</a>.</p>

          <p>The domain was bought on November 26th, 2004.</p>

          <p>Sorry Santa, there are no cookies here.</p>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="activity-modal" tabindex="-1" aria-labelledby="activity-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="activity-modal-label">Activity details from Strava</h2>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="ratio" style="--bs-aspect-ratio: 80%;">
            <iframe allowtransparency="true" data-src-template="https://www.strava.com/activities/#ACTIVITYID-1#/embed/#ACTIVITYID-2#" id="activity-details-iframe"></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 text-center">
          <a href="https://www.freepik.com/vectors/background" class="btn">Background vector created by starline - www.freepik.com</a> 🎅 <button data-bs-toggle="modal" data-bs-target="#info-modal" class="btn btn-link">About merrychristmasandahappynewyear.com</button>
        </div>
      </div>
    </div>
  </footer>

  <script src="js/bootstrap.min.js"></script>
  <script src="js/app.js"></script>

</body>

</html>
