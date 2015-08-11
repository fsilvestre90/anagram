<?php

	require_once "src/anagramGenerator.php";

	class AnagramGeneratorTest extends PHPUnit_Framework_TestCase
	{

		function test_makeAnagram_checkInputs()
		{
				$test_AnagramGenerator = new AnagramGenerator;
				$input = "bread";
				$possibilities = array();

				//Act
				$result = $test_AnagramGenerator->makeAnagram($input, $possibilities);

				//Assert
				$this->assertEquals(array(), $result);

		}

		function test_makeAnagram_verifyNotMatching()
		{
				$test_AnagramGenerator = new AnagramGenerator;
				$input_word = "bread";
				$possibilities = array("bread");

				//Act
				$result = $test_AnagramGenerator->makeAnagram($input_word, $possibilities);

				//Assert
				$this->assertEquals(array('bread' => 1), $result);

		}

		function test_makeAnagram_verifyNotAnagram()
		{
				$test_AnagramGenerator = new AnagramGenerator;
				$input_word = "bread";
				$possibilities = array("jim");

				//Act
				$result = $test_AnagramGenerator->makeAnagram($input_word, $possibilities);

				//Assert
				$this->assertEquals(array('jim' => 2), $result);

		}

		function test_makeAnagram_verifyAnagram()
		{
				$test_AnagramGenerator = new AnagramGenerator;
				$input_word = "bread";
				$possibilities = array("beard");

				//Act
				$result = $test_AnagramGenerator->makeAnagram($input_word, $possibilities);

				//Assert
				$this->assertEquals(array('beard' => 3), $result);

		}

	}

?>
