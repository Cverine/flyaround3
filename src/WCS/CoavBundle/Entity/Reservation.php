<?php

namespace WCS\CoavBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation")
 * @ORM\Entity(repositoryClass="WCS\CoavBundle\Repository\ReservationRepository")
 */
class Reservation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="nbReservedSeats", type="smallint")
     */
    private $nbReservedSeats;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="publicationDate", type="datetime")
     */
    private $publicationDate;

    /**
     * @var string
     *
     * @ORM\Column(name="passenger", type="string", length=32)
     */
    private $passenger;

    /**
     * @ORM\ManyToOne(targetEntity="WCS\CoavBundle\Entity\Flight", inversedBy="flights")
     * @ORM\JoinColumn(nullable=false)
     */
    private $flight;

    /**
     * @var bool
     *
     * @ORM\Column(name="wasDone", type="boolean")
     */
    private $wasDone;

    /**
     * @ORM\ManyToMany(targetEntity="WCS\CoavBundle\Entity\User", mappedBy="reservations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $passengers;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nbReservedSeats
     *
     * @param integer $nbReservedSeats
     *
     * @return Reservation
     */
    public function setNbReservedSeats($nbReservedSeats)
    {
        $this->nbReservedSeats = $nbReservedSeats;

        return $this;
    }

    /**
     * Get nbReservedSeats
     *
     * @return int
     */
    public function getNbReservedSeats()
    {
        return $this->nbReservedSeats;
    }

    /**
     * Set publicationDate
     *
     * @param \DateTime $publicationDate
     *
     * @return Reservation
     */
    public function setPublicationDate($publicationDate)
    {
        $this->publicationDate = $publicationDate;

        return $this;
    }

    /**
     * Get publicationDate
     *
     * @return \DateTime
     */
    public function getPublicationDate()
    {
        return $this->publicationDate;
    }

    /**
     * Set passenger
     *
     * @param string $passenger
     *
     * @return Reservation
     */
    public function setPassenger($passenger)
    {
        $this->passenger = $passenger;

        return $this;
    }

    /**
     * Get passenger
     *
     * @return string
     */
    public function getPassenger()
    {
        return $this->passenger;
    }

    /**
     * Set flight
     *
     * @param string $flight
     *
     * @return Reservation
     */
    public function setFlight($flight)
    {
        $this->flight = $flight;

        return $this;
    }

    /**
     * Get flight
     *
     * @return string
     */
    public function getFlight()
    {
        return $this->flight;
    }

    /**
     * Set wasDone
     *
     * @param boolean $wasDone
     *
     * @return Reservation
     */
    public function setWasDone($wasDone)
    {
        $this->wasDone = $wasDone;

        return $this;
    }

    /**
     * Get wasDone
     *
     * @return bool
     */
    public function getWasDone()
    {
        return $this->wasDone;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->passengers = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add passenger
     *
     * @param \WCS\CoavBundle\Entity\User $passenger
     *
     * @return Reservation
     */
    public function addPassenger(\WCS\CoavBundle\Entity\User $passenger)
    {
        $this->passengers[] = $passenger;

        return $this;
    }

    /**
     * Remove passenger
     *
     * @param \WCS\CoavBundle\Entity\User $passenger
     */
    public function removePassenger(\WCS\CoavBundle\Entity\User $passenger)
    {
        $this->passengers->removeElement($passenger);
    }

    /**
     * Get passengers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPassengers()
    {
        return $this->passengers;
    }
}
