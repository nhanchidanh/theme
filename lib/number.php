<?php
function currency_format($number, $unit = 'vnd') {
   return number_format($number).$unit;
}
?>