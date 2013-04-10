<?php
$site_mail = variable_get('site_mail', 'toan@tabvn.com');
$theme_path = base_path() . path_to_theme();
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <?php if (!$page): ?>
    <!-- Teaser -->
    <div class="blogpostcategory">
      <?php if (isset($node->field_image[LANGUAGE_NONE][0])): ?>
        <div class="blogimage">
          <a href="<?php print $node_url; ?>">
            <?php
            $uri = $node->field_image[LANGUAGE_NONE][0]['uri'];
            print theme('image_style', array('style_name' => 'blog_teaser', 'path' => $uri));
            ?></a>
        </div>
      <?php endif; ?>

      <div class="entry">

        <div class="meta">

          <h2 class="title"><a title="<?php print $node->title; ?>" rel="bookmark" href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>

        </div>

        <?php
        print render($content['body']);
        ?>

        <div class="line"></div>
        <a href="<?php print $node_url; ?>" title="Read more" class="textlink"><?php print t('Read more'); ?></a>
        <div class="socialsingle">						
          <div class="meta">
            <p class="written">
              <?php print theme('username', array('account' => $node)); ?>
            </p>

            <?php print render($content['field_blog_category']); ?>

            <?php
            $comment_count_text = format_plural($comment_count, '1 Comment', '@count Comments');
            if (!$comment_count) {
              $comment_count_text = t('No comment yet');
            }
            ?>
            <p class="comments"><a title="Comment on <?php print $node->title; ?>" href="<?php print $node_url; ?>#comments"><?php print $comment_count_text; ?></a></p>

          </div>
        </div>
      </div>		
    </div>
    <div class="bottomborder"></div>
  <?php endif; ?>
  <!--//teaser -->


  <!-- node full -->
  <?php if ($page): ?>
    <div class="postcontent singledefult">		
      <div class="blogpost">		
        <div class="posttext">
          <?php
          $image_field = 'field_image';
          $image = mistix_format_image_field($image_field, $node);
          print $image;
          ?>						

          <h1><?php print $title; ?></h1>	
          <div class="sentry">

            <?php print render($content['body']); ?>		
          </div>
        </div>
        <div class="linebreak"></div>

        <div class="socialsingle">
          <div class="addthis_toolbox">
            <div class="custom_images">
              <a class="addthis_button_facebook" title="Facebook">
                <img src="<?php print $theme_path; ?>/images/facebookIcon.png"
                     width="64"
                     height="64"
                     border="0"
                     alt="Facebook" /></a>
              <a class="addthis_button_twitter" title="Twitter">
                <img src="<?php print $theme_path; ?>/images/twitterIcon.png"
                     width="64"
                     height="64"
                     border="0"
                     alt="Twitter" /></a>
              <a class="addthis_button_digg" title="Digg">
                <img src="<?php print $theme_path; ?>/images/diggIcon.png"
                     width="64"
                     height="64"
                     border="0"
                     alt="Digg" /></a>
              <a class="addthis_button_more">
                <img src="<?php print $theme_path; ?>/images/socialIconShareMore.png"
                     width="64"
                     height="64"
                     border="0"
                     alt="More..." /></a>
            </div>
          </div>
          <script type="text/javascript"
          src="http://s7.addthis.com/js/250/addthis_widget.js"></script>
          <a class="emaillink" href="mailto:<?php print $site_mail; ?>" title="Send us Email"></a>
        </div>

        <div class="linebreak"></div>
        <div class="datecomment">
          <p>
            <span class="author"><?php print theme('username', array('account' => $node)); ?> </span>
            <span class="posted-date"><?php print format_date($node->created, 'custom', 'M d, Y'); ?></span>
            <span class="postedin">
              <?php
              $field_category = 'field_blog_category';
              $category = mistix_format_comma_field($field_category, $node);
              print $category;
              ?>
            </span>

          </p>
        </div>		
        <div class="linebreak"></div>
        <?php
        $field_tags = 'field_tags';
        $tag = mistix_format_comma_field($field_tags, $node);
        ?>
        <?php if (!empty($tag)): ?>
          <div class="tags"><span>

              <?php print $tag; ?>
            </span></div>	
        <?php endif; ?>

        <div> 
        </div>
        <div>  
        </div>

      </div>						

    </div>
    <div class="bottomborder"></div>
  <?php endif; ?>
  <!-- // node full -->

  

</div>
<?php print render($content['comments']); ?>