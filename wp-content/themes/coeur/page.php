<?php 
/**
* Single Pots
* @package Coeur
* @author Titouanc
* @since 1.0
*/

get_header();
$coeur_opt = get_option('page_sidebar');

if(get_option('coeur_sidebar_float') == 'left'):
    $coeur_sidebar_float = 'left';
    $coeur_main_content_float = 'right';
  else:
    $coeur_sidebar_float = 'right';
    $coeur_main_content_float = 'left';
endif;

if($coeur_opt == 'yes'): 
    $coeur_show = true;
    $coeur_size = 9;
  else: 
    $coeur_show = false;
    $coeur_size = 12;
endif; ?>

<div class="container">

	<div class="row">

		<div class="col-sm-<?php echo $coeur_size; ?> col-xs-12 blog-main" style="float:<?php echo $coeur_main_content_float ?>;">
			
			<?php while ( have_posts() ) : the_post();	?>

			<?php get_template_part('templates/content', 'page'); ?>
			
			<?php if ( comments_open() || get_comments_number() ) { ?>
			<div id="com_container" class="comment-container">
				<?php comments_template('/framework/comments.php'); ?>
			</div>
			<?php } ?>

		<?php endwhile; ?>

	</div> <!-- blog-main -->

	<?php if($coeur_show == true){ ?>
	<div class="col-sm-3 col-xs-12 blog-sidebar" style="float:<?php echo $coeur_sidebar_float ?>;">
		<?php dynamic_sidebar('sidebar-1'); ?>
	</div><!-- /.blog-sidebar -->
	<?php } ?>
</div> <!-- row -->
</div> <!-- container -->

<?php get_footer(); ?>