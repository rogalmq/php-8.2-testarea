<?php

function pad1(string $s) : string
{
    return "'" . $s . "'";
}

function pad2(string $s) : string
{
    return '"' . $s . '"';
}

function array_str_pad_enkelsnuff(array $arr) : array
{
    $arr = array_map("pad1", $arr);
    return $arr;
}

function array_str_pad_dubbelsnuff(array $arr) : array 
{
    $arr = array_map("pad2", $arr);
    return $arr;
}

$customer_no_list = array(1001,1002,1003);
$customer_no_list = array_str_pad_enkelsnuff($customer_no_list);
$customer_no_list = implode(",", $customer_no_list);
$sql_where = " IN ({$customer_no_list})";
var_dump($sql_where);

$customer_no_list = array(1001,1002,1003);
$customer_no_list = array_str_pad_dubbelsnuff($customer_no_list);
$customer_no_list = implode(",", $customer_no_list);
$sql_where = ' IN (' . $customer_no_list . ')';
var_dump($sql_where);

?>