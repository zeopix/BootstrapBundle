<?php

namespace Iga\BootstrapBundle\Twig;

use Symfony\Bundle\FrameworkBundle\Templating\Engine;
use Symfony\Component\DependencyInjection\ContainerInterface;

class BootstrapExtension extends \Twig_Extension {
  const BUNDLE_PUBLIC_PATH = 'bundles/igabootstrap';
  const LESS_LIBRARY_PATH = "/lib/less/less-1.1.3.min.js";
  const BOOTSTRAP_LIBRARY_PATH = "/lib/bootstrap/bootstrap-1.1.0.min.css";
  protected $container;

  public function __construct (ContainerInterface $container) {
    $this->container = $container;
  }

  public function getName () {
    return 'twitter_bootstrap';
  }

  public function getFunctions () {
    return array (
        // Initialize
        'initializeBootstrap' => new \Twig_Function_Method ($this, 'renderInitialize', array ('is_safe' => array ('html'))),
        // Navigation
        'fixedTopBar' => new \Twig_Function_Method ($this, 'renderFixedTopBar', array ('is_safe' => array ('html'))),
        'endFixedTopBar' => new \Twig_Function_Method ($this, 'renderEndFixedTopBar', array ('is_safe' => array ('html'))),
    );
  }

  public function renderInitialize () {
    $html = '<!--[if lt IE 9]>
              <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
             <![endif]-->
             <script type="text/javascript" src="' . $this->renderAsset (self::LESS_LIBRARY_PATH) . '"></script>
             <link type="text/css" rel="stylesheet" href="' . $this->renderAsset (self::BOOTSTRAP_LIBRARY_PATH) . '" media="all" />';

    return $html;
  }

  //FIXME I know I should us e the twig asset function but I don't know
  //      How to access it from here.
  public function renderAsset ($assetName) {
    static $bundlePath = self::BUNDLE_PUBLIC_PATH;
    $assetsHelper = $this->container->get ('templating.helper.assets');
    
    return $assetsHelper->getUrl($bundlePath . $assetName);
  }

  public function renderFixedTopBar (array $attributes = array ()) {
    $html = '<div' . $this->renderAttributes ($attributes,
                                              array ('class' => 'topbar')) . '>
                      <div class="fill">
                        <div class="container">';

    return $html;
  }

  public function renderEndFixedTopBar () {
    $html = '     </div>
                </div>
              </div>';

    return $html;
  }

  public function renderAttributes (array $attributes,
                                    array $defaults = array ()) {
    $html = '';
    $attributes += $defaults;

    foreach ($attributes as $name => $value) {
      $html .= ' ' . $this->escapeAttributeName ($name) . '="' . $this->escapeAttributeValue ($value) . '"';
    }

    return $html;
  }

  public function escapeAttributeName ($name) {
    //FIXME
    return $name;
  }

  public function escapeAttributeValue ($value) {
    //FIXME
    return $value;
  }

}