<?php
/*
 * This file is part of the FreshDoctrineEnumBundle
 *
 * (c) Artem Henvald <genvaldartem@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fresh\DoctrineEnumBundle\Tests\Validator;

use Fresh\DoctrineEnumBundle\Tests\Fixtures\DBAL\Types\BasketballPositionType;
use Fresh\DoctrineEnumBundle\Validator\Constraints\Enum;
use PHPUnit\Framework\TestCase;

/**
 * EnumTest.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
class EnumTest extends TestCase
{
    public function testConstructor(): void
    {
        $constraint = new Enum([
            'entity' => BasketballPositionType::class,
        ]);

        self::assertEquals(BasketballPositionType::getValues(), $constraint->choices);
    }

    /**
     * @expectedException \Symfony\Component\Validator\Exception\MissingOptionsException
     */
    public function testMissedRequiredOption(): void
    {
        $constraint = new Enum();

        self::assertEquals(['entity'], $constraint->getRequiredOptions());
    }

    public function testGetRequiredOptions(): void
    {
        $constraint = new Enum([
            'entity' => BasketballPositionType::class,
        ]);

        self::assertEquals(['entity'], $constraint->getRequiredOptions());
    }

    public function testGetDefaultOption(): void
    {
        $constraint = new Enum([
            'entity' => BasketballPositionType::class,
        ]);

        self::assertEquals('choices', $constraint->getDefaultOption());
    }
}
