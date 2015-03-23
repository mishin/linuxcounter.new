<?php

namespace Syw\Front\MainBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Syw\Front\MainBundle\Entity\User;
use Syw\Front\MainBundle\Entity\UserProfile;
use Syw\Front\MainBundle\Entity\Cities;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\FilterUserResponseEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class UserProfileFormType
 *
 * @author Alexander Löhner <alex.loehner@linux.com>
 */
class UserProfileFormType extends AbstractType
{
    private $user;
    private $userProfile;

    public function __construct($userProfile)
    {
        $this->userProfile = $userProfile;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $city = $this->userProfile->getCity();

        $builder
            ->add('city', 'shtumi_ajax_autocomplete', array(
                'entity_alias'=>'cities',
                'required' => false,
                'label' => 'City'
            ))

            ->add('firstname', 'text', array('label' => 'Firstname', 'required' => false))
            ->add('lastname', 'text', array('label' => 'Lastname', 'required' => false))

            ->add('birthday', 'birthday', array('label' => 'Birthday', 'required' => false))
            ->add('birthplace', 'text', array('label' => 'Birthplace', 'required' => false))

            ->add('homepage', 'text', array('label' => 'Homepage', 'required' => false))
            ->add('icq', 'text', array('label' => 'ICQ', 'required' => false))
            ->add('skype', 'text', array('label' => 'Skype', 'required' => false))
            ->add('jabber', 'text', array('label' => 'Jabber', 'required' => false))
            ->add('msn', 'text', array('label' => 'MSN', 'required' => false))
            ->add('facebook', 'text', array('label' => 'Facebook page', 'required' => false))
            ->add('google', 'text', array('label' => 'Google+ Page', 'required' => false))
            ->add('twitter', 'text', array('label' => 'Twitter', 'required' => false))
            ->add('identica', 'text', array('label' => 'Identi.ca', 'required' => false))



            ->add('save', 'submit');
    }

    public function getName()
    {
        return 'userprofile';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Syw\Front\MainBundle\Entity\UserProfile',
        ));
    }
}
