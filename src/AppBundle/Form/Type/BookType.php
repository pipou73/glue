<?php

declare(strict_types=1);

namespace AppBundle\Form\Type;

use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Sylius\Bundle\ResourceBundle\Form\Type\ResourceTranslationsType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Valid;

/**
 * @author Anna Walasek <anna.walasek@lakion.com>
 */
class BookType extends AbstractResourceType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('translations', ResourceTranslationsType::class, [
                'entry_type' => BookTranslationType::class,
                'label' => 'title',
            ])
            ->add('code', TextType::class)
            ->add('enabled', CheckboxType::class)
            ->add('image', BookImageType::class)
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'app_author';
    }
}
