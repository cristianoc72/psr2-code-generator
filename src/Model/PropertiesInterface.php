<?php declare(strict_types=1);

namespace Susina\Codegen\Model;

use phootwork\collection\Map;
use phootwork\collection\Set;

interface PropertiesInterface
{
    /**
     * Sets a collection of properties.
     *
     * @param PhpProperty[] $properties
     *
     * @return $this
     */
    public function setProperties(array $properties);

    /**
     * Adds a property.
     *
     * @return $this
     */
    public function setProperty(PhpProperty $property);

    /**
     * Removes a property.
     *
     * @param PhpProperty $property property instance
     *
     * @throws \InvalidArgumentException If the property cannot be found
     *
     * @return $this
     */
    public function removeProperty(PhpProperty $property);

    /**
     * Removes a property by its name.
     *
     * @param string $name property instance
     *
     * @throws \InvalidArgumentException If the property cannot be found
     *
     * @return $this
     */
    public function removePropertyByName(string $name);

    /**
     * Checks whether a property exists.
     *
     * @return bool `true` if a property exists and `false` if not
     */
    public function hasProperty(PhpProperty $property): bool;

    /**
     * Checks whether a property exists.
     *
     * @param string $name property name
     *
     * @return bool `true` if a property exists and `false` if not
     */
    public function hasPropertyByName(string $name): bool;

    /**
     * Returns a property.
     *
     * @param string $name property name
     *
     * @throws \InvalidArgumentException If the property cannot be found
     */
    public function getProperty(string $name): PhpProperty;

    /**
     * Returns a collection of properties.
     */
    public function getProperties(): Map;

    /**
     * Returns all property names.
     */
    public function getPropertyNames(): Set;

    /**
     * Clears all properties.
     *
     * @return $this
     */
    public function clearProperties();
}
