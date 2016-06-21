<?php
declare(strict_types = 1);
namespace Pattern\Functional;

use Pattern\Functional;

/**
 * Class UnorderedList
 *
 * @package Pattern\Functional
 */
class UnorderedList extends Functional {
  /**
   * @var array
   */
  private $data = [];

  /**
   * UnorderedList constructor.
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
  public function validate(array $data) {
    if (array_values($data) !== $data) {
      throw new Functional\Exception(
        'UnorderedList::validate List structures cannot be indexed by keys', 0, E_USER_ERROR, __FILE__, __LINE__
      );
    }
  }

  /**
   * @return array
   */
  public function getData(): array {
    return $this->data;
  }
}