<?php
declare(strict_types = 1);
namespace Pattern;


/**
 * Class Functional
 */
abstract class Functional {
  /**
   * @param array $items
   * @param $func
   * @return array
   * @throws Functional\Exception
   */
  public static function map(array $items, $func): array {
    if (!is_callable($func)) {
      throw new Functional\Exception('Functional::map argument 2 ($func) must be of type Closure', 0, E_USER_ERROR,
        __FILE__, __LINE__);
    }
    $results = [];
    foreach ($items as $key => $item) {
      $results[] = call_user_func($func, $item, $key);
    }

    return $results;
  }

  /**
   * @param array $items
   * @param $func
   * @throws Functional\Exception
   */
  public static function each(array $items, $func): void {
    if (!is_callable($func)) {
      throw new Functional\Exception('Functional::each argument 2 ($func) must be of type Closure', 0, E_USER_ERROR,
        __FILE__, __LINE__);
    }
    foreach ($items as $key => $item) {
      call_user_func($func, $item, $key);
    }
  }
}

