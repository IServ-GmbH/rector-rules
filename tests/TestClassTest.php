<?php

declare(strict_types=1);

namespace IServ\Library\RectorRules\Tests;

use IServ\Library\RectorRules\TestClass;
use PHPUnit\Framework\TestCase;

/**
 * @covers \IServ\Library\RectorRules\TestClass
 */
final class TestClassTest extends TestCase
{
    public function testTest(): void
    {
        $class = new TestClass();
        $this->assertTrue($class->returnsTrue());
    }
}
