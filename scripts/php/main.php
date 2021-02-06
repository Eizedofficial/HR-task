<?php

include "CProducts.php";

if($_GET['action'] == "GET_DATA")
{
    $limit = isset($_GET['limit']) ? "LIMIT ".$_GET['limit'] : "";
    $products = new CProducts();
    $products->print_data($limit);
}
else if($_GET['action'] == "REMOVE_PRODUCT" && isset($_GET['id']))
{
    $products = new CProducts();$products->hide_element($_GET['id']);
}
else if($_GET['action'] == "GET_AMOUNT" && isset($_GET['all_or_visible']))
{
    $products = new CProducts();
    $response = $products->get_products_quanity($_GET['all_or_visible']);
    print(json_encode($response));
}
else if($_GET['action'] == "blink"){
    print("Hi");
}

?>