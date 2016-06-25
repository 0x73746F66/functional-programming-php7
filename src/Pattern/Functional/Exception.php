<?php
declare(strict_types = 1);
namespace Pattern\Functional;

/**
 * Class Exception
 *
 * @package Pattern\Functional
 */
class Exception extends \Exception {
  /**
   * @var int
   */
  protected $severity;

  /**
   * Exception constructor.
   *
   * @param string $message
   * @param int    $code
   * @param int    $severity
   * @param string $filename
   * @param int    $lineno
   */
  public function __construct(string $message, int $code, int $severity, string $filename, int $lineno) {
    $this->message = $message;
    $this->code = $code;
    $this->severity = $severity;
    $this->file = $filename;
    $this->line = $lineno;
  }

  /**
   * @return int
   */
  public function getSeverity(): int {
    return $this->severity;
  }
}
