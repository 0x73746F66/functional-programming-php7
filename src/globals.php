<?php
declare(strict_types = 1);
use Pattern\Functional;

if (!function_exists('array_each')) {
  /**
   * @param array $items
   * @param $func
   * @throws Functional\Exception
   */
  function array_each(array $items, $func): void {
    Functional::each($items, $func);
  }
}
if (!function_exists('array_map')) {
  /**
   * @param array $items
   * @param $func
   * @return array
   * @throws Functional\Exception
   */
  function array_map(array $items, $func): array {
    return Functional::map($items, $func);
  }
}
if (!function_exists('array_pluck')) {
  /**
   * @param array $items
   * @param $name
   * @return array
   */
  function array_pluck(array $items, $name) {
    return Functional\Collection::pluckFrom($items, $name);
  }
}
