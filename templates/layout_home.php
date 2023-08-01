<!DOCTYPE html>
<html lang="<?php echo $sf_user->getCulture(); ?>" dir="<?php echo sfCultureInfo::getInstance($sf_user->getCulture())->direction; ?>">
  <head>
    <?php echo get_component('default', 'tagManager', ['code' => 'script']); ?>
    <?php include_http_metas(); ?>
    <?php include_metas(); ?>
    <?php include_title(); ?>
    <link rel="shortcut icon" href="<?php echo public_path('favicon.ico'); ?>"/>
    <?php include_stylesheets(); ?>
    <?php include_component_slot('css'); ?>
    <?php if ($sf_context->getConfiguration()->isDebug()) { ?>
      <script type="text/javascript" charset="utf-8">
        less = { env: 'development', optimize: 0, relativeUrls: true };
      </script>
    <?php } ?>
  <?php include_javascripts(); ?> 
  </head>
<stlye>
</stlye>
  <body class="yui-skin-sam p-0 m-0 <?php echo $sf_context->getModuleName(); ?> <?php echo $sf_context->getActionName(); ?>">
    <?php echo get_component('default', 'tagManager', ['code' => 'noscript']); ?>
    <?php echo get_partial('header'); ?>
    <!-- ++++++++++++++++++++++++++++++++++++
    Start slide banner page home success
    ++++++++++++++++++++++++++++++++++++ -->
    <section class="slide_baner">
      <div class="slide_header">
        <div class="autoplay">
          <div>
            <img src="/plugins/arESTCPlugin/images/slide_banner/banner1.png" alt="dd"  width = 100%;>
          </div>
          <div>
            <img src="/plugins/arESTCPlugin/images/slide_banner/banner2.png" alt="dd" width = 100%;>
          </div>
          <div>
            <img src="/plugins/arESTCPlugin/images/slide_banner/banner3.png" alt="dd" width = 100%;>
          </div>
          <div>
            <img src="/plugins/arESTCPlugin/images/slide_banner/banner4.png" alt="dd" width = 100%;>
          </div>
          <div>
            <img src="/plugins/arESTCPlugin/images/slide_banner/banner5.png" alt="dd" width = 100%;>
          </div>
        </div>
        <div class="browse_by">
          <div class="brand_name">
            <a href="/">
              <img src="/plugins/arESTCPlugin/images/Angkor_Archives_6.jpg"  alt="brand">
            </a>
          </div>
          <div class="cover_browse">
            <h3><?php echo __('Browse by'); ?></h3>
            <ul class="">
              <?php $browseMenu = QubitMenu::getById(QubitMenu::BROWSE_ID); ?>
              <?php if ($browseMenu->hasChildren()) { ?>
                <?php foreach ($browseMenu->getChildren() as $item) { ?>
                  <li><a href="<?php echo url_for($item->getPath(['getUrl' => true, 'resolveAlias' => true])); ?>"><?php echo esc_specialchars($item->getLabel(['cultureFallback' => true])); ?></a></li>
                <?php } ?>
              <?php } ?>
            </ul>
          </div>
        </div>
        
        <div class="wrap-intor-on-slide text-center intro title">
          <h1>EFEO Archives</h1>
          <p>
            Inventories | Finding aids 
          </p>
        </div>
         
      </div>                      
    </section> 
    <!-- ++++++++++++++++++++++++++++++++++++
    End slide banner page home success
    ++++++++++++++++++++++++++++++++++++ -->

    <?php include_slot('test_slot'); ?>
    <?php include_slot('pre'); ?>
    <div id="wrapper" class="container" role="main">
    <div id="main-column">
          <!-- <?php include_slot('title'); ?> -->
          <?php include_slot('before-content'); ?>
          <?php if (!include_slot('content')) { ?>
          <div id="content">
            <?php echo $sf_content; ?>
          </div>
          <?php } ?>
          <?php include_slot('after-content'); ?>
        </div>
    </div>
    <?php include_slot('post'); ?>
    
    <?php echo get_partial('footer'); ?>
  <!-- <?php echo get_partial('alerts'); ?> -->
  <script type="text/javascript">
    
    jQuery(document).ready(function($){
        // let  title = $("em")[0].innerHTML
        // if (title =="Untitled"){
        //   $("em")[0].remove()
        // }
        $('.autoplay').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        arrows: true,
        prevArrow: '<div class="slick-prev"><i class="fa fa-angle-double-left"></i></div>',
        nextArrow: '<div class="slick-next"><i class="fa fa-angle-double-right"></i></div>',
        autoplaySpeed: 2000,
      });
    });
  </script>
  </body>
</html>
