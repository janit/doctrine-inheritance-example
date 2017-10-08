<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Truck extends Vehicle
{

    /** @ORM\Column(type="integer") */
    private $wheelage;

    /**
     * @return mixed
     */
    public function getWheelage()
    {
        return $this->wheelage;
    }

    /**
     * @param mixed $wheelage
     */
    public function setWheelage($wheelage)
    {
        $this->wheelage = $wheelage;
    }

}
