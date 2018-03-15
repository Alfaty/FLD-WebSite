<form method="get" id="searchform" class="search-form" action="<?php echo home_url(); ?>" _lpchecked="1">
	<fieldset>
		<input type="text" name="s" id="s" value="<?php the_search_query(); ?>" placeholder="<?php _e('Search the site','onepage-lite'); ?>" />
		<input id="search-image" class="sbutton" type="submit" value="<?php _e('Search','onepage-lite'); ?>" />
	</fieldset>
</form>