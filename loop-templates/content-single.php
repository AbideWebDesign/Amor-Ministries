<?php
/**
 * Single post partial template
 *
 * @package amor
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article id="post-<?php the_ID(); ?>" class="border h-100">

	<div class="mb-2">
	
		<a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( get_the_ID(), 'Card', array('class'=>'img-fluid') ); ?></a>
		
	</div>
	
	<div class="p-md-4">
		
		<header class="entry-header">
	
			<a href="<?php the_permalink(); ?>"><?php the_title( '<h4 class="entry-title">', '</h4>' ); ?></a>
	
		</header><!-- .entry-header -->
	
		<div class="entry-content">
	
			<?php the_excerpt(); ?>
	
		</div><!-- .entry-content -->
	
		<footer class="entry-footer">
	
			<?php echo get_the_date(); ?>
		
		</footer><!-- .entry-footer -->
		
	</div>

</article><!-- #post-## -->
