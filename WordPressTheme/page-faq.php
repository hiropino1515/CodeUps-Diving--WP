<?php get_header(); ?>

  <!-- 下層ページのメインビュー -->
  <div class="sub-mv">
    <div class="sub-mv__inner">
      <picture>
        <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/faq-img-sp.jpg" media="(max-width: 767px)" >
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/faq-img.jpg" alt="青い海と白い砂浜の画像">
      </picture>
      <div class="sub-mv__header js-mv-header">
        <h2 class="sub-mv__title">FAQ</h2>
      </div>
    </div>
  </div>

   <!-- パンくず -->
   <?php get_template_part('parts/breadcrumb') ?>

  <main>
    <section class="page-faq layout-page-common">
      <div class="page-faq__inner inner">
        <dl class="page-faq__accordion">
          <?php
          $fields = SCF::get_option_meta('theme-options', 'faq');
          foreach ($fields as $field_name => $fields_value) {
          ?>
            <dt class="page-faq__question js-accordion"><?php echo esc_html($fields_value['question']); ?></dt>
            <dd class="page-faq__answer"><?php echo esc_html($fields_value['answer']); ?></dd>
          <?php } ?>
        </dl>
      </div>
    </section>

<?php get_footer(); ?>
