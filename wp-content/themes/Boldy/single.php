<?php
get_header();
?>

<!-- Begin section -->
		<section>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<article>
            <header>
				<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1> 
				<div class="meta">
							<?php the_time('M j, Y') ?> &nbsp;&nbsp;//&nbsp;&nbsp; by <span class="author"><?php the_author_link(); ?></span> &nbsp;&nbsp;//&nbsp;&nbsp;  <?php the_category(', ') ?>  &nbsp;//&nbsp;  <?php comments_popup_link(__("No Comments", "site5framework"),__("1 Comment", "site5framework"),__("% Comments", "site5framework") ); ?>  
						</div>
				
		      </header>
              <?php the_content(__('read more', "site5framework")); ?> 
                    
<!-- Aqui corte -->
<!-- Aqui dejé -->	
		
        <?php comments_template(); ?>
			</article>
		<?php endwhile; else: ?>

		<p><?php _e("Sorry, but you are looking for something that isn't here.", "site5framework"); ?></p>


	<?php endif; ?>
		
			</section>
		<!-- End section -->

<?php get_sidebar(); ?>	

<?php get_footer(); ?>