<?php declare(strict_types=1);

namespace Susina\Codegen\Model\Parts;

use phootwork\collection\Map;
use phootwork\collection\Set;
use Susina\Codegen\Model\PhpConstant;

/**
 * Constants part.
 *
 * For all models that can contain constants
 *
 * @author Thomas Gossmann
 * @author Cristiano Cinotti
 */
trait ConstantsPart
{
    /** @var Map */
    private $constants;

    /**
     * Sets a collection of constants.
     *
     * @param array|PhpConstant[] $constants
     *
     * @return $this
     */
    public function setConstants(array $constants): self
    {
        $normalizedConstants = [];
        foreach ($constants as $name => $value) {
            if ($value instanceof PhpConstant) {
                $name = $value->getName();
            } else {
                $constValue = $value;
                $value = new PhpConstant($name);
                $value->setValue($constValue);
            }

            $normalizedConstants[$name] = $value;
        }

        $this->constants->setAll($normalizedConstants);

        return $this;
    }

    /**
     * Create a PhpConstant instance and adds it to the constants Map.
     *
     * @param string $name  constant name
     * @param mixed  $value
     *
     * @return $this
     */
    public function setConstantByName(string $name, $value = null, bool $isExpression = false): self
    {
        $this->constants->set($name, new PhpConstant($name, $value, $isExpression));

        return $this;
    }

    /**
     * Add a PhpConstant object.
     *
     * @return $this
     */
    public function setConstant(PhpConstant $constant): self
    {
        $this->constants->set($constant->getName(), $constant);

        return $this;
    }

    /**
     * Removes a constant.
     *
     * @throws \InvalidArgumentException If the constant cannot be found
     *
     * @return $this
     */
    public function removeConstant(PhpConstant $constant): self
    {
        return $this->removeConstantByName($constant->getName());
    }

    /**
     * Removes a constant.
     *
     * @param string $name constant name
     *
     * @throws \InvalidArgumentException If the constant cannot be found
     *
     * @return $this
     */
    public function removeConstantByName(string $name): self
    {
        if (!$this->constants->has($name)) {
            throw new \InvalidArgumentException(sprintf('The constant "%s" does not exist.', $name));
        }
        $this->constants->remove($name);

        return $this;
    }

    /**
     * Checks whether a constant exists.
     */
    public function hasConstant(PhpConstant $constant): bool
    {
        return $this->constants->has($constant->getName());
    }

    /**
     * Checks whether a constant exists.
     *
     * @param string $name constant name
     */
    public function hasConstantByName(string $name): bool
    {
        return $this->constants->has($name);
    }

    /**
     * Returns a constant.
     *
     * @param string $name constant name
     *
     * @throws \InvalidArgumentException If the constant cannot be found
     */
    public function getConstant(string $name): PhpConstant
    {
        if (!$this->constants->has($name)) {
            throw new \InvalidArgumentException(sprintf('The constant "%s" does not exist.', $name));
        }

        return $this->constants->get($name);
    }

    /**
     * Returns all constants.
     */
    public function getConstants(): Map
    {
        return $this->constants;
    }

    /**
     * Returns all constant names.
     */
    public function getConstantNames(): Set
    {
        return $this->constants->keys();
    }

    /**
     * Clears all constants.
     *
     * @return $this
     */
    public function clearConstants(): self
    {
        $this->constants->clear();

        return $this;
    }

    private function initConstants(): void
    {
        $this->constants = new Map();
    }
}
