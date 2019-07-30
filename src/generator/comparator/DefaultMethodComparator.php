<?php declare(strict_types=1);

namespace cristianoc72\codegen\generator\comparator;

use cristianoc72\codegen\model\PhpMethod;
use phootwork\lang\Comparator;

/**
 * Default property comparator
 *
 * Orders them by static first, then visibility and last by property name
 */
class DefaultMethodComparator extends AbstractMemberComparator
{

    /**
     * @param PhpMethod $a
     * @param PhpMethod $b
     *
     * @return int
     *
     * @psalm-suppress MoreSpecificImplementedParamType
     */
    public function compare($a, $b): int
    {
        if ($a->isStatic() !== $isStatic = $b->isStatic()) {
            return $isStatic ? 1 : -1;
        }
        
        return $this->compareMembers($a, $b);
    }
}
