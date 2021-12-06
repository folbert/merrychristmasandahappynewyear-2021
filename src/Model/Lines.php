<?php

class Lines
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
  private static $lines;

  /**
   * @return mixed
   */
  public static function get_data()
  {

    if(empty(self::$lines)) {
      self::$lines = require_once __DIR__ . '/../../database/lines.db.php';
    }

    return self::$lines;

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

    $lines = self::get_data();

    $sentence = '';

    foreach(array_keys($lines) AS $line) {
      $sentence.= trim($line) . ' ';
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

    $lines = self::get_data();
    $distance = 0;

    foreach($lines AS $line) {
      foreach($line['letters'] AS $letter) {
        if(!isset($letter['distance'])) {
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
