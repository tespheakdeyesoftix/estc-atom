<?php

class arESTCPluginConfiguration extends sfPluginConfiguration
{
  // Summary and version. AtoM recognizes any plugin as a theme as long as
  // the $summary string contains the word "theme" in it (case-insensitive).
  public static
    $summary = 'Theme plugin, extension of arDominionPlugin.',
    $version = '0.0.1';

  public function contextLoadFactories(sfEvent $event)
  {
  // Here we are including the CSS stylesheet build in our pages.
    $context = $event->getSubject();
    $context->response->addStylesheet('/plugins/arESTCPlugin/css/min.css', 'last', array('media' => 'all'));
    $context->response->addStylesheet('/plugins/arESTCPlugin/css/style_min.css', 'last', array('media' => 'all'));
    $context->response->addStylesheet('/plugins/arESTCPlugin/css/style_min2.css', 'last', array('media' => 'all'));
    $context->response->addStylesheet('/plugins/arESTCPlugin/css/bootstrap@5.3.0bootstrap.min.css', 'last', array('media' => 'all'));
    $context->response->addStylesheet('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/fontawesome.min.css', 'last', array('media' => 'all'));
    $context->response->addStylesheet('https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css', 'last', array('media' => 'all'));
    
    $context->response->addJavascript('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/fontawesome.min.js', 'last', array('media' => 'all'));
    $context->response->addJavascript('/plugins/arESTCPlugin/js/Bootstrap_v5.3.0_min.js', 'last', array('media' => 'all'));
    $context->response->addJavascript('https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', 'last', array('media' => 'all'));
    $context->response->addJavascript('https://www.google.com/recaptcha/api.js', 'last', array('media' => 'all'));
  }
   public function initialize()
  {
    // Run the class method contextLoadFactories defined above once Symfony
    // is done loading the internal framework factories.
    $this->dispatcher->connect('context.load_factories', array($this, 'contextLoadFactories'));

    // This allows us to override the application decorators.
    $decoratorDirs = sfConfig::get('sf_decorator_dirs');
    $decoratorDirs[] = $this->rootDir.'/templates';
    sfConfig::set('sf_decorator_dirs', $decoratorDirs);

    // This allows us to override the contents of the application modules.
    $moduleDirs = sfConfig::get('sf_module_dirs');
    $moduleDirs[$this->rootDir.'/modules'] = false;
    sfConfig::set('sf_module_dirs', $moduleDirs);
  }
}