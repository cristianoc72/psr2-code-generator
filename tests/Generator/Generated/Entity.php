<?php declare(strict_types=1);

namespace Susina\Codegen\Tests\Fixtures;

/**
 * Doc Comment.
 *
 * @author Johannes M. Schmitt <schmittjoh@gmail.com>
 */
abstract class Entity
{
    private $enabled = false;

    /**
     * @var integer
     */
    private $id;

    private static function bar()
    {
    }

    /**
     * Another doc comment.
     *
     * @param $a
     * @param array $b
     * @param \stdClass $c
     * @param string $d
     * @param callable $e
     */
    final public function __construct($a, array &$b, \stdClass $c, string $d = 'foo', callable $e)
    {
    }

    abstract protected function foo();
}
