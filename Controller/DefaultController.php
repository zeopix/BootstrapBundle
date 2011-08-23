<?php

namespace Iga\BootstrapBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/dev/bootstrap")
     * @Template()
     */
    public function indexAction()
    {
        return array('name' => "hf");
    }
}
