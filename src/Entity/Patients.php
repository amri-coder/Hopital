<?php

namespace App\Entity;

use App\Repository\PatientsRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\NotNullValidator;
use  Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\RegexValidator;

/**
 * @ORM\Entity(repositoryClass=PatientsRepository::class)
 * @UniqueEntity(
 * fields={"lastname","firstname", "birthDate"},
 * message = "Ce patient existe déjà !")
 */
class Patients
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank
     * @Assert\Regex(
     *  pattern="/^[a-zA-ZÀ-ÿ\-\ ]*$/",
     *  message="Le nom doit contenir uniquement des lettres"
     * )
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank
     * @Assert\Regex(
     *  pattern="/^[a-zA-ZÀ-ÿ\-\ ]*$/",
     *  message="Le prénom doit contenir uniquement des lettres"
     * )
     */
    private $firstname;

    /**
     * @ORM\Column(type="date")
     */
    private $birthDate;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email."
     * )
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=11)
     * @Assert\NotBlank
     * @Assert\Regex(
     *  pattern="/^[12][0-9]{10}$/",
     *  message="le numéro de carte vitale doit commencer par 1 ou 2 et avoir 11 chiffres au total"
     * )
     */
    private $vitalcardNumber;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = mb_strtoupper($lastname);

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthDate(\DateTimeInterface $birthDate): self
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getVitalcardNumber(): ?string
    {
        return $this->vitalcardNumber;
    }

    public function setVitalcardNumber(string $vitalcardNumber): self
    {
        $this->vitalcardNumber = $vitalcardNumber;

        return $this;
    }
    public function __toString(): string
    {
        return $this->lastname;
    }
}
