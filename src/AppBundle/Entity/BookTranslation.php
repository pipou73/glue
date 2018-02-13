<?php

declare(strict_types=1);

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Sylius\Component\Resource\Model\AbstractTranslation;
use Sylius\Component\Resource\Model\ResourceInterface;

/**
 *
 * @ORM\Table(name="app_book_translation")
 * @ORM\Entity
 */
class BookTranslation extends AbstractTranslation implements ResourceInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="name", type="string")
     */
    protected $name;

    /**
     * @ORM\Column(name="description", type="string")
     */
    protected $description;

    /**
     * @return string
     */
    public function __toString(): ?string
    {
        return $this->getName();
    }

    /**
     * {@inheritdoc}
     */
    public function getId(): integer
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function setName($name): ?ResourceInterface
    {
        $this->name = $name;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription():? string
    {
        return $this->description;
    }

    /**
     * {@inheritdoc}
     */
    public function setDescription($description): ?ResourceInterface
    {
        $this->description = $description;

        return $this;
    }
}
