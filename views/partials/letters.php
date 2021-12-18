<div class="container-fluid h-100 d-flex align-items-center align-content-center flex-wrap main">
  <?php
  foreach(Lines::get_data() AS $line => $line_details) {

    echo '<div class="row">';

    $letters_in_line = str_split($line);
    $line_folder_name = str_replace(' ', '-', trim($line));

    foreach($line_details['letters'] AS $letter) {

      $letter_index = 0;

      $col_elm_class_attr = 'col';

      if(isset($letter['col_elm_class_attr'])) {
        $col_elm_class_attr .= ' ' . $letter['col_elm_class_attr'];
      }

      echo '<div class="' . $col_elm_class_attr . '">';

      if(isset($letter['image_name'])) {

        $letter_img_src_without_file_ext = '/assets/img/' . $line_folder_name . '/' . $letter['image_name'];
        $letter_img_src = $letter_img_src_without_file_ext . '.png';

        echo '<div class="ratio ratio-1x1 letter-wrapper">';
          echo '<img src="' . $letter_img_src . '" alt="" class="activity-img" srcset="' . Helper::get_activity_image_srcset($letter_img_src_without_file_ext) . '" sizes="' . $line_details['line-img-sizes-attr'] . '">';
          echo '<button class="btn h-100 activity-btn" data-bs-toggle="modal" data-bs-target="#activity-modal" data-activity-id-1="' . $letter['activity_id_1'] . '" data-activity-id-2="' . $letter['activity_id_2'] . '"><span class="visually-hidden">View details for the activity representing the letter "' . strtoupper($letters_in_line[$letter_index]) . '"</span><span class="align-items-center align-content-center flex-wrap h-100 letter-details text-center"><span>Distance: ' . $letter['distance'] . 'km</span><span>Click for more details</span></span></button>';
        echo '</div>';

        $letter_index++;

      }

      echo '</div>';

    }

    echo '</div>';

  }

  ?>

  <?php
  /*
  ?>
  <div class="row mt-4 w-100">
    <div class="col">
      <span class="w-100 text-center landscape-recommendation">Rotate your device to landscape mode to see the maps a bit better</span>
    </div>
  </div>
  <?php
  */
  ?>

</div>
