<?php

class Words
{

  /**
   *
   */
  const DISTANCE_UNIT_MILES = 'miles';

  /**
   *
   */
  const DISTANCE_UNIT_KILOMETERS = 'km';

  /**
   * @var
   */
  private static $words;

  /**
   * @return mixed
   */
  public static function get_data()
  {

    if(empty(self::$words)) {
      self::$words = require_once __DIR__ . '/../../database/words.php';
    }

    return self::$words;

  }

  /**
   *
   */
  private static function load_data()
  {
    self::get_data();
  }

  /**
   * @param $parts
   * @return string
   */
  public static function get_sentence()
  {

    $parts = self::get_data();

    $sentence = '';

    foreach($parts AS $part => $part_data) {
      $sentence.= trim($part) . ' ';
    }

    $sentence_words = explode(' ', $sentence);

    $sentence = '';

    foreach($sentence_words AS $sentence_word) {
      $sentence .= ucfirst($sentence_word) . ' ';
    }

    return trim($sentence);

  }

  /**
   * @param string $unit
   * @return int
   */
  public static function get_total_distance($unit = self::DISTANCE_UNIT_KILOMETERS)
  {

    $words = self::get_data();
    $distance = 0;

    foreach($words AS $word) {
      foreach($word AS $letter) {
        if(empty($letter)) {
          continue;
        }

        $distance += $letter['distance'];

      }
    }

    if($unit === self::DISTANCE_UNIT_MILES) {
      $distance = $distance / 1.6;
    }

    return round($distance);

  }

}
