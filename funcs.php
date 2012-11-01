<?php
	function processDescription($db, $description, $gameId, $week)
	{
		$descArray = explode(" ", $description);
		
		// Check bigrams and unigrams
		$index = 0;
		while (true)
		{
			$check = $descArray[$index] . " " . $descArray[$index + 1];
			$checkResult = executeQuery($db,
				"select * from Term where name = \"" . $check . "\";"); //TODO aliases
			
			// Bigram
			if (count($checkResult) != 0)
			{
				$term = $checkResult[0];
				array_splice ($descArray, $index + 2, 0, "</a>");
				array_splice ($descArray, $index, 0, 
					"<a href='term.php?termId=" . $term["id"] 
					. "&gameId=" . $gameId . "&week=" . $week . "'>");
				$index += 4;
			}
			
			// Unigrams
			else
			{
				$index++;
			}
			
			if ($index >= count($descArray) - 1)
				break;
		}
		
		// Check the last unigram
		
		return implode (" ", $descArray);
	}
?>

