<?php

namespace Syw\Front\MainBundle\Controller;

use FOS\UserBundle\Model\UserInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Syw\Front\MainBundle\Entity\Machines;
use Syw\Front\MainBundle\Manager\MachinesManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Syw\Front\MainBundle\Form\Type\MachineFormType;

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

    private $oldCountry;
    private $oldClass;
    private $oldDist;
    private $oldArch;
    private $oldKernel;
    private $oldCpu;


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

        $this->oldCountry = $machine->getCountry();
        $this->oldClass = $machine->getClass();
        $this->oldDist = $machine->getDistribution();
        $this->oldArch = $machine->getArchitecture();
        $this->oldKernel = $machine->getKernel();
        $this->oldCpu = $machine->getCpu();

        $form = $this->createForm(
            new MachineFormType(
                $machine
            ),
            $machine
        );

        $form->handleRequest($request);

        if ($request->getMethod() == 'POST') {
            $formData = $request->request->all();

            $field = array('Countries', 'country', $this->oldCountry);
            if (true === isset($formData['machine'][$field[1]]) && trim($formData['machine'][$field[1]]) != "") {
                $val = $formData['machine'][$field[1]];
                $id   = preg_replace("`.*\(ID:([0-9]+)\)$`", "$1", $val);
                if (true === isset($id) && true === is_numeric($id)) {
                    $obj = $this->getDoctrine()
                        ->getRepository('SywFrontMainBundle:'.$field[0])
                        ->findOneBy(array('id' => $id));
                    $machine->setCountry($obj);
                } else {
                    $machine->setCountry($field[2]);
                }
            }

            $field = array('Classes', 'class', $this->oldClass);
            if (true === isset($formData['machine'][$field[1]]) && trim($formData['machine'][$field[1]]) != "") {
                $val = $formData['machine'][$field[1]];
                $id   = preg_replace("`.*\(ID:([0-9]+)\)$`", "$1", $val);
                if (true === isset($id) && true === is_numeric($id)) {
                    $obj = $this->getDoctrine()
                        ->getRepository('SywFrontMainBundle:'.$field[0])
                        ->findOneBy(array('id' => $id));
                    $machine->setClass($obj);
                } else {
                    $machine->setClass($field[2]);
                }
            }

            $field = array('Distributions', 'distribution', $this->oldDist);
            if (true === isset($formData['machine'][$field[1]]) && trim($formData['machine'][$field[1]]) != "") {
                $val = $formData['machine'][$field[1]];
                $id   = preg_replace("`.*\(ID:([0-9]+)\)$`", "$1", $val);
                if (true === isset($id) && true === is_numeric($id)) {
                    $obj = $this->getDoctrine()
                        ->getRepository('SywFrontMainBundle:'.$field[0])
                        ->findOneBy(array('id' => $id));
                    $machine->setDistribution($obj);
                } else {
                    $machine->setDistribution($field[2]);
                }
            }

            $field = array('Architectures', 'architecture', $this->oldArch);
            if (true === isset($formData['machine'][$field[1]]) && trim($formData['machine'][$field[1]]) != "") {
                $val = $formData['machine'][$field[1]];
                $id   = preg_replace("`.*\(ID:([0-9]+)\)$`", "$1", $val);
                if (true === isset($id) && true === is_numeric($id)) {
                    $obj = $this->getDoctrine()
                        ->getRepository('SywFrontMainBundle:'.$field[0])
                        ->findOneBy(array('id' => $id));
                    $machine->setArchitecture($obj);
                } else {
                    $machine->setArchitecture($field[2]);
                }
            }

            $field = array('Kernels', 'kernel', $this->oldKernel);
            if (true === isset($formData['machine'][$field[1]]) && trim($formData['machine'][$field[1]]) != "") {
                $val = $formData['machine'][$field[1]];
                $id   = preg_replace("`.*\(ID:([0-9]+)\)$`", "$1", $val);
                if (true === isset($id) && true === is_numeric($id)) {
                    $obj = $this->getDoctrine()
                        ->getRepository('SywFrontMainBundle:'.$field[0])
                        ->findOneBy(array('id' => $id));
                    $machine->setKernel($obj);
                } else {
                    $machine->setKernel($field[2]);
                }
            }

            $field = array('Cpus', 'cpu', $this->oldCpu);
            if (true === isset($formData['machine'][$field[1]]) && trim($formData['machine'][$field[1]]) != "") {
                $val = $formData['machine'][$field[1]];
                $id   = preg_replace("`.*\(ID:([0-9]+)\)$`", "$1", $val);
                if (true === isset($id) && true === is_numeric($id)) {
                    $obj = $this->getDoctrine()
                        ->getRepository('SywFrontMainBundle:'.$field[0])
                        ->findOneBy(array('id' => $id));
                    $machine->setCpu($obj);
                } else {
                    $machine->setCpu($field[2]);
                }
            }

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
