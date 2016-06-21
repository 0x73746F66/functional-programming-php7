<?php
declare(strict_types = 1);
use Pattern\Functional;

if (!function_exists('each')) {
  /**
   * @param array $items
   * @param $func
   * @throws Functional\Exception
   */
  function each(array $items, $func): void {
    Functional::each($items, $func);
  }
}
if (!function_exists('map')) {
  /**
   * @param array $items
   * @param $func
   * @return array
   * @throws Functional\Exception
   */
  function map(array $items, $func): array {
    return Functional::map($items, $func);
  }
}
if (!function_exists('pluck')) {
  /**
   * @param array $items
   * @param $name
   * @return array
   */
  function pluck(array $items, $name) {
    return Functional\Collection::pluckFrom($items, $name);
  }
}
