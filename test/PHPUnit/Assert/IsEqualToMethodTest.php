<?php

namespace Fabstract\Component\Assert\Test\PHPUnit\Assert;

use Fabstract\Component\Assert\Assert;
use Fabstract\Component\Assert\AssertionException;
use Fabstract\Component\Assert\Test\PHPUnit\DummyClass;
use Fabstract\Component\UnitTest\MethodTestBase;

/**
 * Class IsEqualToMethodTest
 * @package Fabstract\Component\Assert\Test\PHPUnit\Assert
 *
 * @see \Fabstract\Component\Assert\Assert::isEqualTo()
 */
class IsEqualToMethodTest extends MethodTestBase
{
    #region correct arguments

    /**
     * @doesNotPerformAssertions
     */
    public function testIntTwoEqualsIntTwo()
    {
        $arguments = [2, 2];

        $this->callStatic(Assert::class, $arguments);
    }

    /**
     * @doesNotPerformAssertions
     */
    public function testStringTwoEqualsStringTwo()
    {
        $arguments = ['2', '2'];

        $this->callStatic(Assert::class, $arguments);
    }

    /**
     * @doesNotPerformAssertions
     */
    public function testObjectEqualsToItself()
    {
        $instance = new DummyClass();
        $arguments = [$instance, $instance];

        $this->callStatic(Assert::class, $arguments);
    }

    /**
     * @doesNotPerformAssertions
     */
    public function testPositiveINFIsEqualToPositiveINF()
    {
        $arguments = [INF, INF];

        $this->callStatic(Assert::class, $arguments);
    }

    /**
     * @doesNotPerformAssertions
     */
    public function tesNullIsEqualToNull()
    {
        $arguments = [null, null];

        $this->callStatic(Assert::class, $arguments);
    }

    /**
     * @doesNotPerformAssertions
     */
    public function tesEmptyArrayIsEqualToEmptyArray()
    {
        $arguments = [[], []];

        $this->callStatic(Assert::class, $arguments);
    }

    /**
     * @doesNotPerformAssertions
     */
    public function tesEmptyStringIsEqualToEmptyString()
    {
        $arguments = ['', ''];

        $this->callStatic(Assert::class, $arguments);
    }

    #endregion

    #region incorrect arguments

    public function testInstanceIsNotEqualToDifferentInstancesOfTheSameClass()
    {
        $instance1 = new DummyClass();
        $instance2 = new DummyClass();
        $arguments = [$instance1, $instance2];

        $this->expectException(AssertionException::class);

        $this->callStatic(Assert::class, $arguments);
    }

    public function testStringZeroIsNotEqualToIntZero()
    {
        $arguments = ['0', 0];

        $this->expectException(AssertionException::class);

        $this->callStatic(Assert::class, $arguments);
    }

    public function testFalseIsNotEqualToIntZero()
    {
        $arguments = [false, 0];

        $this->expectException(AssertionException::class);

        $this->callStatic(Assert::class, $arguments);
    }

    public function testFalseIsNotEqualToNull()
    {
        $arguments = [false, null];

        $this->expectException(AssertionException::class);

        $this->callStatic(Assert::class, $arguments);
    }

    public function testEmptyArrayIsNotEqualToNull()
    {
        $arguments = [[], null];

        $this->expectException(AssertionException::class);

        $this->callStatic(Assert::class, $arguments);
    }

    public function testEmptyStringIsNotEqualToNull()
    {
        $arguments = ['', null];

        $this->expectException(AssertionException::class);

        $this->callStatic(Assert::class, $arguments);
    }

    public function testIntZeroIsNotEqualToFloatZero()
    {
        $arguments = [0, 0.0];

        $this->expectException(AssertionException::class);

        $this->callStatic(Assert::class, $arguments);
    }

    #endregion
}
