<?php


//QUESTION 3 - COMBINATION SUM
//
//Given an array of distinct integer candidates and a target integer target, return a list of all unique combinations of candidates where the chosen numbers sum to target. You may return the combinations in any order.
//
//The same number may be chosen from candidates an unlimited number of times. Two combinations are unique if the frequency of at least one of the chosen numbers is different.
//
//It is guaranteed that the number of unique combinations that sum up to target is less than 150 combinations for the given input.
//
//
//
//Example 1:
//
//Input: candidates = [2,3,6,7], target = 7
//Output: [[2,2,3],[7]]
//Explanation:
//2 and 3 are candidates, and 2 + 2 + 3 = 7. Note that 2 can be used multiple times.
//7 is a candidate, and 7 = 7.
//These are the only two combinations.
//Example 2:
//
//Input: candidates = [2,3,5], target = 8
//Output: [[2,2,2,2],[2,3,3],[3,5]]
//Example 3:
//
//Input: candidates = [2], target = 1
//Output: []
//
//
//Constraints:
//
//1 <= candidates.length <= 30
//1 <= candidates[i] <= 200
//All elements of candidates are distinct.
//1 <= target <= 500


class question3
{

    private $result = [];


//QUESTION 3 - COMBINATION SUM
    /**
     * @param Integer[] $candidates
     * @param Integer $target
     * @return Integer[][]
     */

    function combinationSum(array $candidates, int $target)
    {
        $candidates = array_filter($candidates, function ($v) use ($target) {
            return $v <= $target;
        });
        sort($candidates);

        $this->findNext($candidates, $target);

        return $this->result;
    }

    function addToResult($set, $element): void
    {
        array_push($set, $element);
        $this->result[implode('', $set)] = $set;
    }

    function findNext(array &$candidates, int $remains, array $set = [], int $from = 0)
    {
        for ($i = $from; $i < count($candidates); $i++) {
            if ($remains == $candidates[$i]) {
                $this->addToResult($set, $candidates[$i]);
                return;
            }
            if ($remains > $candidates[$i]) {
                array_push($set, $candidates[$i]);
                $this->findNext($candidates, $remains - $candidates[$i], $set, $i);
                array_pop($set);
            } else {
                return;
            }
        }
    }

}