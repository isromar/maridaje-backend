<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\BodegaRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: BodegaRepository::class)]
#[ORM\Table(name: 'Bodega')]
#[ORM\UniqueConstraint(name: 'cif', columns: ['cif'])]
#[ApiResource]
class Bodega
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Groups(['vino.read'])]
    #[ORM\Column(length: 150)]
    private ?string $nombre = null;

    #[Groups(['vino.read'])]
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $direccion = null;

    #[Groups(['vino.read'])]
    #[ORM\Column(length: 15, nullable: true)]
    private ?string $telefono = null;

    #[Groups(['vino.read'])]
    #[ORM\Column(length: 15)]
    private ?string $cif = null;

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

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(?string $telefono): static
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getCif(): ?string
    {
        return $this->cif;
    }

    public function setCif(string $cif): static
    {
        $this->cif = $cif;

        return $this;
    }

}
