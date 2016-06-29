<?php
use PHPUnit\Framework\TestCase;
use Pattern\Functional;

class FunctionalTest extends TestCase {

  public function testMap() {
    $items = ['one'=>1,'two'=>2,'three'=>3];

    $results = Functional::map($items, function($item) {
      return $item;
    });

    $this->assertSame(array_values($items), $results);
  }

  public function testMapKeys() {
    $items = ['one'=>1,'two'=>2,'three'=>3];

    $results = Functional::map($items, function($item, $key) {
      return $key;
    });

    $this->assertSame(array_keys($items), $results);
  }

  public function testMapCanHandlePassByRef() {
    $results = [];
    $items = ['one'=>1,'two'=>2,'three'=>3];

    Functional::map($items, function($item, $key) use (&$results) {
      $results[$key] = $item;
    });

    $this->assertSame($items, $results);
  }

  public function testEach() {
    $results = [];
    $items = ['one'=>1,'two'=>2,'three'=>3];

    Functional::each($items, function($item, $key) use (&$results) {
      $results[$key] = $item;
    });

    $this->assertSame($items, $results);
  }

  public function testFlatten() {
    $test = [1=>1,'two'=>2,['three'=>3]];
    $items = [1,2,3];

    $results = Functional::flatten($test);

    $this->assertSame($items, $results);
  }
}

