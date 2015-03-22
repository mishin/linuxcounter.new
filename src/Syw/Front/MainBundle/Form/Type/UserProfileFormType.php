<?php

namespace Syw\Front\MainBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class UserProfileFormType
 *
 * @author Alexander Löhner <alex.loehner@linux.com>
 */
class UserProfileFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('city', 'shtumi_ajax_autocomplete', array('entity_alias'=>'cities'))
            ->add('firstname', 'text')
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
