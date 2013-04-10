<?php
$site_mail = variable_get('site_mail', 'toan@tabvn.com');
$theme_path = base_path() . path_to_theme();
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <?php if (!$page): ?>
    <!-- Teaser -->
    <div class="blogpostcategory">
      <?php if (isset($node->field_portfolio_image[LANGUAGE_NONE][0])): ?>
        <div class="blogimage">
          <a href="<?php print $node_url; ?>">
            <?php
            $uri = $node->field_portfolio_image[LANGUAGE_NONE][0]['uri'];
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
        <a href="<?php print $node_url; ?>" title="<?php print t('Read more'); ?>" class="textlink"><?php print t('Read more'); ?></a>
        <div class="socialsingle">						
          <div class="meta">
            <p class="written">
              <?php print theme('username', array('account' => $node)); ?>
            </p>

            <?php print render($content['field_portfolio_category']); ?>

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

  <?php
  $theme_path = base_path() . path_to_theme();
  $field_image = 'field_portfolio_image';
  $image = mistix_format_image_field($field_image, $node);
  ?>

<?php if($page):?>
  <div class="blogpost postcontent port">
    <div class="projectdetails">
      <h1><?php print t('Project details'); ?></h1>

      <div class="linehomewrap">
        <div class="prelinehome"></div>

        <div class="linehome"></div>

        <div class="afterlinehome"></div>
      </div>

      <div class="datecomment">
        <p>

          <?php if (isset($node->field_portfolio_link[LANGUAGE_NONE][0]['url'])): ?>
            <span class="link"><?php print l('Live preview', $node->field_portfolio_link[LANGUAGE_NONE][0]['url']); ?></span>
            <br />
          <?php endif; ?>  
          <span class="authorp port"><?php print theme('username', array('account' => $node)); ?>
          </span><br />
          <span class="posted-date port"><?php print format_date($node->created, 'custom', 'M d, Y'); ?></span><br />
          <?php if (!empty($node->field_project_author[LANGUAGE_NONE][0]['value'])): ?>
            <span class="author port"><?php print $node->field_project_author[LANGUAGE_NONE][0]['value']; ?></span>
            <br />
          <?php endif; ?>
          <?php if (!empty($node->field_project_status[LANGUAGE_NONE][0]['value'])): ?>
            <span class="status port"><?php print $node->field_project_status[LANGUAGE_NONE][0]['value']; ?></span>
          <?php endif; ?>
      </div>

      <div class="linehomewrap">
        <div class="prelinehome"></div>

        <div class="linehome"></div>

        <div class="afterlinehome"></div>
      </div>

      <div class="socialsingle">
        <div class="addthis_toolbox">
          <div class="custom_images">
            <a class="addthis_button_facebook" addthis:url="<?php print $node_url; ?>" addthis:title="<?php print $node->title; ?>" title="Facebook">
              <img src="<?php print $theme_path; ?>/images/facebookIcon.png" width="64" height="64" border="0" alt="Facebook" /></a>
            <a class="addthis_button_twitter" addthis:url="<?php print $node_url; ?>" addthis:title="<?php print $node->title; ?>" title="Twitter">
              <img src="<?php print $theme_path; ?>/images/twitterIcon.png" width="64" height="64" border="0" alt="Twitter" /></a>
            <a class="addthis_button_digg" addthis:url="<?php print $node_url; ?>" addthis:title="<?php print $node->title; ?>" title="Digg">
              <img src="<?php print $theme_path; ?>/images/diggIcon.png" width="64" height="64" border="0" alt="Digg" /></a>
            <a class="addthis_button" addthis:url="<?php print $node_url; ?>" addthis:title="<?php print $node->title; ?>">
              <img src="<?php print $theme_path; ?>/images/socialIconShareMore.png" width="64" height="64" border="0" alt="More..." /></a>
          </div>
        </div><script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js"></script>
        <a class="emaillink" href="mailto:<?php print $site_mail; ?>" title="<?php print t('Send us Email'); ?>"></a>
      </div>

      <div class="linehomewrap">
        <div class="prelinehome"></div>

        <div class="linehome"></div>

        <div class="afterlinehome"></div>
      </div>
    </div>

    <div class="projectdescription">
      <h1>Networking</h1>

      <div class="posttext">
        <?php if (!empty($image)): ?>
          <?php print $image; ?>
        <?php endif; ?>

        <div class="sentry">
          <div>
            <?php
            print render($content['body']);
            ?>  
          </div>
        </div>
      </div>

      <div class="bottomborder"></div>
    </div>
  </div>

  <!-- // node full -->
<?php endif; ?>

</div>
<?php print render($content['comments']); ?>