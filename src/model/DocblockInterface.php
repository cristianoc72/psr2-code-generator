<?php declare(strict_types=1);

namespace cristianoc72\codegen\model;

use gossi\docblock\Docblock;

/**
 * Docblock interface to represent models that have a docblock.
 *
 * Implementation is realized in the `DocblockPart`
 *
 * @author Thomas Gossmann
 */
interface DocblockInterface
{
    /**
     * Sets a docblock.
     *
     * @param Docblock|string $doc
     *
     * @return $this
     */
    public function setDocblock($doc);

    /**
     * Returns a docblock.
     */
    public function getDocblock(): Docblock;

    /**
     * Generates a docblock from provided information.
     *
     * @return $this
     */
    public function generateDocblock();
}
