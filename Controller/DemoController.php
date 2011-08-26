<?php

namespace Iga\BootstrapBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DemoController extends Controller {

  public function indexAction () {
    return $this->render ('IgaBootstrapBundle:Demo:index.html.twig');
  }

}
