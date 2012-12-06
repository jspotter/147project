<?php
	function getTerm($db, $term)
	{
		return executeQuery($db, "select distinct id from (select id from Term where name like \"" . $term
			. "\" union all select termId as id from Alias where alias like \""
			. $term . "\");");
	}

	function processDescription($db, $description, $termIds, $gameId, $week)
	{
		$descArray = explode(" ", $description);
		$newDesc = implode("/", $descArray);
		$descArray = explode("/", $newDesc);
		
		// Check bigrams
		$index = 0;
		while (true)
		{
			$check = $descArray[$index] . " " . $descArray[$index + 1];
			$check = preg_replace("/[^-A-Za-z0-9 ]/", '', $check);
			$checkResult = getTerm($db, $check);
			
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
				
				if ($termIds == null)
				{
					$termIds = array();
				}

				$newTermIds = $termIds;
				array_push($newTermIds, $term["id"]);
				$descArray[$index] = "<a style='" . $style . "' href='term.php?termIds=" 
					. implode(",", $newTermIds) 
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
			$check = preg_replace("/[^-A-Za-z0-9 ]/", '', $check);
			$checkResult = getTerm($db, $check);
			
			if (count($checkResult) != 0)
			{
				$term = $checkResult[0];
				
				if ($termIds == null)
				{
					$termIds = array();
				}
				$newTermIds = $termIds;
				array_push($newTermIds, $term["id"]);
				$descArray[$index] = "<a href='term.php?termIds=" . implode(",", $newTermIds)
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

