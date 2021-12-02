<?php

class Helper
{

  /**
   * @param $parts
   * @return string
   */
  public static function make_sentence($parts) {

    $sentence = '';

    foreach($parts AS $part => $part_data) {
      $sentence.= trim($part) . ' ';
    }

    $sentence_words = explode(' ', $sentence);

    $sentence = '';

    foreach($sentence_words AS $sentence_word) {
      $sentence .= ucfirst($sentence_word) . ' ';
    }

    $sentence = trim($sentence);

    return $sentence;

  }

}
