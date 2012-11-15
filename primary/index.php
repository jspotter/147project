<?php
	include ("./constants.php");
	include ("./dbconnect.php");
	include ("./dbfuncs.php");
?>

<html>
	<head>
		<script src="http://cdn.optimizely.com/js/138697994.js"></script>
		<title>Football 4 Noobz</title>
		<meta charset="utf-8">
		<meta name="apple-mobile-web-app-capable" content="yes">
	 	<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta name="viewport" content="width=device-width, initial-scale=1"> 

		<link rel="stylesheet" href="jquery.mobile-1.2.0.css" />

		<link rel="stylesheet" href="style.css" />
		<!-- link rel="apple-touch-icon" href="appicon.png" /-->
		<!-- link rel="apple-touch-startup-image" href="upstart.png"-->
	
		<script src="jquery-1.8.2.min.js"></script>
		<script src="jquery.mobile-1.2.0.js"></script>
	</head>
	<body onload="window.location='#week9';">
		<?php
			$numWeeks = 15;
			for ($week = 1; $week <= $numWeeks; $week++)
			{
				$previousWeek = max(1, $week - 1);
				$nextWeek = min($week + 1, $numWeeks);
				$weekStart = $WEEK_STARTS[$week - 1];
				$weekEnd = $WEEK_ENDS[$week - 1];
		?>
				<div data-role="page" id="week<?= $week ?>">
					<?php
						$backLink = "";
						include ("./header.php");
					?>

					<div data-role="header" id="weeknav">
						<?php
							if ($week != 1)
							{	
						?>
								<a href="#week<?= $previousWeek ?>" class="ui-btn-left">&lt;&lt;</a>
						<?
							}
						?>
						<h2>Week <?= $week ?></h2>
						<?php
							if ($week != $numWeeks)
							{
						?>
								<a href="#week<?= $nextWeek ?>" class="ui-btn-right">&gt;&gt;</a>
						<?php
							}
						?>
					</div>

					<div data-role="content">
						<ul data-role="listview" data-inset="true" data-filter="true">
						<?php
							$games = executeQuery($db, 
								"select * from Game where startTime >= '" . $weekStart
								."' and startTime <= '" . $weekEnd . "';");
							for ($i = 0; $i < count($games); $i++)
							{
								$awayTeam = executeQuery($db,
									"select * from Team where id = " . $games[$i]["awayTeamId"]);
								$homeTeam = executeQuery($db,
									"select * from Team where id = " . $games[$i]["homeTeamId"]);
								$final = $games[$i]["endTime"] != "";
								$quarterResult = executeQuery($db,
									"select max(quarter) as mq from Play where gameId = " . $games[$i]["id"]);
								$quarter = "Quarter " . $quarterResult[0]["mq"];
								$playResult = executeQuery($db,
									"select * from Play where gameId = " . $games[$i]["id"]
									. " order by quarter desc, clock;");
								$clock = $playResult[0]["clock"];
						?>
								<li>
									<a href="game.php?id=<?= $games[$i]['id'] ?>&week=<?= $week ?>">
										<table>
											<tr>
												<td>
													<?= $awayTeam[0]["name"]; ?>
												</td>
												<td>
													<?= $playResult[0]["awayScore"] ?>
												</td>
												<td>
													
													<?php
														if ($final)
														{
															echo "F";
														}
														else
														{
															echo $quarter;
														}
													?>
												</td>
											</tr>
											<tr>
												<td>
													<?= $homeTeam[0]["name"]; ?>
												</td>
												<td>
													<?= $playResult[0]["homeScore"] ?>
												</td>
												<td>
													<?php
														if (!$final)
														{
															echo $clock;
														}
													?>
												</td>
											</tr>
										</table>
									</a>
								</li>
						<?php
							}
						?>
						</ul>
					</div><!-- /content -->
					
					<?php
						include ("./footer.php");
					?>
				</div><!-- /page -->
			
		<?php
			}
		?>
	</body>
</html>

<?php
	include ("./dbdisconnect.php");
?>

