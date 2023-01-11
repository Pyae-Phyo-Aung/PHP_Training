<?php
function showDate($timestamp, $format = "M d, Y")
{
  return date($format, strtotime($timestamp));
}
function showTime($timestamp, $format = "h-i-s-a")
{
  return date($format, strtotime($timestamp));
}
function short($str, $length = "50")
{
  return substr($str, 0, $length) . "...";
}
function textFilter($text)
{
  $text = htmlentities($text, ENT_QUOTES);
  return $text;
}
