<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Dog extends Animal
{

    /** @ORM\Column(type="string") */
    private $kennel;

    /**
     * @return mixed
     */
    public function getKennel()
    {
        return $this->kennel;
    }

    /**
     * @param mixed $kennel
     */
    public function setKennel($kennel)
    {
        $this->kennel = $kennel;
    }

}
