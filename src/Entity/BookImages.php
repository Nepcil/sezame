<?php

namespace App\Entity;

use App\Repository\BookImagesRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: BookImagesRepository::class)]
#[Vich\Uploadable]
class BookImages
{
    use TimestampableEntity;

    //NOTE: variables--------------------------------
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $path = null;

    #[ORM\Column(length: 255,  nullable: true)]
    private ?string $imageName = null;

    //NOTE: mapping BookImages->Book------------------------
    #[ORM\ManyToOne(inversedBy: 'bookImages')]
    #[ORM\JoinColumn(nullable: false,  onDelete: 'CASCADE' )]
    private ?Book $book = null;

    #[Vich\UploadableField(mapping: 'bookImages', fileNameProperty: 'path')]
    private ?File $pathFile = null;

    // NOTE: This is not a mapped field of entity metadata, just a simple property.
    #[Vich\UploadableField(mapping: 'bookReads', fileNameProperty: 'imageName')]
    private ?File $bdFile = null;

    //NOTE: Getter & Setter-----------------------------
    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(?string $path): self
    {
        $this->path = $path;

        return $this;
    }

    public function getBook(): ?Book
    {
        return $this->book;
    }

    public function setBook(?Book $book): self
    {
        $this->book = $book;

        return $this;
    }

    public function setImageName(?string $imageName): void
    {
        $this->imageName = $imageName;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    //NOTE: __toString---------------------------------
    public function __toString()
    {
        return $this->getPath();
    }

    //NOTE: Attachement path--------------------
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

    //NOTE: Attachement bdFile--------------------

    public function setBdFile(?File $bdFile = null): void
    {
        $this->bdFile = $bdFile;

        if (null !== $bdFile) {
            
            $this->updatedAt = new \DateTimeImmutable();
        }
    }
    public function getBdFile(): ?File
    {
        return $this->bdFile;
    }
}
