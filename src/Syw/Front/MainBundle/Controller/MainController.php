<?php

namespace Syw\Front\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Syw\Front\MainBundle\Form\Type\ContactType;

class MainController extends BaseController
{
    /**
     * @Route("/")
     * @Method("GET")
     *
     * @Template()
     */
    public function indexAction()
    {
        $languages = $this->get('doctrine')
            ->getRepository('SywFrontMainBundle:Languages')
            ->findBy(array('active' => 1), array('language' => 'ASC'));

        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            $user = $this->getUser();
        } else {
            $user = null;
        }
        return array('languages' => $languages, 'user' => $user);
    }

    /**
     * @Route("/contact")
     *
     * @Template()
     */
    public function contactAction(Request $request)
    {
        $languages = $this->get('doctrine')
            ->getRepository('SywFrontMainBundle:Languages')
            ->findBy(array('active' => 1), array('language' => 'ASC'));

        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            $user = $this->getUser();
        } else {
            $user = null;
        }

        $form = $this->createForm(new ContactType());

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {
                $message = \Swift_Message::newInstance()
                    ->setSubject($form->get('subject')->getData())
                    ->setFrom($form->get('email')->getData())
                    ->setTo($this->container->getParameter('admin_email'))
                    ->setBody(
                        $this->renderView(
                            'SywFrontMainBundle:Mail:contact.html.twig',
                            array(
                                'ip' => $request->getClientIp(),
                                'name' => $form->get('name')->getData(),
                                'message' => $form->get('message')->getData()
                            )
                        )
                    );

                $this->get('mailer')->send($message);

                $request->getSession()->getFlashBag()->add('success', 'Your email has been sent! Thanks!');

                return $this->redirect($this->generateUrl('syw_front_main_main_contact'));
            }
        }

        return array(
            'form' => $form->createView(),
            'languages' => $languages,
            'user' => $user
        );
    }

    /**
     * @Route("/about")
     * @Method("GET")
     *
     * @Template()
     */
    public function aboutAction()
    {
        $languages = $this->get('doctrine')
            ->getRepository('SywFrontMainBundle:Languages')
            ->findBy(array('active' => 1), array('language' => 'ASC'));

        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            $user = $this->getUser();
        } else {
            $user = null;
        }
        return array('languages' => $languages, 'user' => $user);
    }

    /**
     * @Route("/download")
     * @Method("GET")
     *
     * @Template()
     */
    public function downloadAction()
    {
        $languages = $this->get('doctrine')
            ->getRepository('SywFrontMainBundle:Languages')
            ->findBy(array('active' => 1), array('language' => 'ASC'));

        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            $user = $this->getUser();
        } else {
            $user = null;
        }
        return array('languages' => $languages, 'user' => $user);
    }

    /**
     * @Route("/impressum")
     * @Method("GET")
     *
     * @Template()
     */
    public function impressumAction()
    {
        $languages = $this->get('doctrine')
            ->getRepository('SywFrontMainBundle:Languages')
            ->findBy(array('active' => 1), array('language' => 'ASC'));

        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            $user = $this->getUser();
        } else {
            $user = null;
        }
        return array('languages' => $languages, 'user' => $user);
    }

    /**
     * @Route("/support")
     * @Method("GET")
     *
     * @Template()
     */
    public function supportAction()
    {
        $languages = $this->get('doctrine')
            ->getRepository('SywFrontMainBundle:Languages')
            ->findBy(array('active' => 1), array('language' => 'ASC'));

        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            $user = $this->getUser();
        } else {
            $user = null;
        }
        return array('languages' => $languages, 'user' => $user);
    }

    /**
     * @Route("/sponsor")
     * @Method("GET")
     *
     * @Template()
     */
    public function sponsorAction()
    {
        $languages = $this->get('doctrine')
            ->getRepository('SywFrontMainBundle:Languages')
            ->findBy(array('active' => 1), array('language' => 'ASC'));

        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            $user = $this->getUser();
        } else {
            $user = null;
        }
        return array('languages' => $languages, 'user' => $user);
    }

    /**
     * @Route("/lang")
     * @Method("POST")
     */
    public function langAction(Request $request)
    {
        $locale = $request->request->get('language');
        $userManager = $this->get('fos_user.user_manager');

        $user = $this->getUser();
        if (true === isset($user) && true === is_object($user)) {
            $user->setLocale($locale);
            $userManager->updateUser($user);
        } else {
            $user = null;
        }

        $this->get('session')->set('_locale', $locale);

        return $this->redirect($this->generateUrl('syw_front_main_main_index', array('_locale' => $locale)));

        $languages = $this->get('doctrine')
            ->getRepository('SywFrontMainBundle:Languages')
            ->findBy(array('active' => 1), array('language' => 'ASC'));

        return array('languages' => $languages, 'user' => $user);
    }
}
