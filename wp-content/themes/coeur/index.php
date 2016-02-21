<?php get_header(); 
$coeur_opt = get_option('front_sidebar');

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

      <div class="posts">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php get_template_part('templates/content', get_post_format()); ?>

      <?php endwhile; else: ?>
      <article class="post">
        <div class="notfound">
          <h1><?php echo __('404', 'coeur'); ?></h1>
          <p><?php echo __('Nothing\'s here.', 'coeur'); ?></p>
          <?php get_search_form(); ?>
        </div>
      </article>
    <?php endif; ?>
  </div>

  <?php coeur_paging(); ?>

</div><!-- /.blog-main -->

<?php if($coeur_show == true){ ?>
<div class="col-sm-3 col-xs-12 blog-sidebar" style="float:<?php echo $coeur_sidebar_float ?>;">
  <?php dynamic_sidebar('sidebar-1'); ?>
</div><!-- /.blog-sidebar -->
<?php } ?>

</div><!-- /.row -->

</div><!-- /.container -->

<?php get_footer(); ?>