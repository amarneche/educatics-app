<?php 
function money($amount , $currency =null){
   $currency= is_null($currency) ? env("CURRENCY","DZD") :  $currency;

   return number_format($amount,2)." ".$currency;

}