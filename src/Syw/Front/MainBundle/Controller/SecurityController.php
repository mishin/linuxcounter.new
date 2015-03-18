<?php

namespace Syw\Front\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Syw\Front\MainBundle\Form\Type\RegistrationType;
use Syw\Front\MainBundle\Form\Model\Registration;

/**
 * Class SecurityController
 *
 * @author Alexander Löhner <alex.loehner@linux.com>
 */
class SecurityController extends Controller
{
    /**
     * @Route("/register")
     * @Method("GET")
     *
     * @Template()
     */
    public function registerAction()
    {
        $registration = new Registration();
        $form = $this->createForm(new RegistrationType(), $registration, array(
            'action' => $this->generateUrl('syw_front_main_security_register'),
        ));

        return $this->render(
            'SywFrontMainBundle:Security:register.html.twig',
            array('form' => $form->createView())
        );
    }

    /**
     * @Route("/register")
     * @Method("POST")
     *
     * @Template()
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(new RegistrationType(), new Registration());

        $form->handleRequest($request);

        if ($form->isValid()) {
            $registration = $form->getData();

            $em->persist($registration->getUser());
            $em->flush();

            return $this->redirectToRoute('syw_front_main_main_index');
        }

        return $this->render(
            'SywFrontMainBundle:Security:register.html.twig',
            array('form' => $form->createView())
        );
    }
}