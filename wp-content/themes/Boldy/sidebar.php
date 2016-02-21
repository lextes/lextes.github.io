
<!-- Begin #colRight -->
		<aside>
		<?php 
		if(of_get_option('boldy_blog')!='' && is_category(of_get_option('boldy_blog')) || post_is_in_descendant_category( of_get_option('boldy_blog'))){
		$current = get_the_category();
		if(sizeof($current)>0){ 
		$current_id= $current[0] ->cat_ID; 
		$categs_list = get_category_parents($current_id);
		$pieces = explode("/", $categs_list);
		$category_name = strtolower($pieces[0]);
		$categs = get_cat_id($category_name);
		?>
		<div class="rightBox">
			<h2><?php echo get_cat_name(get_option('boldy_blog'));?> Categories </h2>
			<ul >
				<?php	
				$categories = get_categories('hide_empty=1&child_of='.$categs);
				foreach ($categories as $cat) {
					echo ('<li><a href="');
					echo (get_category_link($cat->cat_ID).'">'.$cat->cat_name.'</a></li>');
					}?>
			</ul>
		</div>
		<?php }}?>
		
		<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
						<?php dynamic_sidebar( 'sidebar' ); ?>
                <?php endif; ?>
		
		</aside>
<!-- End #colRight -->
		
