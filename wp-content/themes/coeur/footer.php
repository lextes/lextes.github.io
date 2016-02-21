<?php if(is_active_sidebar('footer-1') or is_active_sidebar('footer-2') or is_active_sidebar('footer-3')): ?>
	<div class="footer-top">
		<div class="container">
			<div class="col-sm-4">
				<?php dynamic_sidebar( 'footer-1' ); ?>
			</div>
			<div class="col-sm-4">
				<?php dynamic_sidebar( 'footer-2' ); ?>
			</div>
			<div class="col-sm-4">
				<?php dynamic_sidebar( 'footer-3' ); ?>
			</div>
		</div>
	</div>
<div class="blog-footer" style="border-top: 1px solid #ECECEC;background:#FFF;">
	<div class="container">
		<p>&copy; <?php echo date('Y'); ?> - <?php coeur_footer(); ?></p>
		<p><a href="#"><i class="fa fa-angle-up"></i> <?php echo __('Back to top', 'coeur'); ?><a></p>
	</div>
</div>
<?php else: ?>
<div class="blog-footer">
	<div class="container">
		<p>&copy; <?php echo date('Y'); ?> - <?php coeur_footer(); ?></p>
		<p><a href="#"><i class="fa fa-angle-up"></i> <?php echo __('Back to top', 'coeur'); ?><a></p>
	</div>
</div>
<?php endif; ?>
<?php wp_footer(); ?>
</div> <!-- wrap -->
</body>
</html>