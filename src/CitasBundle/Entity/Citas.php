<?php

namespace CitasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Citas
 *
 * @ORM\Table(name="TBL_CITAS")
 * @ORM\Entity(repositoryClass="CitasBundle\Repository\CitasRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Citas
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
     * @var \DateTime
     *
     * @ORM\Column(name="FECHA", type="datetime")
     */
    private $dateAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FECHA_CITA", type="datetime")
     */
    private $citationAt;

    /**
     * @var \CitasBundle\Entity\Medicos
     *
     * @ORM\ManyToOne(targetEntity="CitasBundle\Entity\Medicos")
     * @ORM\JoinColumn(name="MEDICO", referencedColumnName="ID")
     */
    private $doctor;

    /**
     * @var \CitasBundle\Entity\Pacientes
     *
     * @ORM\ManyToOne(targetEntity="CitasBundle\Entity\Pacientes")
     * @ORM\JoinColumn(name="PACIENTE", referencedColumnName="ID")
     */
    private $patient;

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
        $this->dateAt = new \DateTime();
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
     * Set dateAt
     *
     * @param \DateTime $dateAt
     *
     * @return Citas
     */
    public function setDateAt($dateAt)
    {
        $this->dateAt = $dateAt;

        return $this;
    }

    /**
     * Get dateAt
     *
     * @return \DateTime
     */
    public function getDateAt()
    {
        return $this->dateAt;
    }

    /**
     * Set citationAt
     *
     * @param \DateTime $citationAt
     *
     * @return Citas
     */
    public function setCitationAt($citationAt)
    {
        $this->citationAt = $citationAt;

        return $this;
    }

    /**
     * Get citationAt
     *
     * @return \DateTime
     */
    public function getCitationAt()
    {
        return $this->citationAt;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return Citas
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
     * Set doctor
     *
     * @param \CitasBundle\Entity\Medicos $doctor
     *
     * @return Citas
     */
    public function setDoctor(\CitasBundle\Entity\Medicos $doctor = null)
    {
        $this->doctor = $doctor;

        return $this;
    }

    /**
     * Get doctor
     *
     * @return \CitasBundle\Entity\Medicos
     */
    public function getDoctor()
    {
        return $this->doctor;
    }

    /**
     * Set patient
     *
     * @param \CitasBundle\Entity\Pacientes $patient
     *
     * @return Citas
     */
    public function setPatient(\CitasBundle\Entity\Pacientes $patient = null)
    {
        $this->patient = $patient;

        return $this;
    }

    /**
     * Get patient
     *
     * @return \CitasBundle\Entity\Pacientes
     */
    public function getPatient()
    {
        return $this->patient;
    }
}