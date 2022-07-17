<?php /* Template Name: Strona główna */ get_header(); ?>

<main role="main" class="main homepage">
  <section class="section-main" class="py-16 pb-md-32 section-img">
    <div class="container">
      <div class="row">
        <?php if (have_posts()): while (have_posts()) : the_post(); ?>
        <div id="post-<?php the_ID(); ?>"
          <?php post_class('col-12 col-md-8 offset-md-2 items-center mb-0 text-center'); ?>>
          <article>
            <figure>
              <?php the_post_thumbnail(); ?>
            </figure>
            <header class="mb-4 mb-md-6">
              <h1 class="header h1 gradient font-light"><?php the_title(); ?></h1>
            </header>
            <div class="font-size-base font-size-md-lg lh-sm lh-md-base">
              <?php the_content(); ?>
            </div>
          </article>
        </div>
        <?php endwhile; ?>
        <?php else: ?>
        <article>
          <header class="header">
            <h4>
              <?php _e( 'Ups, po skończonej sesji Yogi harmonia powróci ;)', 'yogapszczyna' ); ?>
            </h4>
          </header>
        </article>
        <?php endif; ?>
  </section>
</main>
<?php get_footer(); ?>