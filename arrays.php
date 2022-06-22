<?php

    /*
    array_diff() - Computes the difference of arrays
    array_diff_assoc() - Computes the difference of arrays with additional index check
    array_diff_uassoc() - Computes the difference of arrays with additional index check which is performed by a user supplied callback function
    array_diff_key() - Computes the difference of arrays using keys for comparison
    array_diff_ukey() - Computes the difference of arrays using a callback function on the keys for comparison

    array_udiff() - Computes the difference of arrays by using a callback function for data comparison
    array_udiff_assoc() - Computes the difference of arrays with additional index check, compares data by a callback function
    array_udiff_uassoc() - Computes the difference of arrays with additional index check, compares data and indexes by a callback function

    array_intersect() - Computes the intersection of arrays
    array_intersect_assoc() - Computes the intersection of arrays with additional index check
    array_intersect_uassoc() - Computes the intersection of arrays with additional index check, compares indexes by a callback function
    array_intersect_key() - Computes the intersection of arrays using keys for comparison
    array_intersect_ukey() - Computes the intersection of arrays using a callback function on the keys for comparison

    array_uintersect() - Computes the intersection of arrays, compares data by a callback function
    array_uintersect_assoc() - Computes the intersection of arrays with additional index check, compares data by a callback function
    array_uintersect_uassoc() - Computes the intersection of arrays with additional index check, compares data and indexes by separate callback functions
    */

    echo "array unpacking... \n";
    $arrayA = ['a' => 1];
    $arrayB = ['b' => 2];
    $result = ['a' => 0, ...$arrayA, ...$arrayB];
    var_dump($result);

    echo "array_is_list(array \$array): bool \n";
    var_dump(array_is_list([])); // true
    var_dump(array_is_list(['apple', 2, 3])); // true
    var_dump(array_is_list([0 => 'apple', 'orange'])); // true
    // The array does not start at 0
    var_dump(array_is_list([1 => 'apple', 'orange'])); // false
    // The keys are not in the correct order
    var_dump(array_is_list([1 => 'apple', 0 => 'orange'])); // false
    // Non-integer keys
    var_dump(array_is_list([0 => 'apple', 'foo' => 'bar'])); // false
    // Non-consecutive keys
    var_dump(array_is_list([0 => 'apple', 2 => 'bar'])); // false

    echo "array_diff(array \$array, array ...\$arrays): array \n";
    $array1 = array("a" => "green", "red", "blue", "red");
    $array2 = array("b" => "green", "yellow", "red");
    $result = array_diff($array1, $array2);
    var_dump($result);

    echo "\narray_diff_assoc(array \$array, array ...\$arrays): array \n";
    $array1 = array("a" => "green", "b" => "brown", "c" => "blue", "red");
    $array2 = array("a" => "green", "yellow", "red");
    $result = array_diff_assoc($array1, $array2);
    var_dump($result);

    echo "\narray_diff_uassoc(array \$array, array ...\$arrays, callable \$key_compare_func): array \n";
    function key_compare_func($a, $b)
    {
        if ($a === $b) {
            return 0;
        }
        return ($a > $b)? 1:-1;
    }
    
    $array1 = array("a" => "green", "b" => "brown", "c" => "blue", "red");
    $array2 = array("a" => "green", "yellow", "red");
    $result = array_diff_uassoc($array1, $array2, "key_compare_func");
    print_r($result);

    echo "\narray_diff_key(array \$array, array ...\$arrays): array \n";
    $array1 = array('blue' => 1, 'red' => 2, 'green' => 3, 'purple' => 4);
    $array2 = array('green' => 5, 'yellow' => 7, 'cyan' => 8);
    var_dump(array_diff_key($array1, $array2));

    echo "\narray_diff_ukey(array \$array, array ...\$arrays, callable \$key_compare_func): array \n";
    function key_compare_func2($key1, $key2)
    {
        if ($key1 == $key2)
            return 0;
        else if ($key1 > $key2)
            return 1;
        else
            return -1;
    }
    
    $array1 = array('blue'  => 1, 'red'  => 2, 'green'  => 3, 'purple' => 4);
    $array2 = array('green' => 5, 'blue' => 6, 'yellow' => 7, 'cyan'   => 8);
    
    var_dump(array_diff_ukey($array1, $array2, 'key_compare_func2'));

    echo "\narray_udiff(array \$array, array ...\$arrays, callable \$value_compare_func): array \n";
    echo "\narray_udiff_assoc(array \$array, array ...\$arrays, callable \$value_compare_func): array \n";
    echo "\narray_udiff_uassoc(array \$array, array ...\$arrays, callable \$value_compare_func, callable \$key_compare_func): array \n";

?>
