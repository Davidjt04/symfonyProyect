<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $Nombre = null;

    #[ORM\Column(length: 30)]
    private ?string $Contraseña = null;

    #[ORM\Column(length: 50)]
    private ?string $Correo = null;

    /**
     * @var Collection<int, Pregunta>
     */
    #[ORM\OneToMany(targetEntity: Pregunta::class, mappedBy: 'user')]
    private Collection $pregunta;

    /**
     * @var Collection<int, Respuesta>
     */
    #[ORM\OneToMany(targetEntity: Respuesta::class, mappedBy: 'user', orphanRemoval: true)]
    private Collection $respuesta;

    public function __construct()
    {
        $this->pregunta = new ArrayCollection();
        $this->respuesta = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->Nombre;
    }

    public function setNombre(string $Nombre): static
    {
        $this->Nombre = $Nombre;

        return $this;
    }

    public function getContraseña(): ?string
    {
        return $this->Contraseña;
    }

    public function setContraseña(string $Contraseña): static
    {
        $this->Contraseña = $Contraseña;

        return $this;
    }

    public function getCorreo(): ?string
    {
        return $this->Correo;
    }

    public function setCorreo(string $Correo): static
    {
        $this->Correo = $Correo;

        return $this;
    }

    /**
     * @return Collection<int, Pregunta>
     */
    public function getPregunta(): Collection
    {
        return $this->pregunta;
    }

    public function addPreguntum(Pregunta $preguntum): static
    {
        if (!$this->pregunta->contains($preguntum)) {
            $this->pregunta->add($preguntum);
            $preguntum->setUser($this);
        }

        return $this;
    }

    public function removePreguntum(Pregunta $preguntum): static
    {
        if ($this->pregunta->removeElement($preguntum)) {
            // set the owning side to null (unless already changed)
            if ($preguntum->getUser() === $this) {
                $preguntum->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Respuesta>
     */
    public function getRespuesta(): Collection
    {
        return $this->respuesta;
    }

    public function addRespuestum(Respuesta $respuestum): static
    {
        if (!$this->respuesta->contains($respuestum)) {
            $this->respuesta->add($respuestum);
            $respuestum->setUser($this);
        }

        return $this;
    }

    public function removeRespuestum(Respuesta $respuestum): static
    {
        if ($this->respuesta->removeElement($respuestum)) {
            // set the owning side to null (unless already changed)
            if ($respuestum->getUser() === $this) {
                $respuestum->setUser(null);
            }
        }

        return $this;
    }
}
