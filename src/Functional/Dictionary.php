<?php
declare(strict_types = 1);
namespace Pattern\Functional;

use Pattern\Functional;

/**
 * Class Dictionary
 *
 * @package Pattern\Functional
 */
class Dictionary extends Functional {
  /**
   * @var array
   */
  private $data = [];

  /**
   * Dictionary constructor.
   *
   * @param array $data
   */
  public function __construct(array $data) {
    $this->data = $data;
  }

  /**
   * @param array $data
   * @throws Exception
   */
  public function validate(array $data): void {
    if (array_keys($data) === array_keys(array_values($data))) {
      throw new Functional\Exception(
        'Dictionary::validate Dictionary must be indexed by keys', 0, E_USER_ERROR, __FILE__, __LINE__
      );
    }
  }

  /**
   * @param string $key
   * @return bool
   */
  public function hasValue(string $key): bool {
    return array_key_exists($key, $this->data);
  }

  /**
   * @param string $key
   * @param null   $default
   * @return null
   */
  public function getValue(string $key, $default = NULL) {
    if ($this->hasValue($key)) {
      return $this->data[$key];
    }

    return $default;
  }

  /**
   * @param array  $collection
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
      $this->data, function ($item, $key) use ($name) {
        return $key !== $name ?: $item;
      }
    );
  }

  /**
   * @param string $key
   * @param        $value
   * @return Dictionary
   * @throws Exception
   */
  public function withValue(string $key, $value): Dictionary {
    if (!is_string($key)) {
      throw new Functional\Exception(
        'Dictionary::validate Dictionary $key must be a string', 0, E_USER_ERROR, __FILE__, __LINE__
      );
    }
    $this->validate([$key => $value]);
    $copy = clone $this;
    $copy->data[$key] = $value;

    return $copy;
  }

  /**
   * @param $key
   * @return Dictionary
   */
  public function withoutValue($key): Dictionary {
    $copy = clone $this;
    unset($copy->data[$key]);

    return $copy;
  }
}