<?php
declare(strict_types = 1);
namespace Pattern\Functional;

/**
 * Class Functional
 * @package Pattern
 */
abstract class Struct {
  /**
   * @var array
   */
  public $data = [];

  /**
   * @param array $items
   * @param       $func
   * @return array
   * @throws Functional\Exception
   */
  public function map(callable $func): array {
    $results = [];
    foreach ($this->data as $key => $item) {
      $results[] = call_user_func($func, $item, $key);
    }

    return $results;
  }

  /**
   * @param array $items
   * @param       $func
   * @throws Functional\Exception
   */
  public function each(callable $func) {
    foreach ($this->data as $key => $item) {
      call_user_func($func, $item, $key);
    }
  }

  /**
   * @param $collection
   * @return array
   */
  public function flatten(Struct $collection): array {
    $stack  = [$collection];
    $result = [];
    while (!empty($stack)) {
      $item = array_shift($stack);
      if (is_array($item)) {
        foreach ($item as $element) {
          array_unshift($stack, $element);
        }
      } else {
        array_unshift($result, $item);
      }
    }

    return $result;
  }

  /**
   * Return a new function that composes all functions in $functions into a single callable
   * @param \callable[] ...$functions
   * @return mixed
   */
  public static function compose(callable ...$functions) {
    return array_reduce(
      $functions,
      function($carry, $item) {
        return function($x) use ($carry, $item) {
          return call_user_func($item, $carry($x));
        };
      }
    );
  }
}

