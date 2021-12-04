<?php

class Helper
{

  /**
   * @param $image_base_name
   * @return string
   */
  public static function get_activity_image_srcset($image_base_name)
  {

    $srcset = '';
    $sizes = [50, 100, 200, 300, 400];

    foreach($sizes AS $size) {
      $srcset .= $image_base_name . '-' . $size . 'x' . $size . '.png ' . $size . 'w,';
    }

    $srcset .= $image_base_name . '.png 500w';
    return $srcset;

  }

  /**
   * @return string
   */
  public static function get_activity_image_sizes()
  {

    // This is based on the row that holds five columns on small screens since each of the five letters will take up ~20vw
    $sizes = '20vw';

    return $sizes;

  }

}
