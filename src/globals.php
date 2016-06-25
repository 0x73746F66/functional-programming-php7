<?php
declare(strict_types = 1);
use Pattern\Functional;

if (!function_exists('array_each')) {
  /**
   * @param array $items
   * @param       $func
   * @throws Functional\Exception
   */
  function array_each(array $items, $func): void {
    Functional::each($items, $func);
  }
}
if (!function_exists('array_map')) {
  /**
   * @param array $items
   * @param       $func
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
   * @param       $name
   * @return array
   */
  function array_pluck(array $items, $name) {
    return Functional\Dictionary::pluckFrom($items, $name);
  }
}

if (!function_exists('array_flatten')) {
  /**
   * @param array $items
   * @return array
   */
  function array_flatten(array $items): array {
    return Functional::flatten($items);
  }
}

if (!function_exists('compose')) {
  /**
   * @param callable[] ...$functions
   * @return mixed
   */
  function compose(callable ...$functions) {
    $args = func_get_args();

    return call_user_func_array(['Functional', 'compose'], $args);
  }
}
