<?php

namespace App\Entity;

use App\Repository\StateKeysRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StateKeysRepository::class)
 */
class StateKeys
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
    private $state_def;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStateDef(): ?string
    {
        return $this->state_def;
    }

    public function setStateDef(string $state_def): self
    {
        $this->state_def = $state_def;

        return $this;
    }
}
