<?php
declare(strict_types = 1);
namespace Pattern\Functional;

use Pattern\Functional;

/**
 * Class Set
 *
 * @package Pattern\Functional
 */
class OrderedList extends Functional {
  /**
   * @var string
   */
  private $sorter = 'sort';
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
    $this->data = $data;
  }

  /**
   * @param array $data
   * @throws Exception
   */
  public function validate(array $data): void {
    if (array_values($data) !== $data) {
      throw new Functional\Exception(
        'OrderedList::validate List structures cannot be indexed by keys', 0, E_USER_ERROR, __FILE__, __LINE__
      );
    }
  }

  /**
   * @param callable $sorter
   * @return OrderedList
   */
  public function withSorter(callable $sorter): OrderedList {
    if ($this->sorter === $sorter) {
      return $this;
    }
    $copy = clone $this;
    $copy->sorter = $sorter;

    return $copy;
  }

  /**
   * @return array
   */
  public function getData(): array {
    call_user_func_array($this->sorter, [&$this->data]);

    return $this->data;
  }
}