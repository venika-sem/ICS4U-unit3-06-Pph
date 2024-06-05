<?php
    /**
     * This program is a merge sort program
     * By Venika Sem
     * @version 1.0
     * @since Feb-2024
     */
    
    function merge($left, $right) {
        $sortArray = [];
    
        while (count($left) && count($right)) {
            if ($left[0] < $right[0]) {
                array_push($sortArray, array_shift($left));
            } else {
                array_push($sortArray, array_shift($right));
            }
        }
    
        return array_merge($sortArray, $left, $right);
    }
    
    function mergeSort($sortArray) {    
        $mid = count($sortArray) / 2;
    
        if (count($sortArray) < 2) {
            return $sortArray;
        }
    
        $left = array_splice($sortArray, 0, $mid);
        return merge(mergeSort($left), mergeSort($sortArray));
    }
    
    // Create array
    $arrayLength = 5;
    $counter = 0;
    $array = [];
    
    while ($counter < $arrayLength) {
        $selectedNumber = readline("Enter a number to put at [$counter]: ");
        if (!is_numeric($selectedNumber)) {
            echo "Invalid input.\n";
        } else {
            // Round the floating-point number to the nearest integer
            $array[] = round($selectedNumber);
            $counter++;
        }
    }
    
    // Show unsorted array
    echo "Unsorted array: " . implode(', ', $array) . "\n";
    
    // Sort array
    $sortedArray = mergeSort($array);
    echo "Sorted array: " . implode(', ', $sortedArray) . "\n";
    
    echo "\nDone.\n";
?>
