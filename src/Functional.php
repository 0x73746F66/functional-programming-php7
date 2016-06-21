<?php
declare(strict_types = 1);
namespace Pattern;

/**
 * Class Functional
 *
 * @package Pattern
 */
abstract class Functional {
  /**
   * @param array $items
   * @param       $func
   * @return array
   * @throws Functional\Exception
   */
  public static function map(array $items, callable $func): array {
    $results = [];
    foreach ($items as $key => $item) {
      $results[] = call_user_func($func, $item, $key);
    }

    return $results;
  }

  /**
   * @param array $items
   * @param       $func
   * @throws Functional\Exception
   */
  public static function each(array $items, callable $func): void {
    foreach ($items as $key => $item) {
      call_user_func($func, $item, $key);
    }
  }
}

