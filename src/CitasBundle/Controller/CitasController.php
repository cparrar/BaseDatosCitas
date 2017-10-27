<?php

    namespace CitasBundle\Controller;

    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

    class CitasController extends Controller {

        /**
         * @Route(path="/", name="citas_search")
         * @Template("CitasBundle:Base:base.html.twig")
         */
        public function searchAction() {
            
        }
    }
