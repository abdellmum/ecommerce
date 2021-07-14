<?php

function getPrice($priceInDecimals){
    $price=floatval($priceInDecimals);
    return number_format($price/100, 2 , ',' , ' ') . ' MAD';

}
