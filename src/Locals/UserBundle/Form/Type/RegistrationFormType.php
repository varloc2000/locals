<?php

namespace Locals\UserBundle\Form\Type;

use Symfony\Component\Form\CallbackValidator;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormError;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends BaseType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder
            ->add('username', 'text', array(
                'required' => false,
                'label' => 'user_registration_username_label',
                'attr' => array(
                    'placeholder' => 'user_register_username_placeholder'
                ),
            ))
            ->add('email', 'email', array(
                'required' => false, 
                'label' => 'user_registration_email_label',
                'attr' => array(
                    'placeholder' => 'user_register_email_placeholder'
                ),
            ))
            ->add('plainPassword', 'repeated', array(
                'required' => false,
                'type' => 'password',
                'invalid_message' => 'user_register_password_message_match',
                'first_name' => 'password',
                'second_name' => 'confirmPassword',
                'first_options'  => array(
                    'label' => 'user_registration_password_label',
                    'attr' => array(
                        'placeholder' => 'user_register_password_placeholder'
                    ),
                ),
                'second_options' => array(
                    'label' => 'user_registration_password_confirm_label',
                    'attr' => array(
                        'placeholder' => 'user_register_confirm_password_placeholder'
                    ),
                ),
                
            ))
            ->add('license', 'checkbox', array(
                'required' => false,
                'mapped' => false,
            ))
            ->addValidator(new CallbackValidator(function(FormInterface $form) {
                if (false === $form['license']->getData()) {
                    $form['license']->addError(new FormError('rules_for_loosers_but_agree_with_it'));
                }
            }))
        ;
    }

    /**
     * @param \Symfony\Component\OptionsResolver\OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Locals\UserBundle\Entity\User',
            'intention' => 'registration',
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'locals_user_registration';
    }
}
