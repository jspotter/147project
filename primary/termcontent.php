<?php
	$needDb = ($db == null);
	if ($needDb)
	{
		include ("./dbconnect.php");
	}
	include_once ("./dbfuncs.php");
	include_once ("./funcs.php");
	
	$multipleIds = array();
	
	if ($week == null)
	{
		$week = $_GET["week"];
	}
	if ($gameId == null)
	{
		$gameId = $_GET["gameId"];
	}
	
	if ($termId != null)
	{
		array_push($multipleIds, $termId);
	}
	else
	{
		$termId = $_GET["termid"];
		//TODO handle invalid input
		
		if ($termId == null)
		{
			$termString = $_GET["term"];
			$results = getTerm($db, "%" . $termString . "%");
			foreach ($results as $result)
			{
				array_push($multipleIds, $result["id"]);
			}
		}
	}
	
	$resultDisplayed = false;
?>

<div data-role="content">
	<center>
		<?php
			if (count($multipleIds) == 0)
			{
		?>
				<br>
				Sorry, no terms to display.
		<?
			}
		
			else foreach ($multipleIds as $termId)
			{
				$termResult = executeQuery($db,
					"select * from Term where id = '" . $termId . "';");
				if (count($termResult) > 0)
				{
					$term = $termResult[0];
			?>
					<h1><?= $term["name"] ?> (<?= $term["type"] ?>)</h1>
			<?php
					if ($term["type"] == "player")
					{
						$playerResult = executeQuery($db,
							"select * from Player where name = '" . $term["name"] . "';");
						$player = $playerResult[0];
						$teamResult = executeQuery($db,
							"select * from Team where id = " . $player["teamId"] . ";");
						$team = $teamResult[0];
			?>
						<table>
							<tr>
								<td><b>Team:</b></td>
								<td><?= $team["name"] ?></td>
							</tr>
							<tr>
								<td><b>Number:</b></td>
								<td><?= $player["number"] ?></td>
							</tr>
							<tr>
								<td><b>Position:</b></td>
								<td>
									<?= processDescription($db, $player["position"], $termIds, $gameId, $week) ?>
								</td>
							</tr>
							<tr>
								<td><b>Weight:</b></td>
								<td><?= $player["weight"] ?></td>
							</tr>
							<tr>
								<td><b>Year:</b></td>
								<td><?= $player["year"] ?></td>
							</tr>
							<tr>
								<td><b>Background:</b></td>
								<td><?= $player["background"] ?></td>
							</tr>
						</table>
			<?php
					}
					else if ($term["type"] == "position")
					{
						$positionResult = executeQuery($db,
							"select * from Position where abbreviation = '" . $term["name"] . "';");
						$position = $positionResult[0];
			?>
						<b><?= $position["name"] ?> (<?= $position["abbreviation"] ?>): </b>
						<?= processDescription($db, $position["description"], $termIds, $gameId, $week) ?>
			<?php
					}
					else
					{
			?>
						<b><?= $term["name"] ?>: </b>
						<?= processDescription($db, $term["description"], $termIds, $gameId, $week) ?>
						<br><img src="<?= $term["filename"] ?>"/>
			<?php
					}
				}
			}
		?>
	</center>
</div>

<?php
	if ($needDb)
	{
		include ("./dbdisconnect.php");
	}
?>
