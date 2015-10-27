<?php

/*
 * (c) Jérémy Marodon <marodon.jeremy@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Th3Mouk\CMSSimpleContentManagerBundle\Twig;

use Th3Mouk\CMSSimpleContentManagerBundle\Helper\ContentHelper;

class ContentExtension extends \Twig_Extension
{
    /**
     * @var ContentHelper
     */
    protected $helper;

    /**
     * @param ContentHelper $helper
     */
    public function __construct(ContentHelper $helper)
    {
        $this->helper = $helper;
    }

    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('static_content', array($this, 'draw'), array('is_safe' => array('html'))),
        );
    }

    public function draw($key)
    {
        return $this->helper->draw($key);
    }

    public function getName()
    {
        return 'th3mouk.static_content.twig';
    }
}
