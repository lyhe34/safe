<?php

namespace App\Entity;

use App\Repository\DirectoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DirectoryRepository::class)]
class Directory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $path = null;

    #[ORM\ManyToOne(inversedBy: 'directories')]
    private ?User $owner = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'directories')]
    private ?self $directory = null;

    #[ORM\OneToMany(mappedBy: 'directory', targetEntity: self::class, orphanRemoval: true)]
    private Collection $directories;

    #[ORM\OneToMany(mappedBy: 'directory', targetEntity: File::class, orphanRemoval: true)]
    private Collection $files;

    public function __construct()
    {
        $this->directories = new ArrayCollection();
        $this->files = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(string $path): static
    {
        $this->path = $path;

        return $this;
    }

    public function getOwner(): ?User
    {
        return $this->owner;
    }

    public function setOwner(?User $owner): static
    {
        $this->owner = $owner;

        return $this;
    }

    public function getDirectory(): ?self
    {
        return $this->directory;
    }

    public function setDirectory(?self $directory): static
    {
        $this->directory = $directory;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getDirectories(): Collection
    {
        return $this->directories;
    }

    public function addDirectory(self $directory): static
    {
        if (!$this->directories->contains($directory)) {
            $this->directories->add($directory);
            $directory->setDirectory($this);
        }

        return $this;
    }

    public function removeDirectory(self $directory): static
    {
        if ($this->directories->removeElement($directory)) {
            // set the owning side to null (unless already changed)
            if ($directory->getDirectory() === $this) {
                $directory->setDirectory(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, File>
     */
    public function getFiles(): Collection
    {
        return $this->files;
    }

    public function addFile(File $file): static
    {
        if (!$this->files->contains($file)) {
            $this->files->add($file);
            $file->setDirectory($this);
        }

        return $this;
    }

    public function removeFile(File $file): static
    {
        if ($this->files->removeElement($file)) {
            // set the owning side to null (unless already changed)
            if ($file->getDirectory() === $this) {
                $file->setDirectory(null);
            }
        }

        return $this;
    }
}
