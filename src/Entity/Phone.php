<?php

namespace App\Entity;

use App\Repository\PhoneRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Hateoas\Configuration\Annotation as Hateoas;
use JMS\Serializer\Annotation\Groups;

/**
 * @Hateoas\Relation(
 *      "self",
 *      href = @Hateoas\Route(
 *          "detailPhone",
 *          parameters = { "id" = "expr(object.getId())" }
 *      ),
 *      exclusion = @Hateoas\Exclusion(groups="getCustomers", excludeIf = "expr(not is_granted('ROLE_USER'))"),
 * )
 * 
 * @Hateoas\Relation(
 *      "list",
 *      href = @Hateoas\Route(
 *          "phones",
 *      ),
 *      exclusion = @Hateoas\Exclusion(groups="getCustomers", excludeIf = "expr(not is_granted('ROLE_USER'))"),
 * )
 *
 */
#[ORM\Entity(repositoryClass: PhoneRepository::class)]
class Phone
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(["getPhones"])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Le nom du modèle est obligatoire")]
    #[Assert\Length(min: 3, max: 255, minMessage: "Le nom du modèle doit faire au moins {{ limit }} caractères", maxMessage: "Le nom du modèle ne peut pas faire plus de {{ limit }} caractères")]
    #[Assert\NoSuspiciousCharacters]
    #[Groups(["getPhones"])]
    private ?string $model = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "La marque est obligatoire")]
    #[Assert\Length(min: 3, max: 255, minMessage: "Le nom de la marque doit faire au moins {{ limit }} caractères", maxMessage: "Le nom de la marque ne peut pas faire plus de {{ limit }} caractères")]
    #[Assert\NoSuspiciousCharacters]
    #[Groups(["getPhones"])]
    private ?string $brand = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(message: "La couleur est obligatoire")]
    #[Assert\Length(min: 3, max: 255, minMessage: "Le nom de la couleur doit faire au moins {{ limit }} caractères", maxMessage: "Le nom de la couleur ne peut pas faire plus de {{ limit }} caractères")]
    #[Assert\NoSuspiciousCharacters]
    #[Groups(["getPhones"])]
    private ?string $color = null;

    #[ORM\Column(length: 150)]
    #[Assert\NotBlank(message: "Le système d'exploitation est obligatoire")]
    #[Assert\Length(min: 3, max: 255, minMessage: "Le nom du système d'exploitation doit faire au moins {{ limit }} caractères", maxMessage: "Le nom du système d'exploitation ne peut pas faire plus de {{ limit }} caractères")]
    #[Assert\NoSuspiciousCharacters]
    #[Groups(["getPhones"])]
    private ?string $operatingSystem = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): static
    {
        $this->model = $model;

        return $this;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): static
    {
        $this->brand = $brand;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): static
    {
        $this->color = $color;

        return $this;
    }

    public function getOperatingSystem(): ?string
    {
        return $this->operatingSystem;
    }

    public function setOperatingSystem(string $operatingSystem): static
    {
        $this->operatingSystem = $operatingSystem;

        return $this;
    }
}
