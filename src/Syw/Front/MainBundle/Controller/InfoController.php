<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Syw\Front\MainBundle\Controller;

use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\FilterUserResponseEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Syw\Front\MainBundle\Entity\User;
use Syw\Front\MainBundle\Entity\UserProfile;
use Syw\Front\MainBundle\Entity\Cities;
use Syw\Front\MainBundle\Form\Type\UserProfileFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

/**
 * Controller managing the user profile
 *
 * @category FormType
 * @package  SywFrontMainBundle
 * @author   Alexander Löhner <alex.loehner@linux.com>
 * @license  GPL v3
 * @link     https://github.com/alexloehner/linuxcounter.new
 */
class InfoController extends BaseController
{
    private $oldcity;

    /**
     * @Route("/info/edit")
     *
     * @Template()
     */
    public function editAction(Request $request)
    {
        $user = $this->getUser();

        if (false === is_object($user) || false === $user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        $locale = $user->getLocale();
        $userProfile = $this->get('doctrine')
            ->getRepository('SywFrontMainBundle:UserProfile')
            ->findOneBy(array('user' => $user));
        $language = $this->get('doctrine')
            ->getRepository('SywFrontMainBundle:Languages')
            ->findOneBy(array('locale' => $locale));
        $languages = $this->get('doctrine')
            ->getRepository('SywFrontMainBundle:Languages')
            ->findBy(array('active' => 1), array('language' => 'ASC'));

        if (false === is_object($userProfile)) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }
        $this->oldcity = $userProfile->getCity();

        $form = $this->createForm(
            new UserProfileFormType(
                $userProfile
            ),
            $userProfile
        );

        $form->handleRequest($request);

        if ($request->getMethod() == 'POST') {
            $formData = $request->request->all();

            $em = $this->getDoctrine()->getManager();

            if (true === isset($formData['userprofile']['city']) && trim($formData['userprofile']['city']) != "") {
                $cityfield = $formData['userprofile']['city'];
                $city_id   = preg_replace("`.*, ID:([0-9]+)\)$`", "$1", $cityfield);
                if (true === isset($city_id) && true === is_numeric($city_id)) {
                    $city = $this->getDoctrine()
                        ->getRepository('SywFrontMainBundle:Cities')
                        ->findOneBy(array('id' => $city_id));
                    $userProfile->setCity($city);
                    $city->setUserNum($city->getUserNum()+1);
                    $em->persist($city);
                    if (true === isset($this->oldcity) && is_object($this->oldcity)) {
                        $this->oldcity->setUserNum($this->oldcity->getUserNum()-1);
                        $em->persist($this->oldcity);
                    }
                } else {
                    $userProfile->setCity($this->oldcity);
                }
            }

            $em->persist($userProfile);
            $em->flush();

            $flashBag = $this->get('session')->getFlashBag();
            $flashBag->set('success', 'User Information saved!');

            return $this->redirectToRoute('fos_user_profile_show');
        }

        $metatitle = $this->get('translator')->trans('General Statistics');
        $title = $metatitle;
        return $this->render('SywFrontMainBundle:Info:edit.html.twig', array(
            'metatitle' => $metatitle,
            'title' => $title,
            'form' => $form->createView(),
            'languages' => $languages,
            'user' => $user
        ));
    }
}
