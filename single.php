<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package yogapszczyna
 */

get_header();
?>
<main class="site-main">
  <section>
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-9">
          <?php
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content-post', get_post_type() );

							the_post_navigation(
								array(
									'prev_text' => '<svg class="navigation-icon" viewBox="0 0 9 15" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" fill="currentColor" style=fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2"><path d="m8.422 12.269-1.867 1.913L0 7.439l.34-.348L0 6.743 6.555 0l1.867 1.913L3.393 7.09l5.029 5.179Z"/></svg><span class="nav-subtitle">' . esc_html__( 'Poprzedni', 'yogapszczyna . '</span>',
									'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Następny', 'yogapszczyna' ) . '</span><svg class="navigation-icon" viewBox="0 0 9 15" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" fill="currentColor" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2"><path d="m8.422 12.269-1.867 1.913L0 7.439l.34-.348L0 6.743 6.555 0l1.867 1.913L3.393 7.09l5.029 5.179Z"/></svg>',
								)
							);
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; // End of the loop.
						?>
        </div>
        <div class="col-12 col-md-3">
          <?php get_sidebar(); ?>
        </div>
      </div>
    </div>
  </section>
</main>
<?php
get_footer();