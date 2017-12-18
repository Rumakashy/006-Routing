<?php

namespace WCS\CoavBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use WCS\CoavBundle\Entity\PlaneModel;
use WCS\CoavBundle\Entity\User;

class FlightType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nbFreeSeats')->add('seatPrice')->add('takeOffTime')->add('publicationDate')->add('description')->add('wasDone')->add('departure')->add('arrival')
            ->add('pilot', EntityType::class, [
            'class'=> User::class,
            'choice_label' => 'fullName',])

            ->add('plane', EntityType::class, [
                        'class'=> PlaneModel::class,
                        'choice_label' => 'fullName',]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WCS\CoavBundle\Entity\Flight'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'wcs_coavbundle_flight';
    }


}
