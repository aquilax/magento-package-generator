<?php

use Aquilax\Magento\Generator;
use Aquilax\Magento\PackageConfig;

class GeneratorTest extends PHPUnit_Framework_TestCase
{
    public function testGetPackageXMLProvider()
    {
        return array(
            array(
                new PackageConfig(),
                '<?xml version="1.0"?>
<package><name/><version/><stability/><license/><channel/><extends/><summary/><description/><notes/><authors/><date>1970-01-01</date><date>00:00:00</date><contents/><compatible/><dependencies><required><php><min>5.0.0</min><max>5.7.0</max></php></required></dependencies></package>
'
            )
        );
    }

    /**
     * @dataProvider testGetPackageXMLProvider
     */
    public function testGetPackageXML($packageConfig, $expected)
    {
        $generator = new Generator();
        $xml = $generator->getPackageXML($packageConfig);
        $this->assertEquals($expected, $xml);
    }
}
