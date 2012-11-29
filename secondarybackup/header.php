<div data-role="header">
	<?php
		if (!$backLabel)
		{
			$backLabel = "Back";
		}
		
		if ($backLink != "")
		{
	?>
			<a href="<?= $backLink ?>">
				<?= $backLabel ?>
			</a>
	<?php
		}
		else
		{
	?>
			<a href="tutorial.php">
				Tutorial
			</a>
	<?php
		}
	?>
	<h1>Football 4 Noobz</h1>
	<a href="search.php?week=<?= $week ?>&gameId=<?= $gameId ?>" class="ui-btn-right">
		Search
	</a>
</div><!-- /header -->
