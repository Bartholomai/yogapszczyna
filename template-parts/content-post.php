<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package yogapszczyna
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('mb-8 mb-md-16'); ?>>
  <figure class="post-thumbnail">
    <?php yogapszczyna_post_thumbnail(); ?>
  </figure>
  <div class="post-article-content">
    <header class="entry-header">
      <?php
					if ( is_singular() ) :
						the_title( '<h1 class="entry-title mb-4">', '</h1>' );
					else :
						the_title( '<h2 class="h4"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					endif;

					if ( 'post' === get_post_type() ) :
				?>
      <div class="entry-meta">
        <?php
							yogapszczyna_posted_on();
						?>
      </div>
      <?php endif; ?>
    </header>
    <div class="entry-content mb-4 mb-md-8">
      <?php
				if( is_singular() ):
					the_content(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Czytaj dalej<span class="screen-reader-text"> "%s"</span>', 'yogapszczyna' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							wp_kses_post( get_the_title() )
						)
						);
						else:
						excerpt(30);
						endif;
				?>
    </div>
  </div>
</article>
<!-- #post-<?php the_ID(); ?> -->