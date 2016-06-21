<?php
declare(strict_types = 1);
namespace Pattern\Functional;
use Pattern\Functional;

/**
 * Class Collection
 */
class Collection extends Functional {
  /**
   * @var array
   */
  private $a = [];

  /**
   * Collection constructor.
   * @param array $collection
   */
  public function __construct(array $collection) {
    $this->a = $collection;
  }

  /**
   * @param array $collection
   * @param string $name
   * @return array
   */
  public static function pluckFrom(array $collection, string $name) {
    return (new self($collection))->pluck($name);
  }

  /**
   * @param string $name
   * @return array
   * @throws Exception
   */
  public function pluck(string $name) {
    return parent::map(
      $this->a, function ($item, $key) use ($name) {
      return $key !== $name ?: $item;
    });
  }
}
