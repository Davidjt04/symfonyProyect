<?php

namespace App\Entity;

use App\Repository\RespuestaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RespuestaRepository::class)]
class Respuesta
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 70)]
    private ?string $Enunciado = null;
    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEnunciado(): ?string
    {
        return $this->Enunciado;
    }

    public function setEnunciado(string $Enunciado): static
    {
        $this->Enunciado = $Enunciado;

        return $this;
    }

}
