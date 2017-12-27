<?php

run_file('data_labo.csv')

function run_file($file)
{
  $csv = array_map('str_getcsv', file($file));
  var_dump($csv);
}


function explode_data($data){

  $array = explode($data,";");
  var_dump($array);

}


 ?>
