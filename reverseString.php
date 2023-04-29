<?php
//QUESTION 1.Given an input string, reverse the string word by word.
//
//A word is defined as a sequence of non-space characters.
//
//Notice that the input string may contain leading or trailing spaces. However, your reversed string should not contain leading or trailing spaces.
//
//Also, notice that you need to reduce multiple spaces between two words to a single space in the reversed string.
//Your function should have input of the string to be reversed and it should return the reversed string.
//
//Example 1:
//
//Input: s = "the sky is blue"
//Output: "blue is sky the"
//Example 2:
//
//Input: s = "  hello world  "
//Output: "world hello"
//Explanation: Your reversed string should not contain leading or trailing spaces.
//Example 3:
//
//Input: s = "a good   example"
//Output: "example good a"
//Explanation: You need to reduce multiple spaces between two words to a single space in the reversed string.
//Example 4:
//
//Input: s = "  Bob    Loves  Alice   "
//Output: "Alice Loves Bob"
//Example 5:
//
//Input: s = "Alice does not even like bob"
//Output: "bob like even not does Alice"
//
//Constraintsfor input s:
//
//1 <= s.length <= 104
//s contains English letters (upper-case and lower-case), digits, and spaces ' '.
//There is at least one word in s.

class question3
{
    function reverseString($s)
    {
        //create an array from string
        $string_array = explode(" ", $s);
        $length = sizeof($string_array) - 1;

        //loop through the array from the end
        $reversed_array = [];
        for ($i = $length; $i >= 0; $i--) {
            //avoid adding spaces
            if ($string_array[$i] != "") {
                $reversed_array[] = $string_array[$i];
            }
        }
        //create a string from reversed array
        return implode(' ', $reversed_array);
    }

}