<?php /* Template Name: Podstrona tekstowa*/ get_header(); ?>

<main role="main" class="main subpage">
  <section class="main-section">
    <figure class="figure m-0 text-center">
      <?php the_post_thumbnail('oryginal', array('class' => 'image')); ?>
    </figure>
  </section>
  <section class="my-8 my-md-16">
    <div class="container">
      <?php if (have_posts()): while (have_posts()) : the_post(); ?>
      <div id="post-<?php the_ID(); ?>" class="row" <?php post_class('article'); ?>>
        <article class="col-12 col-md-9">
          <header class="text-center">
            <h1 class="header h2 mb-4 mb-md-8"><?php the_title(); ?></h1>
          </header>
          <div class="entry-content">
            <?php the_content(); ?>
          </div>
        </article>
        <div class="col-12 col-md-3">
          <?php get_sidebar(); ?>
        </div>
      </div>
      <?php endwhile; ?>
      <?php else: ?>
      <div class="row">
        <div class="col-12 col-md-8 offset-md-2">
          <article>
            <header class="header">
              <h4><?php _e( 'Ups, po skończonej sesji Yogi harmonia powróci ;)', 'yogapszczyna' ); ?></h4>
            </header>
          </article>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </section>
</main>
<?php get_footer(); ?>