<?php
	function processDescription($db, $description, $gameId, $week)
	{
		$descArray = explode(" ", $description);
		
		// Check bigrams
		$index = 0;
		while (true)
		{
			$check = $descArray[$index] . " " . $descArray[$index + 1];
			$check = preg_replace("/[^A-Za-z0-9 ]/", '', $check);
			$checkResult = executeQuery($db,
				"select id from Term where name = \"" . $check 
				. "\" union all select termId as id from Alias where alias = \""
				. $check . "\";");
			
			if (count($checkResult) != 0)
			{
				$term = $checkResult[0];
				$typeResult = executeQuery($db,
					"select type from Term where id=" . $term["id"] . ";");
				$type = $typeResult[0];
				if ($type["type"] == "player")
				{
					$style = "color: red;";
				}
				else
				{
					$style = "";
				}


				$descArray[$index] = "<a style='" . $style . "' href='term.php?termId=" . $term["id"] 
					. "&gameId=" . $gameId . "&week=" . $week . "'>" . $descArray[$index];
				$descArray[$index + 1] = $descArray[$index + 1] . "</a>";
				$index += 2;
			}
			else
			{
				$index++;
			}
			
			if ($index >= count($descArray) - 1)
				break;
		}
		
		// Check unigrams
		$index = 0;
		while (true)
		{
			$check = $descArray[$index];
			$check = preg_replace("/[^A-Za-z0-9 ]/", '', $check);
			$checkResult = executeQuery($db,
				"select id from Term where name = \"" . $check 
				. "\" union all select termId as id from Alias where alias = \""
				. $check . "\";");
			
			if (count($checkResult) != 0)
			{
				$term = $checkResult[0];
				$descArray[$index] = "<a href='term.php?termId=" . $term["id"] 
					. "&gameId=" . $gameId . "&week=" . $week . "'>" . $descArray[$index]
					. "</a>";
			}

			$index++;
		
			if ($index >= count($descArray))
				break;
		}
		
		return implode (" ", $descArray);
	}
?>

