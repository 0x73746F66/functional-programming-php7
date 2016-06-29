<?php
use PHPUnit\Framework\TestCase;
use Pattern\Functional;
use Pattern\Functional\Set;

class SetTest extends TestCase {

  public function testSet() {
    $items = ['nsw', 'vic', 'qld', 'wa', 'sa', 'tas'];
    $results = new Set($items);

    $this->assertSame($items, $results->getData());
  }

  public function testSetHasValue() {
    $items = ['nsw', 'vic', 'qld', 'wa', 'sa', 'tas'];
    $results = new Set($items);

    $this->assertTrue($results->hasValue('vic'));
    $this->assertFalse($results->hasValue('VIC'));
    $this->assertFalse($results->hasValue(''));
  }

}

