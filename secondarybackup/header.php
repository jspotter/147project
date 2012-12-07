<div data-role="header">
	<?php
		if (!$backLabel)
		{
			$backLabel = "Back";
		}
		
		
		if ($backLink != "")
		{
	?>
			<a href="<?= $backLink ?>" data-icon="back" > <?= $backLabel ?></a>
	<?php
		}
		else
		{
	?>
			<a href="tutorial.php" data-icon="info">Tutorial</a>
	<?php
		}
	?>
	<h1>Football 4 Noobz</h1>
	<a href="search.php?week=<?= $week ?>&gameId=<?= $gameId ?>" data-icon = "info" class="ui-btn-right">
		Search
	</a>
</div><!-- /header -->
