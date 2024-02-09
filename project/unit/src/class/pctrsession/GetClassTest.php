<?php
use PHPUnit\Framework\TestCase;

define("RACINE_UNIT", dirname(__FILE__)."/../../..");
require_once(RACINE_UNIT . '/config_path.php');
require_once(RACINE_UNIT . '/function_test.php');
require_once(RACINE_WWW . '/src/class/pctrsession/GetClass.php');

/**
 * ClassNameTest
 * @group group
 */
class GetClassTest extends TestCase
{

    protected GetClass|null $object;

    protected function setUp(): void {
        $this->object = new GetClass();
        $this->test();
    }

    private function test():void {
        $this->testGetTab();
        $this->testIsKeyExist();
        $this->testSetValueInt();
        $this->testGetValueInt();
        $this->testSetValueSt();
        $this->testGetValueSt();
        $this->testSetValueBl();
        $this->testGetValueBl();
        $this->testSetValueFlt();
        $this->testGetValueFlt();
        $this->testDel();
        $this->testDelAll();
    }
    
    public function testGetTab(): void {
        $testFunction = $this->object->getTab();
        $this->assertNotNull($testFunction);
        $this->assertIsArray($testFunction);
    }
    
    public function testIsKeyExist(): void {
        foreach (array_string_all() as $value) {
            $testFunction = $this->object->isKeyExist($value);
            $this->assertNotNull($testFunction);
            $this->assertIsBool($testFunction);
        }
        for ($i=-10; $i < 10; $i++) {
            $testFunction = $this->object->isKeyExist($i);
            $this->assertNotNull($testFunction);
            $this->assertIsBool($testFunction);
        }
    }

    public function testSetValueInt():void {
        foreach (array_string_all() as $value) {
            for ($j=-10; $j < 10; $j++) {
                $this->object->setValueInt($j, $value);
            }
        }
        for ($i=-10; $i < 10; $i++) { 
            for ($j=-10; $j < 10; $j++) {
                $this->object->setValueInt($j, $i);
            }
        }
        $this->assertTrue(true);
    }
    
    public function testGetValueInt():void {
        foreach (array_string_all() as $value) {
            $testFunction = $this->object->getValueInt($value);
            $this->assertNotNull($testFunction);
            $this->assertIsInt($testFunction);
        }
        for ($i=-10; $i < 10; $i++) { 
            $testFunction = $this->object->getValueInt($i);
            $this->assertNotNull($testFunction);
            $this->assertIsInt($testFunction);
        }
    }
    
    public function testSetValueSt():void {
        foreach (array_string_all() as $value) {
            foreach (array_string_all() as $value1) {
                $this->object->setValueSt($value1, $value);
            }
        }
        for ($i=-10; $i < 10; $i++) { 
            foreach (array_string_all() as $value1) {
                $this->object->setValueSt($value1, $i);
            }
        }
        $this->assertTrue(true);
    }
    
    public function testGetValueSt():void {
        foreach (array_string_all() as $value) {
            $testFunction = $this->object->getValueSt($value);
            $this->assertNotNull($testFunction);
            $this->assertIsString($testFunction);
        }
        for ($i=-10; $i < 10; $i++) { 
            $testFunction = $this->object->getValueSt($i);
            $this->assertNotNull($testFunction);
            $this->assertIsString($testFunction);
        }
    }

    public function testSetValueBl():void {
        foreach (array_string_all() as $value) {
            $this->object->setValueBl(true, $value);
            $this->object->setValueBl(false, $value);
        }
        for ($i=-10; $i < 10; $i++) { 
            $this->object->setValueBl(true, $i);
            $this->object->setValueBl(false, $i);
        }
        $this->assertTrue(true);
    }
    
    public function testGetValueBl():void {
        foreach (array_string_all() as $value) {
            $testFunction = $this->object->getValueBl($value);
            $this->assertNotNull($testFunction);
            $this->assertIsBool($testFunction);
        }
        for ($i=-10; $i < 10; $i++) { 
            $testFunction = $this->object->getValueBl($i);
            $this->assertNotNull($testFunction);
            $this->assertIsBool($testFunction);
        }
    }

    public function testSetValueFlt():void {
        foreach (array_string_all() as $value) {
            for ($j=-10; $j < 10; $j++) {
                $this->object->setValueFlt($j, $value);
            }
        }
        for ($i=-10; $i < 10; $i++) { 
            for ($j=-10; $j < 10; $j++) {
                $this->object->setValueFlt($j, $i);
            }
        }
        $this->assertTrue(true);
    }
    
    public function testGetValueFlt():void {
        foreach (array_string_all() as $value) {
            $testFunction = $this->object->getValueFlt($value);
            $this->assertNotNull($testFunction);
            $this->assertIsFloat($testFunction);
        }
        for ($i=-10; $i < 10; $i++) { 
            $testFunction = $this->object->getValueFlt($i);
            $this->assertNotNull($testFunction);
            $this->assertIsFloat($testFunction);
        }
    }
    
    public function testDelAll(): void {
        $this->object->delAll();
        $this->assertTrue(true);
    }
    
    public function testDel(): void {
        foreach (array_string_all() as $value) {
            $this->object->del($value);
        }
        for ($i=-10; $i < 10; $i++) { 
            $this->object->del($i);
        }
        $this->assertTrue(true);
    }

}
