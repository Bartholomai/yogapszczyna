<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package yogapszczyna
 */

?>

<footer id="colophon" class="footer">
  <div class="container p-relative">
    <div class="row">
      <div class="col-12">
        <p class="my-8 my-md-16 p-0 border-top"></p>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-md-4">
        <?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
        <?php dynamic_sidebar( 'sidebar-2' ); ?>
        <?php endif; ?>
      </div>
      <div class="col-12 col-md-4">
        <?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
        <?php dynamic_sidebar( 'sidebar-3' ); ?>
        <?php endif; ?>
      </div>
      <div class="col-12 col-md-4">
        <?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
        <?php dynamic_sidebar( 'sidebar-4' ); ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <div class="mt-4 mt-md-8 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="site-info">
            <?php printf( esc_html__( 'Copyright %1$s', 'yogapszczyna' ), 'Yoga Pszczyna' );?>
            <span class="sep"> | </span>
            <span>Wszelkie prawa zastrzeżone</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
</div>

<?php wp_footer(); ?>

</body>

</html>