<?php

namespace Iga\BootstrapBundle\Templating\Helper;

use Symfony\Component\Templating\Helper\Helper;
use Symfony\Component\Templating\EngineInterface;

class BootstrapHelper extends Helper
{
    protected $templating;

    public function __construct(EngineInterface $templating)
    {
        $this->templating  = $templating;
    }
    
    public function test($parameters = array(), $name = null)
    {
        $name = $name ?: 'IgaBootstrapBundle::test.html.twig';
        return $this->templating->render($name, $parameters + array(
        ));
    }


    /**
     * @codeCoverageIgnore
     */
    public function getName()
    {
        return 'bootstrap';
    }
}