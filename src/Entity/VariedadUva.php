<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\VariedadUvaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: VariedadUvaRepository::class)]
#[ORM\Table(name: "variedad_uva")]
#[ApiResource]
class VariedadUva
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Groups(['vino.read'])]
    #[ORM\Column(length: 150)]
    private ?string $nombre = null;

    #[ORM\ManyToMany(targetEntity: Vino::class, mappedBy: 'variedad_uva')]
    private Collection $vinos;

    public function __construct()
    {
        $this->vinos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * @return Collection<int, Vino>
     */
    public function getVinos(): Collection
    {
        return $this->vinos;
    }

    public function addVino(Vino $vino): static
    {
        if (!$this->vinos->contains($vino)) {
            $this->vinos->add($vino);
            $vino->addVariedadUva($this);
        }

        return $this;
    }

    public function removeVino(Vino $vino): static
    {
        if ($this->vinos->removeElement($vino)) {
            $vino->removeVariedadUva($this);
        }

        return $this;
    }
}
