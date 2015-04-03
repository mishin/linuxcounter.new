<?php

namespace Syw\Front\NewsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use BladeTester\LightNewsBundle\Entity\News as BaseNews;

/**
 * Class News
 *
 * @category Entity
 * @package  SywFrontNewsBundle
 * @author   Alexander Löhner <alex.loehner@linux.com>
 * @license  GPL v3
 * @link     https://github.com/alexloehner/linuxcounter.new
 *
 * @ORM\Entity()
 * @ORM\Table(name="news")
 */
class News extends BaseNews
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    public function getId()
    {
        return $this->id;
    }
}
