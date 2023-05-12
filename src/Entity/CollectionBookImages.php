<?php

namespace App\Entity;

use App\Repository\CollectionBookImagesRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: CollectionBookImagesRepository::class)]
#[Vich\Uploadable]
class CollectionBookImages
{
    use TimestampableEntity;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $path = null;

    #[ORM\Column]
    private ?int $position = null;

    #[ORM\ManyToOne(inversedBy: 'collectionBookImages')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?CollectionBook $collectionImagesBook = null;

    //NOTE: This is not a mapped field of entity metadata, just a simple property.
    #[Vich\UploadableField(mapping: 'collectionImages', fileNameProperty: 'path')]
    private ?File $pathFile = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(string $path): self
    {
        $this->path = $path;

        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getCollectionBook(): ?CollectionBook
    {
        return $this->collectionImagesBook;
    }

    public function setCollectionBook(CollectionBook $collectionBook): self
    {
        $this->collectionImagesBook = $collectionBook;

        return $this;
    }


    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $pathFile
     */
    public function setPathFile(?File $pathFile = null): void
    {
        $this->pathFile = $pathFile;

        if (null !== $pathFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }
    public function getPathFile(): ?File
    {
        return $this->pathFile;
    } 
}
