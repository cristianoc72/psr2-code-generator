<?php declare(strict_types=1);

namespace cristianoc72\codegen\generator\comparator;

use cristianoc72\codegen\model\AbstractPhpMember;
use phootwork\lang\Comparator;

abstract class AbstractMemberComparator implements Comparator
{
    protected function compareMembers(AbstractPhpMember $a, AbstractPhpMember $b): int
    {
        if (($aV = $a->getVisibility()) !== $bV = $b->getVisibility()) {
            $aI = 'public' === $aV ? 3 : ('protected' === $aV ? 2 : 1);
            $bI = 'public' === $bV ? 3 : ('protected' === $bV ? 2 : 1);

            return $aI > $bI ? -1 : 1;
        }

        return strcasecmp($a->getName(), $b->getName());
    }
}
