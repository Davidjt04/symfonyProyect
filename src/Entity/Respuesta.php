<?php

namespace App\Entity;

use App\Repository\RespuestaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RespuestaRepository::class)]
class Respuesta
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'repuesta')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Pregunta $pregunta = null;

    #[ORM\Column]
    private ?int $respuesta = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $fecha_respuesta = null;

    #[ORM\ManyToOne(inversedBy: 'respuesta')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;
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

    public function getPregunta(): ?Pregunta
    {
        return $this->pregunta;
    }

    public function setPregunta(?Pregunta $pregunta): static
    {
        $this->pregunta = $pregunta;

        return $this;
    }

    public function getRespuesta(): ?int
    {
        return $this->respuesta;
    }

    public function setRespuesta(int $respuesta): static
    {
        $this->respuesta = $respuesta;

        return $this;
    }

    public function getFechaRespuesta(): ?\DateTimeInterface
    {
        return $this->fecha_respuesta;
    }

    public function setFechaRespuesta(\DateTimeInterface $fecha_respuesta): static
    {
        $this->fecha_respuesta = $fecha_respuesta;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

}