<?php

namespace Symfony\Cmf\Bundle\SeoBundle\Tests\Functional\Doctrine\Phpcr;

use Doctrine\ODM\PHPCR\DocumentManager;
use Symfony\Cmf\Bundle\SeoBundle\Doctrine\Phpcr\SitemapDocumentProvider;
use Symfony\Cmf\Component\Testing\Functional\BaseTestCase;

/**
 * @author Maximilian Berghoff <Maximilian.Berghoff@gmx.de>
 */
class SitemapDocumentsProviderTest extends BaseTestCase
{
    /**
     * @var DocumentManager
     */
    protected $dm;
    protected $base;

    /**
     * @var SitemapDocumentProvider
     */
    protected $provider;

    public function setUp()
    {
        $this->db('PHPCR')->createTestNode();
        $this->dm = $this->db('PHPCR')->getOm();
        $this->base = $this->dm->find(null, '/test');

        $this->db('PHPCR')->loadFixtures(array(
            'Symfony\Cmf\Bundle\SeoBundle\Tests\Resources\DataFixtures\Phpcr\LoadSitemapData',
        ));

        $this->provider = new SitemapDocumentProvider($this->dm);
    }

    public function testDocumentGeneration()
    {
        $documents = $this->provider->load('test');

        $this->assertCount(3, $documents);

        // todo add new behavior
    }
}
