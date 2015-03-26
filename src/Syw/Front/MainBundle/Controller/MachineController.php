<?php

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
use Syw\Front\MainBundle\Entity\Machines;
use Syw\Front\MainBundle\Manager\MachinesManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Syw\Front\MainBundle\Entity\User;
use Syw\Front\MainBundle\Entity\UserProfile;
use Syw\Front\MainBundle\Entity\Cities;
use Syw\Front\MainBundle\Form\Type\MachineFormType;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class MachineController
 *
 * @category FormType
 * @package  SywFrontMainBundle
 * @author   Alexander Löhner <alex.loehner@linux.com>
 * @license  GPL v3
 * @link     https://github.com/alexloehner/linuxcounter.new
 */
class MachineController extends BaseController
{
    /**
     * @Route("/profile/machine/edit/{machinenumber}")
     *
     * @Template()
     */
    public function editAction(Request $request, $machinenumber)
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }
        $languages = $this->get('doctrine')
            ->getRepository('SywFrontMainBundle:Languages')
            ->findBy(array('active' => 1), array('language' => 'ASC'));
        $machine = $this->get('doctrine')
            ->getRepository('SywFrontMainBundle:Machines')
            ->findOneBy(array('user' => $user, 'id' => $machinenumber));

        $form = $this->createForm(
            new MachineFormType(
                $machine
            ),
            $machine
        );

        $form->handleRequest($request);

        if ($request->getMethod() == 'POST') {
            $formData = $request->request->all();

            $em = $this->getDoctrine()->getManager();
            $em->persist($machine);
            $em->flush();

            $flashBag = $this->get('session')->getFlashBag();
            $flashBag->set('success', 'Machine saved!');

            return $this->redirectToRoute('fos_user_profile_show');
        }

        return $this->render('SywFrontMainBundle:Machine:edit.html.twig', array(
            'form' => $form->createView(),
            'machine' => $machine,
            'languages' => $languages,
            'user' => $user
        ));
    }
}
