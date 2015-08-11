<?php
    class anagramGenerator
    {
        function makeAnagram($input)
        {

        	$input_array = str_split($input);
          sort($input_array);
          
        	return implode($input_array);

        }

    }
?>
