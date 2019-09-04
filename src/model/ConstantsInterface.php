<?php declare(strict_types=1);

namespace cristianoc72\codegen\model;

use phootwork\collection\Map;
use phootwork\collection\Set;

/**
 * Interface to all php structs that can have constants.
 *
 * Implementation is realized in the `ConstantsPart`
 *
 * @author Thomas Gossmann
 */
interface ConstantsInterface
{
    /**
     * Sets a collection of constants.
     *
     * @param array|PhpConstant[] $constants
     *
     * @return $this
     */
    public function setConstants(array $constants);

    /**
     * Adds a constant.
     *
     * @param PhpConstant $constant
     *
     * @return $this
     */
    public function setConstant(PhpConstant $constant);

    /**
     * Adds a constant passing its name.
     *
     * @param string $name  constant name
     * @param string $value
     *
     * @return $this
     */
    public function setConstantByName(string $name, ?string $value = null);

    /**
     * Removes a constant.
     *
     * @param PhpConstant $constant
     *
     * @throws \InvalidArgumentException If the constant cannot be found
     *
     * @return $this
     */
    public function removeConstant(PhpConstant $constant);

    /**
     * Removes a constant passing its name.
     *
     * @param string $name constant name
     *
     * @throws \InvalidArgumentException If the constant cannot be found
     *
     * @return $this
     */
    public function removeConstantByName(string $name);

    /**
     * Checks whether a constant exists.
     *
     * @param PhpConstant $constant
     *
     * @return bool
     */
    public function hasConstant(PhpConstant $constant): bool;

    /**
     * Checks whether a constant exists.
     *
     * @param string $name
     *
     * @return bool
     */
    public function hasConstantByName(string $name): bool;

    /**
     * Returns a constant.
     *
     * @param string $name
     *
     * @throws \InvalidArgumentException If the constant cannot be found
     *
     * @return PhpConstant
     */
    public function getConstant(string $name): PhpConstant;

    /**
     * Returns constants.
     *
     * @return Map
     */
    public function getConstants(): Map;

    /**
     * Returns all constant names.
     *
     * @return Set
     */
    public function getConstantNames(): Set;

    /**
     * Clears all constants.
     *
     * @return $this
     */
    public function clearConstants();
}
