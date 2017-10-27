<?php

    namespace CitasBundle\Controller;

    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

    /**
     * Class DashboardController
     * @Route(path="/")
     * @package CitasBundle\Controller
     */
    class DashboardController extends Controller {

        /**
         * @Route(path="/", name="dashboard")
         * @Template("CitasBundle:Dashboard:index.html.twig")
         */
        public function indexAction() {

        }
    }
