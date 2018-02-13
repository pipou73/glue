<?php

declare(strict_types=1);

namespace AppBundle\Entity;

use Rewind\Bundle\MediaBundle\Model\ImagesAwareInterface;
use Rewind\Bundle\MediaBundle\Traits\ImagesAwareTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Rewind\Bundle\AdminBundle\Traits\SortableTrait;
use Sylius\Component\Resource\Model\ResourceInterface;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Sylius\Component\Resource\Model\TranslatableInterface;
use Sylius\Component\Resource\Model\TranslatableTrait;

/**
 * Author.
 *
 * @author pvesin
 *
 * @ORM\Table(name="app_author")
 * @ORM\Entity
 * @Gedmo\Loggable
 */
class Author implements ResourceInterface, TranslatableInterface, ImagesAwareInterface
{
    use TranslatableTrait {
        __construct as private initializeTranslatableCollection;
    }
    use SortableTrait;
    use ImagesAwareTrait {
        __construct as private initializeImagesCollection;
    }

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="AuthorImage", mappedBy="owner", orphanRemoval=true, cascade={"persist"})
     */
    protected $images;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="code", type="string")
     */
    protected $code;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $enabled;

    /**
     * Author constructor.
     */
    public function __construct()
    {
        $this->images       = new ArrayCollection();
        $this->translations = new ArrayCollection();
    }

    /**
     * @return Integer
     */
    public function getId(): ?Int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getCode(): ?String
    {
        return $this->code;
    }

    /**
     * @param $code
     *
     * @return null|ResourceInterface
     */
    public function setCode($code): ?ResourceInterface
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return AuthorTranslation
     */
    protected function createTranslation(): AuthorTranslation
    {
        return new AuthorTranslation();
    }

    /**
     * @return bool
     */
    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }

    /**
     * @param $enabled
     *
     * @return null|ResourceInterface
     */
    public function setEnabled($enabled): ?ResourceInterface
    {
        $this->enabled = $enabled;

        return $this;
    }


}