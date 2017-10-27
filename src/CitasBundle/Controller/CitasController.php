<?php

    namespace CitasBundle\Controller;

    use CitasBundle\Entity\Citas;
    use CitasBundle\Form\CitasType;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
    use Symfony\Component\HttpFoundation\Request;

    /**
     * Class CitasController
     * @Route(path="/citas")
     * @package CitasBundle\Controller
     */
    class CitasController extends Controller {

        /**
         * @Route(path="/", name="citas_search")
         * @Template("CitasBundle:Citas:search.html.twig")
         */
        public function searchAction() {
            
        }

        /**
         * @Route(path="/action/search", name="citas_search_ajax")
         * @param Request $request
         * @return \Symfony\Component\HttpFoundation\Response
         */
        public function searchListAction(Request $request) {

            $em = $this->getDoctrine()->getManager();
            if(empty($request->request->get('name')) == false) {
                $result = $em->getRepository('CitasBundle:Citas')->findBySearchAjaxName($request->request->get('name'));
            }
            elseif(empty($request->request->get('document')) == false) {
                $result = $em->getRepository('CitasBundle:Citas')->findBySearchAjaxDocument($request->request->get('document'));
            }
            elseif(empty($request->request->get('date')) == false) {
                $result = $em->getRepository('CitasBundle:Citas')->findBySearchAjaxDate($request->request->get('date'));
            }
            else {
                $result['result'] = [];
            }

            if(isset($result['query'])) {
                $log = $this->get('citas.log');
                $log->setLog($result['query']);
            }
            return $this->render('CitasBundle:Citas:search_list.html.twig', ['request' => $result['result']]);
        }

        /**
         * @Route(path="/new", name="citas_new")
         * @Template("CitasBundle:Citas:new.html.twig")
         * @param Request $request
         */
        public function newAction(Request $request) {

            $cita = new Citas();
            $form = $this->getCreateFormNew($cita);
            $form->handleRequest($request);

            if($form->isSubmitted() AND $form->isValid()) {

            }
        }

        /**
         * @param Citas $citas
         * @return \Symfony\Component\Form\Form
         */
        private function getCreateFormNew(Citas $citas) {

            return $this->createForm(CitasType::class, $citas, [
                'action' => $this->generateUrl('citas_new'),
                'method' => 'post'
            ]);
        }
    }
