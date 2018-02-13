<?php

declare(strict_types=1);

namespace AppBundle\Form\Type;

use Rewind\Bundle\MediaBundle\Form\Type\ImageType;

/**
 * Class AuthorImageType
 *
 * @package AppBundle\Form\Type
 */
class AuthorImageType extends ImageType
{

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix(): string
    {
        return 'app_author_image';
    }
}
