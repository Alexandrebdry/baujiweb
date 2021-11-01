<?php

namespace App\Entity;

use App\Repository\StructureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StructureRepository::class)
 */
class Structure
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="structure")
     */
    private $membre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    public function __construct()
    {
        $this->membre = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getMembre(): Collection
    {
        return $this->membre;
    }

    public function addMembre(User $membre): self
    {
        if (!$this->membre->contains($membre)) {
            $this->membre[] = $membre;
            $membre->setStructure($this);
        }

        return $this;
    }

    public function removeMembre(User $membre): self
    {
        if ($this->membre->removeElement($membre)) {
            // set the owning side to null (unless already changed)
            if ($membre->getStructure() === $this) {
                $membre->setStructure(null);
            }
        }

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }
}
