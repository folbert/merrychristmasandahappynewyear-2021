<div class="container-fluid h-100 d-flex align-items-center align-content-center flex-wrap main">
  <?php
  foreach(Words::get_data() AS $word => $word_details) {

    echo '<div class="row">';

    $letters_in_word = str_split($word);
    $word_folder_name = str_replace(' ', '-', trim($word));

    foreach($word_details AS $letter_index => $letter) {

      echo '<div class="col">';

      if(!empty($letter)) {

        $letter_img_src = 'img/' . $word_folder_name . '/' . $letter['image_name'] . '.png';

        echo '<div class="ratio" style="--bs-aspect-ratio: 58%;">';
        echo '<button class="btn h-100 activity-btn" data-bs-toggle="modal" data-bs-target="#activity-modal" style="background-image: url(' . $letter_img_src . ')" data-activity-id-1="' . $letter['activity_id_1'] . '" data-activity-id-2="' . $letter['activity_id_2'] . '" title="View activity details"><span class="visually-hidden">View details for the activity representing the letter ' . strtoupper($letters_in_word[$letter_index]) . '</span><span class="align-items-center align-content-center flex-wrap h-100 letter-details text-center"><span>Distance: ' . $letter['distance'] . 'km</span><span>Click for more details</span></span></button>';
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
