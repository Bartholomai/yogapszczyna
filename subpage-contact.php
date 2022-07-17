<?php /* Template Name: Podstrona kontakt*/ get_header(); ?>

<main role="main" class="main subpage">
  <section class="main-section">
    <figure class="figure m-0 text-center">

    </figure>
  </section>
  <section class="my-8 my-md-16">
    <div class="container">
      <?php if (have_posts()): while (have_posts()) : the_post(); ?>
      <div id="post-<?php the_ID(); ?>" class="row" <?php post_class('article'); ?>>
        <article class="col-12 col-md-9">
          <header>
            <h1 class="header h2 mb-8 mb-md-16"><?php the_title(); ?></h1>
          </header>
          <div class="entry-content">
            <?php the_content(); ?>
          </div>
        </article>
      </div>
      <?php endwhile; ?>
      <?php else: ?>
      <div class="row">
        <div class="col-12 col-md-8 offset-md-2">
          <article>
            <header class="header">
              <?php _e( 'Ups, po skończonej sesji Yogi harmonia powróci ;)', 'yogapszczyna' ); ?>
            </header>
          </article>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </section>
</main>
<?php get_footer(); ?>