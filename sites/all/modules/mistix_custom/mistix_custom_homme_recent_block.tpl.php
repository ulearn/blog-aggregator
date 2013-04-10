<div id="remove">
  <h2><a class="catlink"
         href="#filter=*"><?php print t('Show All'); ?></a> <a class="catlink"
         href="#filter=.post"><?php print t('Posts'); ?></a> <a class="catlink"
         href="#filter=.port"><?php print t('Portfolio'); ?></a></h2>
</div>

<div id="showpost">
  <div class="showpostload">
    <div class="loading"></div>
  </div>

  <div class="closehomeshow"></div>

  <div class="showpostpostcontent"
       id="showpostpostcontent"></div>
</div>

<div class="homeRacent">
  <div id="homeRecent">
    <?php if (!empty($nodes)): ?>
      <?php foreach ($nodes as $node): ?>
        <?php
        $class = 'port';
        $field_category = 'field_portfolio_category';
        $field_image = 'field_portfolio_image';
        if ($node->type == 'blog') {
          $class = 'post';
          $field_category = 'field_blog_category';
          $field_image = 'field_image';
        }
        $category = mistix_format_comma_field($field_category, $node);
        $uri = $node->{$field_image}[LANGUAGE_NONE][0]['uri'];
        $image = theme('image_style', array('style_name' => 'portfolio_four', 'path' => $uri));
        ?>
        <div class="one_fourth itemhome <?php print $class; ?>"
             data-category="port">
          <div class="click"
               id="<?php print base_path(); ?>node/<?php print $node->nid; ?>">
            <div class="recentborder"></div>

            <h3><?php print views_trim_text(array('max_length' => 25), $node->title); ?></h3>

            <div class="overdefult">
              <div class="overLowerDefault"></div>
            </div>

            <div class="image">
              <div class="loading"></div>
              <?php print $image; ?>
            </div>
          </div>

          <div class="recentborder"></div>

          <h3><?php print $category; ?></h3>

          <div class="bottomborder"></div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>


  </div>
</div>