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
    $sizes = [50, 100, 200, 300, 400, 500, 600, 700];

    foreach($sizes AS $size) {
      $srcset .= $image_base_name . '-' . $size . 'x' . $size . '.png ' . $size . 'w,';
    }

    $srcset .= $image_base_name . '.png 800w';
    return $srcset;

  }

  /**
   * @return float
   */
  public static function get_version()
  {

    return '1.2';

  }

}
