<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\BodegaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BodegaRepository::class)]
#[ApiResource]
class Bodega
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $nombre = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $direccion = null;

    #[ORM\OneToMany(mappedBy: 'bodega_id', targetEntity: Vino::class)]
    private Collection $vino_id;

    public function __construct()
    {
        $this->vino_id = new ArrayCollection();
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

    public function getDireccion(): ?string
    {
        return $this->direccion;
    }

    public function setDireccion(?string $direccion): static
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * @return Collection<int, Vino>
     */
    public function getVinoId(): Collection
    {
        return $this->vino_id;
    }

    public function addVinoId(Vino $vinoId): static
    {
        if (!$this->vino_id->contains($vinoId)) {
            $this->vino_id->add($vinoId);
            $vinoId->setBodegaId($this);
        }

        return $this;
    }

    public function removeVinoId(Vino $vinoId): static
    {
        if ($this->vino_id->removeElement($vinoId)) {
            // set the owning side to null (unless already changed)
            if ($vinoId->getBodegaId() === $this) {
                $vinoId->setBodegaId(null);
            }
        }

        return $this;
    }
}
