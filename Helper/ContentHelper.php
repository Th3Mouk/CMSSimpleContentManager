<?php

/*
 * (c) Jérémy Marodon <marodon.jeremy@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Th3Mouk\CMSSimpleContentManagerBundle\Helper;

use Doctrine\ORM\EntityManager;

class ContentHelper
{
    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * ContentHelper constructor.
     *
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function draw($key)
    {
        $obj = $this->getRepository()->findOneBy(array('textKey' => $key));

        if (!$obj) {
            return;
        }

        return $obj->getTextValue();
    }

    /**
     * @return \Doctrine\ORM\EntityRepository
     */
    public function getRepository()
    {
        return $this->em->getRepository('Th3MoukCMSSimpleContentManagerBundle:Content');
    }
}
