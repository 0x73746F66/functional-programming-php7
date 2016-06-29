<?php
use PHPUnit\Framework\TestCase;
use Pattern\Functional;
use Pattern\Functional\Dictionary;

class DictionaryTest extends TestCase {

  public function testDictionary() {
    $items = [
      'nsw' => 'sydney',
      'vic' => 'melbourne',
      'qld' => 'brisbane',
      'wa'  => 'perth',
      'sa'  => 'adelaide',
      'tas' => 'hobart'
    ];
    $results = new Dictionary($items);

    $this->assertSame($items, $results->getData());
  }

  public function testDictionaryHasValue() {
    $items = [
      'nsw' => 'sydney',
      'vic' => 'melbourne',
      'qld' => 'brisbane',
      'wa'  => 'perth',
      'sa'  => 'adelaide',
      'tas' => 'hobart'
    ];
    $results = new Dictionary($items);

    $this->assertTrue($results->hasValue('vic'));
    $this->assertFalse($results->hasValue('melbourne'));
    $this->assertFalse($results->hasValue(''));
  }

  public function testDictionaryGetValue() {
    $items = [
      'nsw' => 'sydney',
      'vic' => 'melbourne',
      'qld' => 'brisbane',
      'wa'  => 'perth',
      'sa'  => 'adelaide',
      'tas' => 'hobart'
    ];
    $results = new Dictionary($items);


    $this->assertSame('hobart',$results->getValue('tas'));
    $this->assertNotSame('hobart',$results->getValue('vic'));
  }

  public function testDictionaryPluck() {
    $items = [
      'nsw' => 'sydney',
      'vic' => 'melbourne',
      'qld' => 'brisbane',
      'wa'  => 'perth',
      'sa'  => 'adelaide',
      'tas' => 'hobart'
    ];
    $results = new Dictionary($items);


    $this->assertSame('melbourne',$results->pluck('vic'));
  }

  public function testDictionaryPluckFrom() {
    $items = [
      'nsw' => 'sydney',
      'vic' => 'melbourne',
      'qld' => 'brisbane',
      'wa'  => 'perth',
      'sa'  => 'adelaide',
      'tas' => 'hobart'
    ];

    $this->assertSame('melbourne', Dictionary::pluckFrom($items, 'vic'));
  }

}

