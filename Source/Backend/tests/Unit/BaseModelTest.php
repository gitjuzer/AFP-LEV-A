<?php

namespace Afp\Domain\Base;

use Afp\Shared\Exception\NotImplementedException;
use Afp\Shared\Exception\InaccessiblePropertyException;

/**
 * Class TestModel
 * @package Afp\Domain\Base
 * CLASS TO TEST. THE ACTUAL TEST IS BELOW.
 */
class TestModel extends BaseModel
{
    protected $writeOnlyProperty;
    private $readOnlyProperty = 'Property Is Set';
    private $nullValueProperty;
    private $readWriteProperty;

    public function existingMethod()
    {
        return 999;
    }

    public function setWriteOnlyProperty($value)
    {
        $this->writeOnlyProperty = $value;
    }

    public function getReadOnlyProperty()
    {
        return $this->readOnlyProperty;
    }

    public function getNullValueProperty()
    {
        return $this->nullValueProperty;
    }

    public function setNullValueProperty()
    {
        return $this->nullValueProperty;
    }

    public function getReadWriteProperty()
    {
        return $this->readWriteProperty;
    }

    public function setReadWriteProperty($value)
    {
        $this->readWriteProperty = $value;
    }

}

class BaseModelTest extends \PHPUnit_Framework_TestCase
{
    private $initialized = false;
    private $baseModel;
    private $testModel;

    public function setUp()
    {
        if (!$this->initialized) {
            $this->baseModel = $this->getMockForAbstractClass(BaseModel::class);
            $this->testModel = new TestModel();
            $this->initialized = true;
        }
    }

    public function testCallingMissingMethodThrowsNotImplementedException()
    {
        $this->expectException(NotImplementedException::class);
        $this->assertTrue($this->baseModel->missingMethod());
    }

    public function testCallingExistingMethodReturnsCorrectValue()
    {
        $this->assertEquals(999, $this->testModel->existingMethod());
    }

    public function testIssetReturnsFalseWhenPropertyIsNotExists()
    {
        $this->assertFalse(isset($this->testModel->missingProperty));
    }

    public function testIssetReturnsFalseWhenPropertyIsNotSet()
    {
        $this->assertFalse(isset($this->testModel->writeOnlyProperty));
    }

    public function testIssetReturnsTrueWhenPropertyIsSet()
    {
        $this->assertTrue(isset($this->testModel->readOnlyProperty));
    }

    public function testGetMissingPropertyThrowsInaccessiblePropertyException()
    {
        $this->expectException(InaccessiblePropertyException::class);
        $this->testModel->missingProperty;
    }

    public function testGetExistingAndReadablePropertyReturnsCorrectValue()
    {
        $this->assertEquals('Property Is Set', $this->testModel->readOnlyProperty);
    }

    public function testGetExistingAndReadablePropertyReturnsNullWhenValueIsNotSet()
    {
        $this->assertNull($this->testModel->nullValueProperty);
    }

    public function testGetExistingButWriteOnlyPropertyThrowsInaccessiblePropertyException()
    {
        $this->expectException(InaccessiblePropertyException::class);
        $this->assertEquals('Property Is Set', $this->testModel->writeOnlyProperty);
    }

    public function testSetMissingPropertyThrowsInaccessiblePropertyException()
    {
        $this->expectException(InaccessiblePropertyException::class);
        $this->testModel->missingProperty = 123;
    }

    public function testSetExistingAndWritablePropertyWorksCorrectly()
    {
        $this->testModel->readWriteProperty = 'ABC';
        $this->assertEquals('ABC', $this->testModel->readWriteProperty);
    }

    public function testSetExistingButReadOnlyPropertyThrowsInaccessiblePropertyException()
    {
        $this->expectException(InaccessiblePropertyException::class);
        $this->testModel->readOnlyProperty = 1;
    }

    public function testIdExists()
    {
        $this->assertObjectHasAttribute('id', $this->testModel);
    }

    public function testIdHasSetter(){
        $this->testModel->id = 1;
    }

    public function testIdHasGetter(){
        $this->testModel->id = 1;
        $this->assertEquals(1, $this->testModel->id);
    }

    public function testIntegerCheck(){
        $this->expectException(\InvalidArgumentException::class);
        $model = $this->testModel;
        $model::checkPropertyIsInteger('a');
    }

    public function testStringCheck(){
        $this->expectException(\InvalidArgumentException::class);
        $model = $this->testModel;
        $model::checkPropertyIsString(1);
    }

    public function testBoolCheck(){
        $this->expectException(\InvalidArgumentException::class);
        $model = $this->testModel;
        $model::checkPropertyIsBoolean('false');
    }
}
