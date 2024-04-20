<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\DenominacionOrigenRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: DenominacionOrigenRepository::class)]
#[ORM\Table(name: "denominacion_origen")]
#[ApiResource]
class DenominacionOrigen
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Groups(['vino.read', 'vino.write'])]
    #[ORM\Column(length: 150)]
    private ?string $nombre = null;

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

}
