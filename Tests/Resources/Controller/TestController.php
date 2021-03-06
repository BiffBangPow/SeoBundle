<?php

/*
 * This file is part of the Symfony CMF package.
 *
 * (c) 2011-2015 Symfony CMF
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Cmf\Bundle\SeoBundle\Tests\Resources\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TestController extends Controller
{
    public function indexAction($contentDocument)
    {
        $params = array(
            'cmfMainContent' => array(
                'title'     => $contentDocument->getTitle(),
                'body' => $contentDocument->getBody(),
            ),
        );

        return $this->render('::tests/index.html.twig', $params);
    }
}
