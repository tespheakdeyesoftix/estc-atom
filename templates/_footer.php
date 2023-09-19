<footer> 
<section class="footer bg_color">
  <div class="container">
    <div class="row pb-4">
      <div class="col-12 pb-1">
        <div class="row pt-4">
          <div class="image_footer col-12 p-0 mb-2 mb-sm-0">
            <img class="fit_img" src="/plugins/arESTCPlugin/images/logo.png" alt="logo">
          </div>
        </div>
      </div>
      <div class="col-12">
        <!-- <img src="/plugins/arESTCPlugin/images/Angkor_Archives_5.jpg" alt="logo"> -->
        <div class="ft_text text-center">
          <p>©Copyright 2023, All reserved by APSARA Nacional Authority</p>
          <!-- <p>Te: 012 357 724, 012 333 008</p> -->
          <p>Email: info@angkorarchive.info</p>
          <p>Supported by FIDA-ICA (Fund for the International of archives-International council on archives)</p>
        </div>
      </div>
    </div>
  </div>
</section>
  <?php if (QubitAcl::check('userInterface', 'translate')) { ?>
    <?php echo get_component('sfTranslatePlugin', 'translate'); ?>
  <?php } ?>
  <?php echo get_component_slot('footer'); ?>
  <div id="print-date">
    <?php echo __('Printed: %d%', ['%d%' => date('Y-m-d')]); ?>
  </div>
</footer>
<?php $gaKey = sfConfig::get('app_google_analytics_api_key', ''); ?>
<?php if (!empty($gaKey)) { ?>
  <script>
    window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
    ga('create', '<?php echo $gaKey; ?>', 'auto');
    <?php include_slot('google_analytics'); ?>
    ga('send', 'pageview');
  </script>
  <script async src='https://www.google-analytics.com/analytics.js'></script>
<?php } ?>

