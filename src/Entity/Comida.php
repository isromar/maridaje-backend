<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comida
 *
 * @ORM\Table(name="comida")
 * @ORM\Entity
 */
class Comida
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="string", length=100, nullable=true)
     */
    private $nombre;


}
