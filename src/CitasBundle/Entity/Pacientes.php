<?php

namespace CitasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pacientes
 *
 * @ORM\Table(name="TBL_PACIENTES", indexes={@ORM\Index(name="IDX_TBL_PACIENTES_COLUMN_EPS", columns={"EPS"})})
 * @ORM\Entity(repositoryClass="CitasBundle\Repository\PacientesRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Pacientes
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
     * @var int
     *
     * @ORM\Column(name="DOCUMENTO", type="integer")
     */
    private $document;

    /**
     * @var bool
     *
     * @ORM\Column(name="ACTIVO", type="boolean")
     */
    private $isActive;

    /**
     * @var \CitasBundle\Entity\Eps
     *
     * @ORM\ManyToOne(targetEntity="CitasBundle\Entity\Eps")
     * @ORM\JoinColumn(name="EPS", referencedColumnName="ID")
     */
    private $eps;

    /**
     * @var string
     *
     * @ORM\Column(name="DIRECCION", type="string", length=255)
     */
    private $address;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FECHA_CREADO", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FECHA_ACTUALIZADO", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\PrePersist()
     */
    public function setPrePersistData() {
        $this->isActive = true;
        $this->createdAt = new \DateTime();
    }

    /**
     * @ORM\PreUpdate()
     */
    public function setPreUpdateData() {
        $this->updatedAt = new \DateTime();
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
     * @return Pacientes
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
     * @return Pacientes
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
     * Set document
     *
     * @param integer $document
     *
     * @return Pacientes
     */
    public function setDocument($document)
    {
        $this->document = $document;

        return $this;
    }

    /**
     * Get document
     *
     * @return integer
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return Pacientes
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
     * Set address
     *
     * @param string $address
     *
     * @return Pacientes
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Pacientes
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Pacientes
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set eps
     *
     * @param \CitasBundle\Entity\Eps $eps
     *
     * @return Pacientes
     */
    public function setEps(\CitasBundle\Entity\Eps $eps = null)
    {
        $this->eps = $eps;

        return $this;
    }

    /**
     * Get eps
     *
     * @return \CitasBundle\Entity\Eps
     */
    public function getEps()
    {
        return $this->eps;
    }
}
