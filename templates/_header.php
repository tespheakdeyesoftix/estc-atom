<h1 style="bacground:red;color:#fff">this top header</h1>
<?php echo get_component('default', 'updateCheck'); ?>

<?php echo get_component('default', 'privacyMessage'); ?>

<?php if ($sf_user->isAdministrator() && '' === (string) QubitSetting::getByName('siteBaseUrl')) { ?>
  <div class="site-warning">
    <?php echo link_to(__('Please configure your site base URL'), 'settings/siteInformation', ['rel' => 'home', 'title' => __('Home')]); ?>
  </div>
<?php } ?>

<header id="top-bar">

  <!-- <?php if (sfConfig::get('app_toggleLogo')) { ?>
    <?php echo link_to(image_tag('logo', ['alt' => 'AtoM']), '@homepage', ['id' => 'logo', 'rel' => 'home']); ?>
  <?php } ?> -->
<!-- 
  <?php if (sfConfig::get('app_toggleTitle')) { ?>
    <h1 id="site-name">
      <?php echo link_to('<span>'.esc_specialchars(sfConfig::get('app_siteTitle')).'</span>', '@homepage', ['rel' => 'home', 'title' => __('Home')]); ?>
    </h1>
  <?php } ?> -->
<!-- 
  <nav>

    <?php echo get_component('menu', 'userMenu'); ?>

    <?php echo get_component('menu', 'quickLinksMenu'); ?>

    <?php if (sfConfig::get('app_toggleLanguageMenu')) { ?>
      <?php echo get_component('menu', 'changeLanguageMenu'); ?>
    <?php } ?>

    <?php echo get_component('menu', 'clipboardMenu'); ?>

    <?php echo get_component('menu', 'mainMenu', ['sf_cache_key' => $sf_user->getCulture().$sf_user->getUserID()]); ?>

  </nav> -->

  <div id="search-bar">

    <?php echo get_component('menu', 'browseMenu', ['sf_cache_key' => $sf_user->getCulture().$sf_user->getUserID()]); ?>

    <!-- <?php echo get_component('search', 'box'); ?> -->

  </div>

  <?php echo get_component_slot('header'); ?>

</header>

<?php if (sfConfig::get('app_toggleDescription')) { ?>
  <div id="site-slogan">
    <div class="container">
      <div class="row">
        <div class="span12">
          <span><?php echo esc_specialchars(sfConfig::get('app_siteDescription')); ?></span>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
