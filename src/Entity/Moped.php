<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Moped extends Vehicle
{

    /** @ORM\Column(type="string") */
    private $tuning;

    /**
     * @return mixed
     */
    public function getTuning()
    {
        return $this->tuning;
    }

    /**
     * @param mixed $tuning
     */
    public function setTuning($tuning)
    {
        $this->tuning = $tuning;
    }

}
