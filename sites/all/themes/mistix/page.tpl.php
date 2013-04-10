<div id="headerwrap">
  <div id="header">
    <!-- ***************** - LOGO - ***************** -->
    <?php if ($site_name || $site_slogan): ?>
      <div id="logo">
        <?php if ($logo): ?>
          <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home">
            <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
          </a>
        <?php endif; ?>

        <?php if ($site_slogan): ?>
          <div class="logotag">
            <?php print $site_slogan; ?>
          </div>
        <?php endif; ?>
      </div>
    <?php endif; ?>
    <!-- ***************** - NAVIGATION MENU - ***************** -->	

    <?php if ($page['header']): ?>
      <div class="pagenav">
        <div class="menu-header">
          <?php print render($page['header']); ?>
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>
<!-- ***************** - SLIDESHOW - ***************** -->
<?php if ($page['highlighted']): ?>
  <div id="highlighted"><div class="section clearfix">
      <?php print render($page['highlighted']); ?>
    </div></div>
<?php endif; ?>

<?php
$home_class = 'not-homewrap';
if(drupal_is_front_page()){
  $home_class = 'homewrap';
}
?>
<div id="mainwrap" class="<?php print $home_class; ?>">
  <div id="main" class="clearfix">
    <?php print $messages; ?>    
    <div id="content"><div class="section">
        
        <?php if (!empty($tabs)): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
        <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
        <div class="clear"></div>
        <?php if ($title): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>
        <?php print render($page['content']); ?>
        <?php print $feed_icons; ?>
      </div>
    </div>

    <?php if ($page['sidebar_second']): ?>
      <div id="sidebar-second" class="sidebar"><div class="section">
          <?php print render($page['sidebar_second']); ?>
        </div></div>
    <?php endif; ?>

    <div class="clear"></div>
  </div>
</div>
<!-- ***************** - START OF FOOTER - ***************** -->
<div id="footer">
  <div class="totop">
    <div class="gototop">
      <div class="arrowgototop"></div>
    </div>
  </div>

  <div class="fshadow"></div>
  <?php if ($page['footer_firstcolumn'] || $page['footer_secondcolumn'] || $page['footer_thirdcolumn'] || $page['footer_fourthcolumn']): ?>
    <div id="footerinside">
      <div class="footer_widget">

        <?php if ($page['footer_firstcolumn']): ?>
          <div class="footer_widget1">
            <?php print render($page['footer_firstcolumn']); ?>
          </div>
        <?php endif; ?>




        <?php if ($page['footer_secondcolumn']): ?>
          <div class="footer_widget2">
            <?php print render($page['footer_secondcolumn']); ?>

          </div>
        <?php endif; ?>


        <div class="footer_widget3">
          <?php print render($page['footer_thirdcolumn']); ?>

        </div>

        <?php if ($page['footer_fourthcolumn']): ?>
          <div class="footer_widget4 last">
            <?php print render($page['footer_fourthcolumn']); ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  <?php endif; ?>

  <div id="footerbwrap">
    <div id="footerb">
      <?php print render($page['footer']); ?>
    </div>
  </div>
</div>

