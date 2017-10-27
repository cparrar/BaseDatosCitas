<?php

namespace CitasBundle\Form;

use CitasBundle\Entity\Citas;
use CitasBundle\Entity\Medicos;
use CitasBundle\Entity\Pacientes;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class CitasType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('citationAt', DateTimeType::class, [
            'label' => 'Fecha de la Cita',
            'constraints' => [
                new NotBlank()
            ]
        ])
            ->add('doctor', EntityType::class, [
                'label' => 'Medico',
                'class' => 'CitasBundle:Medicos',
                'query_builder' => function (EntityRepository $er) {
                    $qb = $er->createQueryBuilder('m');
                    return $qb->where($qb->expr()->eq('m.isActive', 1))
                        ->addOrderBy('m.lastName', 'ASC')
                        ->addOrderBy('m.name', 'ASC')
                    ;
                },
                'placeholder' => 'Seleccione una Opción',
                'choice_label' => function (Medicos $medicos) {
                    return sprintf('[%s] %s - %s', $medicos->getSpecialty(),$medicos->getLastName(), $medicos->getLastName());
                }
            ])
            ->add('patient', EntityType::class, [
                'label' => 'Paciente',
                'class' => 'CitasBundle:Pacientes',
                'query_builder' => function (EntityRepository $er) {
                    $qb = $er->createQueryBuilder('m');
                    return $qb->where($qb->expr()->eq('m.isActive', 1))
                        ->addOrderBy('m.lastName', 'ASC')
                        ->addOrderBy('m.name', 'ASC')
                        ;
                },
                'placeholder' => 'Seleccione una Opción',
                'choice_label' => function (Pacientes $pacientes) {
                    return sprintf('%s - %s', $pacientes->getLastName(), $pacientes->getLastName());
                }
            ])
            ->add('consulting',EntityType::class, [
                'label' => 'Consultorio',
                'class' => 'CitasBundle:Consultorios',
                'query_builder' => function (EntityRepository $er) {
                    $qb = $er->createQueryBuilder('m');
                    return $qb->where($qb->expr()->eq('m.isActive', 1))
                        ->addOrderBy('m.name', 'ASC')
                        ;
                },
                'placeholder' => 'Seleccione una Opción',
                'choice_label' => 'name'
            ])
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CitasBundle\Entity\Citas'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'citasbundle_citas';
    }


}
