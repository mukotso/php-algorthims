<?php

//QUESTION 4: Non-overlapping Intervals
//Given an array of intervals intervals where intervals[i] = [starti, endi], return the minimum number of intervals you need to remove to make the rest of the intervals non-overlapping.
//
//
//
//Example 1:
//
//Input: intervals = [[1,2],[2,3],[3,4],[1,3]]
//Output: 1
//Explanation: [1,3] can be removed and the rest of the intervals are non-overlapping.
//Example 2:
//
//Input: intervals = [[1,2],[1,2],[1,2]]
//Output: 2
//Explanation: You need to remove two [1,2] to make the rest of the intervals non-overlapping.
//Example 3:
//
//Input: intervals = [[1,2],[2,3]]
//Output: 0
//Explanation: You don't need to remove any of the intervals since they're already non-overlapping.
//
//Constraints:
//
//1 <= intervals.length <= 105
//intervals[i].length == 2
//-5 * 104 <= starti < endi <= 5 * 104

class question4
{

    /**
     * @param Integer[][] $intervals
     * @return Integer
     */

    function eraseOverlapIntervals($intervals)
    {
        sort($intervals);

        $over_lap_count = 0;
        $first_array = array_shift($intervals);

        //last element of the current array
        $previous_last_element = $first_array[1];

        foreach ($intervals as $current_interval) {
            $current_intervals_first_digit = $current_interval[0];
            $current_interval_last_digit = $current_interval[1];

            if ($current_intervals_first_digit < $previous_last_element) {
                $over_lap_count++;
                $previous_last_element = min($previous_last_element, $current_interval_last_digit);
                continue;
            }

            $previous_last_element = $current_interval_last_digit;
        }

        return $over_lap_count;
    }
}