<form role="search" method="get" class="search-form" action="<?=home_url( '/' )?>">
	<div>
		<label for="s" id="searchlabel">Search Publications:</label>
		<input type="text" value="<?=htmlentities($_GET['s'])?>" name="s" class="search-field" id="s" placeholder="Search Publications" />
		<button type="submit" class="search-submit">Search</button>
	</div>
</form>