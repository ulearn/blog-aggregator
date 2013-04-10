<?php
$box_title = t('Project Details');
$field_category = 'field_portfolio_category';
$field_tags = 'field_tags';
$field_image = 'field_portfolio_image';
if ($node->type == 'blog') {
  $field_category = 'field_blog_category';
  $box_title = t('Post Details');
  $field_image = 'field_image';
}
$category = mistix_format_comma_field($field_category, $node);
$tag = mistix_format_comma_field($field_tags, $node);
$node_url = url('node/' . $node->nid);
$theme_path = base_path() . drupal_get_path('theme', 'mistix');
$site_mail = variable_get('site_mail', 'toan@tabvn.com');
$teaser = views_trim_text(array('max_length' => 600, 'html' => TRUE), $node->body[LANGUAGE_NONE][0]['safe_value']);

$image = mistix_format_image_field($field_image, $node);
?>
<div id="mainwrap">
  <div id="main" class="clearfix">
    <div class="pad"></div>
    <div class="content fullwidth">


      <div class="blogpost">
        <div class = "homesingleleft">	
          <h1><?php print $box_title ?></h1>	
          <div class="linehomewrap"><div class="prelinehome"></div><div class="linehome"></div><div class="afterlinehome"></div></div>
          <div class="datecomment">
            <p>
              <?php if ($node->type == 'portfolio' && isset($node->field_portfolio_link[LANGUAGE_NONE][0]['url'])): ?>
                <span class="link"><?php print l('Live preview', $node->field_portfolio_link[LANGUAGE_NONE][0]['url']); ?></span>
                <br />
              <?php endif; ?>  
              <span class="author"><?php print theme('username', array('account' => $node)); ?></span><br>
              <span class="posted-date"><?php print format_date($node->created, 'custom', 'M d, Y'); ?></span><br>
              <span class="postedin"><?php print $category; ?></span>	
              <?php if ($node->type == 'portfolio'): ?>

                <br />
                <?php if (!empty($node->field_project_author[LANGUAGE_NONE][0]['value'])): ?>
                  <span class="author port"><?php print $node->field_project_author[LANGUAGE_NONE][0]['value']; ?></span>
                  <br />
                <?php endif; ?>


                <?php if (!empty($node->field_project_status[LANGUAGE_NONE][0]['value'])): ?>
                  <span class="status port"><?php print $node->field_project_status[LANGUAGE_NONE][0]['value']; ?></span>
                <?php endif; ?>

              <?php endif; ?>
            </p>
          </div>
          <div class="linehomewrap"><div class="prelinehome"></div><div class="linehome"></div><div class="afterlinehome"></div></div>
          <?php if (!empty($tag)): ?>
            <div class="tags"><span><?php print $tag; ?></span></div>
          <?php endif; ?>

          <div class="linehomewrap"><div class="prelinehome"></div><div class="linehome"></div><div class="afterlinehome"></div></div>			
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
            </div><script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4f3049381724ac5b"></script>
            <a class="emaillink" href="mailto:<?php print $site_mail; ?>" title="<?php print t('Send us Email'); ?>"></a>
          </div>
          <div class="linehomewrap"><div class="prelinehome"></div><div class="linehome"></div><div class="afterlinehome"></div></div>				
        </div>
        <div class="homesingleright">

          <div class="posttext postcontent">	
            <h1><?php print l('node/' . $node->title, 'node/' . $node->nid); ?></h1>
            <?php if (!empty($image)): ?>
              <?php print $image; ?>
            <?php endif; ?>
            <div class="sentry">
              <?php print $teaser; ?>
              <a href="<?php print $node_url; ?>" class="more-link"><?php print t('Read more'); ?></a>
            </div>
          </div>		

        </div>						
      </div>	

    </div>		
  </div>
</div>


<script type="text/javascript" charset="utf-8">
  jQuery(document).ready(function(){
    jQuery("a[rel^='lightbox']").prettyPhoto({theme:'light_rounded',overlay_gallery: false,show_title: false});
  });

</script>


