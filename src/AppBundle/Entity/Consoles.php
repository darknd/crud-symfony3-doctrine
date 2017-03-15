<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="consoles")
 */

class Consoles
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    public function setId($id){
        $this->id = $id;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getUpdatedAt()
    {
        return new \DateTime('-'.rand(0, 100).' days');
    }

}