<?php declare(strict_types=1);

namespace cristianoc72\codegen\generator\comparator;

use cristianoc72\codegen\model\PhpConstant;
use phootwork\lang\Comparator;

/**
 * Default property comparator.
 *
 * Orders them by lower cased first, then upper cased
 */
class DefaultConstantComparator implements Comparator
{
    /** @var DefaultUseStatementComparator */
    private $comparator;

    public function __construct()
    {
        $this->comparator = new DefaultUseStatementComparator();
    }

    /**
     * @param PhpConstant $a
     * @param PhpConstant $b
     *
     * @psalm-suppress MoreSpecificImplementedParamType
     */
    public function compare($a, $b): int
    {
        return $this->comparator->compare($a->getName(), $b->getName());
    }
}
