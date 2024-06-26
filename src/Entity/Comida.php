<?php
// api/src/Entity/Comida.php
namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ComidaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ComidaRepository::class)]
#[ORM\UniqueConstraint(name: 'nombre', columns: ['nombre'])]
#[ORM\Table(name: "comida")]
#[ApiResource]
class Comida
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['vino.read'])]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    #[Groups(['vino.read', 'vino.write'])]
    private ?string $nombre = null;
 
    #[ORM\ManyToMany(targetEntity: Vino::class, mappedBy: 'comida', cascade: ['persist'])]
    private Collection $vino;

    public function __construct()
    {
        $this->vino = new ArrayCollection();
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
    public function getVino(): Collection
    {
        return $this->vino;
    }

    public function addVino(Vino $vino): static
    {
        if (!$this->vino->contains($vino)) {
            $this->vino->add($vino);
            $vino->addComida($this);
        }

        return $this;
    }

    public function removeVino(Vino $vino): static
    {
        if ($this->vino->removeElement($vino)) {
            $vino->removeComida($this);
        }

        return $this;
    }

}
