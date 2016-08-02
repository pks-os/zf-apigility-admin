<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2016 Zend Technologies USA Inc. (http://www.zend.com)
 */

namespace ZFTest\Apigility\Admin\Factory;

use Interop\Container\ContainerInterface;
use PHPUnit_Framework_TestCase as TestCase;
use ZF\Apigility\Admin\Factory\InjectModuleResourceLinksListenerFactory;
use ZF\Apigility\Admin\Listener\InjectModuleResourceLinksListener;

class InjectModuleResourceLinksListenerFactoryTest extends TestCase
{
    public function testFactoryReturnsTheListenerWithViewHelpersContainerComposed()
    {
        $factory = new InjectModuleResourceLinksListenerFactory();
        $viewHelpers = $this->prophesize(ContainerInterface::class)->reveal();
        $container = $this->prophesize(ContainerInterface::class);

        $container->get('ViewHelperManager')->willReturn($viewHelpers);
        $listener = $factory($container->reveal());
        $this->assertInstanceOf(InjectModuleResourceLinksListener::class, $listener);
        $this->assertAttributeSame($viewHelpers, 'viewHelpers', $listener);
    }
}
