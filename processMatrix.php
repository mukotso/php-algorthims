<?php
//QUESTION 2.Given a square matrix,
//find
//1.the sum of the values on the main diagonal (which runs from the upper left to the lower right).
//2.the number of rows of the matrix that contain repeated elements
//3.the number of columns of the matrix that contain repeated elements.
//The input of this function will be the matrix/2d array of integers and the output will
//be the three computations put in an array and returned in json format
//Example 1
//
//Input
//1 2 3 4
//2 1 4 3
//3 4 1 2
//4 3 2 1
//in php arrays would be
//$arr = array(
//    0 => array(1, 2, 3, 4),
//    1 => array(2, 1, 4, 3),
//    2 => array(3, 4, 1, 2),
//    3 => array(4, 3, 2, 1)
//);
//Output(in json format)
//[4, 0, 0]
//where 4 at position 0 is diagonal sum as explained (1+1+1+1)=4
//0 at position 1 is rows with repeats which is 0 since each row does not have repeating values
//0 at position 2 is columns with repeats which is 0 since all columns do not have repeating values
//Example 2
//input
//2 2 2 2
//2 3 2 3
//2 2 2 3
//2 2 2 2
//output
//diagonal sum 2+3+2+2=9
//rows with repeat 4  -2 is appearing more than once in each row
//columns with repeat 4 2 is repeated in each of the first three rows,3 is repeated in the last column making it a total of 4 columns with repeats
//so output will be :[9,4,4] for this case

class question2
{
    function processMatrix($arr)
    {
        $diagonal_sum = 0;
        $repeated_rows = 0;
        $repeated_columns = 0;
        $length = sizeof($arr);

        // loop and Calculate diagonal sum
        for ($i = 0; $i < $length; $i++) {
            $diagonal_sum += $arr[$i][$i];
        }


        for ($i = 0; $i < $length; $i++) {
            if (count($arr[$i]) != count(array_unique($arr[$i]))) {
                //increment
                $repeated_rows++;
            }
        }


        $transposed_matrix = array_map(null, ...$arr);
        for ($i = 0; $i < $length; $i++) {
            if (count($transposed_matrix[$i]) != count(array_unique($transposed_matrix[$i]))) {
                //increment
                $repeated_columns++;
            }
        }


        $results = [
            "diagonal_sum" => $diagonal_sum,
            "repeated_rows" => $repeated_rows,
            "repeated_columns" => $repeated_columns
        ];

        //return json
        return json_encode($results);
    }
}
