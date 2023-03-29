<?php
session_start();

function totalQtt() {
    
    $result = 0;
    if (!empty($_SESSION['products'])) {

        foreach($_SESSION['products'] as $index => $product) {
            $result += $product['qtt'];
        }

    return $result;

    }
}

function delete($id) {
   
    if ($id == null) {
        unset($_SESSION['products']);
        var_dump("pas good");
    }

    else {
        unset($_SESSION['products'][$id]);
        var_dump("good");
    }
}

function decreaseQtt($id) {

    if($_SESSION['products'][$id]['qtt'] > 1) {
        $_SESSION['products'][$id]['qtt'] --;
        refreshTotal($id);

    } else {
        delete($id);
    }
}

function addQtt($id) {

    $_SESSION['products'][$id]['qtt'] ++;
    refreshTotal($id);
}

function refreshTotal($id) {

    $_SESSION['products'][$id]['total'] =  $_SESSION['products'][$id]['price']* $_SESSION['products'][$id]['qtt'];
}

function getMessages() {
    if(isset($_SESSION['message']) && !empty($_SESSION['message'])) {
        $result = "<h3>" . $_SESSION['message'] . "</h3>";
        unset($_SESSION['message']);

        return $result;
    }
    return false;
}