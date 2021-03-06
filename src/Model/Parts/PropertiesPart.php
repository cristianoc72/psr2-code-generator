<?php declare(strict_types=1);

namespace Susina\Codegen\Model\Parts;

use phootwork\collection\Map;
use phootwork\collection\Set;
use Susina\Codegen\Model\PhpProperty;

/**
 * Properties part.
 *
 * For all models that can have properties
 *
 * @author Thomas Gossmann
 */
trait PropertiesPart
{
    /** @var Map */
    private $properties;

    /**
     * Sets a collection of properties.
     *
     * @param PhpProperty[] $properties
     *
     * @return $this
     */
    public function setProperties(array $properties): self
    {
        $this->clearProperties();
        foreach ($properties as $property) {
            $this->setProperty($property);
        }

        return $this;
    }

    /**
     * Adds a property.
     *
     * @return $this
     */
    public function setProperty(PhpProperty $property): self
    {
        $property->setParent($this);
        $this->properties->set($property->getName(), $property);

        return $this;
    }

    /**
     * Removes a property.
     *
     * @throws \InvalidArgumentException If the property cannot be found
     *
     * @return $this
     */
    public function removeProperty(PhpProperty $property): self
    {
        return $this->removePropertyByName($property->getName());
    }

    /**
     * Removes a property.
     *
     * @param string $name property name
     *
     * @throws \InvalidArgumentException If the property cannot be found
     *
     * @return $this
     */
    public function removePropertyByName(string $name): self
    {
        if (!$this->properties->has($name)) {
            throw new \InvalidArgumentException(sprintf('The property "%s" does not exist.', $name));
        }
        $p = $this->properties->get($name);
        $p->setParent(null);
        $this->properties->remove($name);

        return $this;
    }

    /**
     * Checks whether a property exists.
     *
     * @return bool `true` if a property exists and `false` if not
     */
    public function hasProperty(PhpProperty $property): bool
    {
        return $this->hasPropertyByName($property->getName());
    }

    /**
     * Checks whether a property exists.
     *
     * @param string $name property name
     *
     * @return bool `true` if a property exists and `false` if not
     */
    public function hasPropertyByName(string $name): bool
    {
        return $this->properties->has($name);
    }

    /**
     * Returns a property.
     *
     * @param string $name property name
     *
     * @throws \InvalidArgumentException If the property cannot be found
     */
    public function getProperty(string $name): PhpProperty
    {
        if (!$this->properties->has($name)) {
            throw new \InvalidArgumentException(sprintf('The property "%s" does not exist.', $name));
        }

        return $this->properties->get($name);
    }

    /**
     * Returns a collection of properties.
     */
    public function getProperties(): Map
    {
        return $this->properties;
    }

    /**
     * Returns all property names.
     */
    public function getPropertyNames(): Set
    {
        return $this->properties->keys();
    }

    /**
     * Clears all properties.
     *
     * @return $this
     */
    public function clearProperties(): self
    {
        $this->properties->each(function (string $key, PhpProperty $element): void {
            $element->setParent(null);
        });
        $this->properties->clear();

        return $this;
    }

    private function initProperties(): void
    {
        $this->properties = new Map();
    }
}
