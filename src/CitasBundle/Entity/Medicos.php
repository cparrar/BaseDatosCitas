<?php

namespace CitasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Medicos
 *
 * @ORM\Table(name="TBL_MEDICOS", indexes={@ORM\Index(name="IDX_TBL_MEDICOS_COLUMN_ESPECIALIDAD", columns={"ESPECIALIDAD"})})
 * @ORM\Entity(repositoryClass="CitasBundle\Repository\MedicosRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Medicos
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="NOMBRE", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="APELLIDO", type="string", length=255)
     */
    private $lastName;

    /**
     * @var \CitasBundle\Entity\Especialidades
     *
     * @ORM\ManyToOne(targetEntity="CitasBundle\Entity\Especialidades")
     * @ORM\JoinColumn(name="ESPECIALIDAD", referencedColumnName="ID")
     */
    private $specialty;

    /**
     * @var bool
     *
     * @ORM\Column(name="ACTIVO", type="boolean")
     */
    private $isActive;

    /**
     * @ORM\PrePersist()
     */
    public function setPrePersistData() {
        $this->isActive = true;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Medicos
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return Medicos
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return Medicos
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set specialty
     *
     * @param \CitasBundle\Entity\Especialidades $specialty
     *
     * @return Medicos
     */
    public function setSpecialty(\CitasBundle\Entity\Especialidades $specialty = null)
    {
        $this->specialty = $specialty;

        return $this;
    }

    /**
     * Get specialty
     *
     * @return \CitasBundle\Entity\Especialidades
     */
    public function getSpecialty()
    {
        return $this->specialty;
    }
}
