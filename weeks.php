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
	<body>
		<div data-role="page" id="main">
			<?php
				$backLink = "";
				include ('./header.php');
			?>
			<div data-role="content">
				<ul data-role="listview" data-inset="true" data-filter="true">
					<?php
						$numWeeks = 15;
						for ($week = 1; $week <= $numWeeks; $week++)
						{
							$weekStart = $WEEK_STARTS[$week - 1];
							$weekEnd = $WEEK_ENDS[$week - 1];
							$games = executeQuery($db, 
								"select * from Game where startTime >= '" . $weekStart
								."' and startTime <= '" . $weekEnd . "' order by startTime;");
					?>
							<li>
								<a href="./week.php?week=<?= $week ?>">
									Week <?= $week ?> (<?= count($games) ?> games)
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
	</body>
</html>

<?php
	include ("./dbdisconnect.php");
?>

