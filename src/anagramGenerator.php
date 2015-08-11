<?php
    class anagramGenerator
    {

        function makeAnagram($input, $possibilities)
        {
            $output = array();

            //format input string
            strtolower($input);
            $input_sorted = str_split($input);
            sort($input_sorted);


            foreach($possibilities as $possibility) {
                //check for null and 0 length strings, do nothing if either
                if(strlen($possibility) != 0 && !is_null($possibility)) {

                    //force lowercase format
                    strtolower($possibility);

                    if ($input != $possibility) { //checking non-sorted inputs

                        //sort possibilities

                        $possibility_sorted = str_split($possibility);
                        sort($possibility_sorted);
                        //
                        if ($input_sorted != $possibility_sorted) {
                            $output[$possibility] = 2;
                        } else {
                            $output[$possibility] = 3;
                        }
                    }
                    else {
                        $output[$possibility] = 1;
                    }

                }

            }

            return $output;
        }



    }
?>
