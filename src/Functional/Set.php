<?php
declare(strict_types = 1);
namespace Pattern\Functional;

use Pattern\Functional;

/**
 * Class Set
 *
 * @package Pattern\Functional
 */
class Set extends Functional {
  /**
   * @var array
   */
  private $data = [];
  
  /**
   * Set constructor.
   *
   * @param array $data
   */
  public function __construct(array $data) {
    $dataClean = array_unique($data, SORT_REGULAR);
    $this->validate($dataClean);
    $this->data = $dataClean;
  }

  /**
   * @param array $data
   * @throws Exception
   */
  public function validate(array $data): void {
    if (array_values($data) !== $data) {
      throw new Functional\Exception(
        'Set::validate Set structures cannot be indexed by keys', 0, E_USER_ERROR, __FILE__, __LINE__
      );
    }
  }

  /**
   * @param array $data
   * @throws Exception
   */
  public function replaceData(array $data): void {
    $dataClean = array_unique($data, SORT_REGULAR);
    $this->validate($dataClean);
    $this->data = $dataClean;
  }

  /**
   * @param $value
   * @return bool
   */
  public function hasValue($value): bool {
    return in_array($value, $this->data);
  }

  /**
   * @param $value
   * @return Set
   */
  public function withValue($value): Set {
    if ($this->hasValue($value)) {
      return $this;
    }
    $copy = clone $this;
    array_push($copy->data, $value);

    return $copy;
  }

  /**
   * @param $value
   * @param $search
   * @return $this|Set
   * @throws Exception
   */
  public function withValueAfter($value, $search) {
    if ($this->hasValue($value)) {
      return $this;
    }
    $this->validate([$value]);
    $copy = clone $this;
    $key = array_search($search, $this->data);
    if (FALSE === $key) {
      array_push($copy->data, $value);
    } else {
      array_splice($copy->data, $key + 1, 0, $value);
    }

    return $copy;
  }

  /**
   * @param $value
   * @param $search
   * @return $this|Set
   * @throws Exception
   */
  public function withValueBefore($value, $search) {
    if ($this->hasValue($value)) {
      return $this;
    }
    $this->validate([$value]);
    $copy = clone $this;
    $key = array_search($search, $this->data);
    if (FALSE === $key) {
      array_unshift($copy->data, $value);
    } else {
      array_splice($copy->data, $key, 0, $value);
    }

    return $copy;
  }
}