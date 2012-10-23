<?php
	include ("./constants.php");
	include ("./dbconnect.php");
	include ("./dbfuncs.php");
?>

<html>
	<head>
		<title>Sample Page</title>
		<link rel="apple-touch-icon" href="appicon.png" />
		<link rel="apple-touch-startup-image" href="startup.png">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta name="viewport" content="width=device-width, user-scalable=no" />
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<h1>Sample Table</h1>
		<h3>This table was populated by data in the database.</h3>
		<table>
			<tr>
				<th>ID</th>
				<th>First Name</th>
				<th>Last Name</th>
			</tr>
			<?php
				$result = executeQuery($db, "select * from SampleTable;");
				foreach ($result as $row)
				{
			?>
					<tr>
						<td><?= $row["id"] ?></td>
						<td><?= $row["firstName"] ?></td>
						<td><?= $row["lastName"] ?></td>
					</tr>
			<?
				}
			?>
		</table>
	</body>
</html>

<?php
	include ("./dbdisconnect.php");
?>

