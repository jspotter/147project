<?php
	include ("./constants.php");
	include ("./dbconnect.php");
	include ("./dbfuncs.php");
?>

<html>
	<head>
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
	<body>
		<?php
			$numWeeks = 15;
			for ($week = 1; $week <= $numWeeks; $week++)
			{
				$previousWeek = max(1, $week - 1);
				$nextWeek = min($week + 1, $numWeeks);
		?>
				<div data-role="page" id="week<?= $week ?>">

					<div data-role="header">
						<h1>Football 4 Noobz</h1>
					</div><!-- /header -->
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
							$numGames = 10;
							for ($i = 1; $i <= $numGames; $i++)
							{
						?>
								<li>
									<a href="#game">
										<table>
											<tr>
												<td>
													Team<?= $i ?> (ranking)
												</td>
												<td>
													10
												</td>
												<td>
													3rd
												</td>
											</tr>
											<tr>
												<td>
													Opponent<?= $i ?> (ranking)
												</td>
												<td>
													3
												</td>
												<td>
													5:03
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
				</div><!-- /page -->
			
		<?php
			}
		?>
		<div data-role="page" id="game" data-add-back-btn="true">
			<div data-role="header">
				<h1>Football 4 Noobz</h1>
			</div><!-- /header -->
			
			<div data-role="content">
				terms terms terms <a href="#term" data-rel="dialog">TERM</a> terms terms
				<hr>
				more terms more terms
			</div>
		</div>
		
		<div data-role="page" id="term">
			<div data-role="header" data-theme="e">
				<h1>TERM</h1>
			</div><!-- /header -->
			
			<div data-role="content" data-theme="d">	
				<h2>Explanation</h2>
				<p>explanation explanation explanation</p>		
				<!--p><a href="#game" data-rel="back" data-role="button" data-inline="true" data-icon="back">Back to page "one"</a></p-->	
			</div><!-- /content -->
		</div>
	</body>
</html>

<?php
	include ("./dbdisconnect.php");
?>

