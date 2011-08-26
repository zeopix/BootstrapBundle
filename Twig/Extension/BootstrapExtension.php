<?php
namespace Iga\BootstrapBundle\Twig\Extension;

use Symfony\Component\DependencyInjection\ContainerInterface;

class BootstrapExtension extends \Twig_Extension
{
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
 	public function renderInitialize () {
        return $this->container->get('iga_bootstrap.helper')->toolbar($parameters, 'IgaBootstrapBundle:Bootstrap:initialize.html.twig');

  	}
    
    

    public function renderToolbar($parameters = array(), $name = null)
    {
        return $this->container->get('iga_bootstrap.helper')->toolbar($parameters, 'IgaBootstrapBundle:Bootstrap:toolbar.html.twig');
    }
}