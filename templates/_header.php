

<?php echo get_component('default', 'privacyMessage'); ?>

<?php if ($sf_user->isAdministrator() && '' === (string) QubitSetting::getByName('siteBaseUrl')) { ?>
  <div class="site-warning">
    <?php echo link_to(__('Please configure your site base URL'), 'settings/siteInformation', ['rel' => 'home', 'title' => __('Home')]); ?>
  </div>
<?php } ?>

<header id="top-bar" class="top_bar">

  <!-- <?php if (sfConfig::get('app_toggleLogo')) { ?>
    <?php echo link_to(image_tag('logo', ['alt' => 'AtoM']), '@homepage', ['id' => 'logo', 'rel' => 'home']); ?>
  <?php } ?> -->
  <!-- 
  <?php if (sfConfig::get('app_toggleTitle')) { ?>
    <h1 id="site-name">
      <?php echo link_to('<span>'.esc_specialchars(sfConfig::get('app_siteTitle')).'</span>', '@homepage', ['rel' => 'home', 'title' => __('Home')]); ?>
    </h1>
  <?php } ?> -->

  <!-- <nav>
    <?php echo get_component('menu', 'userMenu'); ?>

    <?php echo get_component('menu', 'quickLinksMenu'); ?>

    <?php if (sfConfig::get('app_toggleLanguageMenu')) { ?>
      <?php echo get_component('menu', 'changeLanguageMenu'); ?>
    <?php } ?> 

    <?php echo get_component('menu', 'mainMenu', ['sf_cache_key' => $sf_user->getCulture().$sf_user->getUserID()]); ?>
  </nav> -->

  <div id="search-bar" class="search_bar">
    <div class="bg_gradient"></div>
    <div class="top_header pr-2">
      <div class="menu_header"> 
        <ul class="ul_menu">
          <li><a href="/">Home</a></li>
          <li><a href="contact">contact us</a></li>
          <li class="languages_sub">
            <!-- <a href="#">english</a> -->
              <a>
              Languages
              </a>
              <ul class="style_dropdown">
                <li><a href="?sf_culture=en">English</a></li>
                <li><a href="?sf_culture=km">Khmer</a></li>
                <!-- <li><a class="dropdown-item" href="#">Something else here</a></li> -->
              </ul>
          </li>
          <!-- <li><a href="/user/login">Login</a></li> -->
          
        </ul>
        <div class="blog_search">
          <div class="research me-2">
            <?php echo get_component('search', 'box'); ?>
          </div>
          <div class="li_search">
            <?php echo get_component('menu', 'clipboardMenu'); ?>
          </div>
        </div>
        <nav>
          <div>
            <?php echo get_component('menu', 'userMenu'); ?>
          </div>
          <!-- <?php echo get_component('menu', 'quickLinksMenu'); ?> -->

          <!-- <?php if (sfConfig::get('app_toggleLanguageMenu')) { ?>
            <?php echo get_component('menu', 'changeLanguageMenu'); ?>
          <?php } ?>  -->

          <?php echo get_component('menu', 'mainMenu', ['sf_cache_key' => $sf_user->getCulture().$sf_user->getUserID()]); ?>
        </nav>
      </div>
    </div>
  </div>
  
  <!-- <div class="btn_click">
    <?php echo get_component('menu', 'browseMenu', ['sf_cache_key' => $sf_user->getCulture().$sf_user->getUserID()]); ?>
  </div> -->
  <?php echo get_component_slot('header'); ?>
</header>



<!-- <?php if (sfConfig::get('app_toggleDescription')) { ?>
  <div id="site-slogan">
    <div class="container">
      <div class="row">
        <div class="span12">
          <span><?php echo esc_specialchars(sfConfig::get('app_siteDescription')); ?></span>
        </div>
      </div>
    </div>
  </div>
<?php } ?> -->
