<?php

namespace App\Entity;

use App\Repository\OrdersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrdersRepository::class)
 */
class Orders
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="orders")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adress;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $additionnal_adress;

    /**
     * @ORM\Column(type="integer")
     */
    private $postal_code;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;


    /**
     * @ORM\ManyToOne(targetEntity=StateKeys::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $state;

    /**
     * @ORM\ManyToMany(targetEntity=Product::class)
     */
    private $product;

    public function __construct()
    {
        $this->product = new ArrayCollection();
        $this->quantity = new ArrayCollection();
        $this->productQuantities = new ArrayCollection();
    }

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\OneToMany(targetEntity=ProductQuantity::class, mappedBy="orders")
     */
    private $productQuantities;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?user
    {
        return $this->user;
    }

    public function setUser(?user $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getAdditionnalAdress(): ?string
    {
        return $this->additionnal_adress;
    }

    public function setAdditionnalAdress(?string $additionnal_adress): self
    {
        $this->additionnal_adress = $additionnal_adress;

        return $this;
    }

    public function getPostalCode(): ?int
    {
        return $this->postal_code;
    }

    public function setPostalCode(int $postal_code): self
    {
        $this->postal_code = $postal_code;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getState(): ?statekeys
    {
        return $this->state;
    }

    public function setState(?statekeys $state): self
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @return Collection|Product[]
     */
    public function getProduct(): Collection
    {
        return $this->product;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->product->contains($product)) {
            $this->product[] = $product;
        }

        return $this;
    }

    /**
     * @return Collection|ProductQuantity[]
     */
    public function getProductQuantities(): Collection
    {
        return $this->productQuantities;
    }

    public function addProductQuantity(ProductQuantity $productQuantity): self
    {
        if (!$this->productQuantities->contains($productQuantity)) {
            $this->productQuantities[] = $productQuantity;
            $productQuantity->setOrders($this);
        }

        return $this;
    }

    public function removeProductQuantity(ProductQuantity $productQuantity): self
    {
        if ($this->productQuantities->removeElement($productQuantity)) {
            // set the owning side to null (unless already changed)
            if ($productQuantity->getOrders() === $this) {
                $productQuantity->setOrders(null);
            }
        }

        return $this;
    }

}
