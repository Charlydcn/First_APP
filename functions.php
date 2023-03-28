<?php

session_start();

function totalQtt(){
    $result = 0;
    foreach($_SESSION['products'] as $index => $product) {
        $result += $product['qtt'];
    }
    return $result;
}

function addQtt($number) {
    $_SESSION($product) + $number;
}

// function removeQtt() {
//     $product['qtt'] - 1;
// }