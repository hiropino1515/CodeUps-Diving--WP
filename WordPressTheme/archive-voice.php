<?php get_header(); ?>

  <!-- 下層ページのメインビュー -->
  <div class="sub-mv">
    <div class="sub-mv__inner">
      <picture>
        <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/voice-img-sp.jpg" media="(max-width: 767px)" >
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/voice-img.jpg" alt="魚の画像">
      </picture>
      <div class="sub-mv__header js-mv-header">
        <h2 class="sub-mv__title">Voice</h2>
      </div>
    </div>
  </div>

   <!-- パンくず -->
   <?php get_template_part('parts/breadcrumb') ?>


  <main>
    <div class="common-tab layout-page-common">
      <div class="common-tab__inner inner">
        <ul class="common-tab__lists">
          <li><a href="<?php echo esc_url( home_url( '/voice/' ) ) ; ?>" class="common-tab__list current">ALL</a></li>
          <?php
              $terms = get_terms('voice_category');
              foreach ( $terms as $term ) {
              echo '<li><a class="common-tab__list" href="'.get_term_link($term).'">'.esc_html($term->name).'</a></li>';
              }
          ?>
        </ul>
      </div>
    </div>
    <section class="page-voice layout-page-voice">
      <div class="page-voice__inner inner">
        <div class="page-voice__container">
          <ul class="voice-cards">
          <?php if (have_posts(  )): ?>
            <?php while(have_posts(  )): ?>
              <?php the_post(  ); ?>
            <li class="voice-cards__item voice-card ">
              <a href="#" class="voice-card__link">
                <div class="voice-card__inner">
                  <div class="voice-card__wrapper">
                    <div class="voice-card__image js-colorbox">
                      <?php if(has_post_thumbnail( )): ?>
                      <?php the_post_thumbnail( ); ?>
                      <?php else: ?>
                      <img src="<?php echo get_template_directory_uri( ); ?>/assets/images/common/noimg.png" alt="">
                      <?php endif; ?>
                    </div>
                    <div class="voice-card__head">
                      <div class="voice-card__meta">
                        <div class="voice-card__tag"><?php 
                        $tags = get_the_tags();
                        foreach ( $tags as $tag ) {
                          echo $tag->name;
                        }
                      ?></div>
                        <?php 
                        $category = get_the_category();
                        if($category[0]) : ?>
                        <div class="voice-card__category"><?php echo $category[0]->cat_name; ?></div>
                        <?php endif ?>
                      </div>
                      <div class="voice-card__heading">
                        <h3 class="voice-card__title"><?php the_title(); ?></h3>
                      </div>
                    </div>
                  </div>
                  <div class="voice-card__body">
                    <p class="voice-card__text"><?php the_excerpt(); ?>
                    </p>
                  </div>
                </div>
              </a>
            </li>
            <?php endwhile; ?>
          <?php endif; ?>
          </ul>
        </div>
        <div class="page-voice__pagenavi">
          <div class="wp-pagenavi">
            <?php wp_pagenavi(); ?>
          </div>
        </div>
      </div>
    </section>

<?php get_footer(); ?>