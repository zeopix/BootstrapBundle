<?php
namespace Iga\BootstrapBundle\Twig\Extension;

use Symfony\Component\DependencyInjection\ContainerInterface;

class BootstrapExtension extends \Twig_Extension
{
  	const BUNDLE_PUBLIC_PATH = 'bundles/igabootstrap';
  	const LESS_LIBRARY_PATH = "/lib/less/less-1.1.3.min.js";
  	const BOOTSTRAP_LIBRARY_PATH = "/lib/bootstrap/bootstrap-1.1.0.min.css";
    protected $container;

    /**
     * Constructor.
     *
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * Returns a list of global functions to add to the existing list.
     *
     * @return array An array of global functions
     */
    public function getFunctions()
    {
        return array(
       		'bootstrap_initialize' => new \Twig_Function_Method ($this, 'renderInitialize', array ('is_safe' => array ('html'))),
            'bootstrap_test' => new \Twig_Function_Method($this, 'renderTest', array('is_safe' => array('html'))),
            'bootstrap_toolbar' => new \Twig_Function_Method($this, 'renderToolbar', array('is_safe' => array('html'))),
        );
    }
    
	public function getTests()
    {
        return array(
            'array'       => new \Twig_Test_Method($this, 'testIsArray'),
        );
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'bootstrap';
    }
    
    /* TESTS */
    public function testIsArray($data){
    	return is_array($data);
    }
    
    
    /* FUNCTIONS */
    
    
    //TODO: use twig native helper for assets
    
  	public function renderAsset ($assetName) {
    	static $bundlePath = self::BUNDLE_PUBLIC_PATH;
    	$assetsHelper = $this->container->get ('templating.helper.assets');
    
	    return $assetsHelper->getUrl($bundlePath . $assetName);
  	}
  
 
 	public function renderInitialize () {
    	$html = '<!--[if lt IE 9]>
        	     <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
            	 <![endif]-->
             	 <script type="text/javascript" src="' . $this->renderAsset(self::LESS_LIBRARY_PATH) . '"></script>
             	 <link type="text/css" rel="stylesheet" href="' . $this->renderAsset(self::BOOTSTRAP_LIBRARY_PATH) . '" media="all" />';
    	return $html;
  	}
    
    

    public function renderToolbar($parameters = array(), $name = null)
    {
        return $this->container->get('iga_bootstrap.helper')->toolbar($parameters, 'IgaBootstrapBundle::toolbar.html.twig');
    }
}