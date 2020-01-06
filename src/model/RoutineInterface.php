<?php declare(strict_types=1);

namespace cristianoc72\codegen\model;

interface RoutineInterface
{
    /**
     * Sets a collection of parameters.
     *
     * Note: clears all parameters before setting the new ones
     *
     * @param PhpParameter[] $parameters
     *
     * @return $this
     */
    public function setParameters(array $parameters);

    /**
     * Adds a parameter.
     *
     * @return $this
     */
    public function addParameter(PhpParameter $parameter);

    /**
     * Checks whether a parameter exists.
     *
     * @param string $name parameter name
     *
     * @return bool `true` if a parameter exists and `false` if not
     */
    public function hasParameter(string $name): bool;

    /**
     * A quick way to add a parameter which is created from the given parameters.
     *
     * @param mixed $defaultValue omit the argument to define no default value
     *
     * @return $this
     */
    public function addSimpleParameter(string $name, ?string $type = null, $defaultValue = null);

    /**
     * A quick way to add a parameter with description which is created from the given parameters.
     *
     * @param mixed $defaultValue omit the argument to define no default value
     *
     * @return $this
     */
    public function addSimpleDescParameter(string $name, ?string $type = null, ?string $typeDescription = null, $defaultValue = null);

    /**
     * Returns a parameter by name.
     *
     * @throws \InvalidArgumentException
     */
    public function getParameterByName(string $name): PhpParameter;

    /**
     * Returns a parameter from a given position.
     *
     * @throws \InvalidArgumentException
     */
    public function getParameterByPosition(int $position): PhpParameter;

    /**
     * Replaces a parameter at a given position.
     *
     * @throws \InvalidArgumentException
     *
     * @return $this
     */
    public function replaceParameter(int $position, PhpParameter $parameter);

    /**
     * Remove a parameter.
     *
     * @return $this
     */
    public function removeParameter(PhpParameter $param);

    /**
     * Returns a collection of parameters.
     *
     * @return PhpParameter[]
     */
    public function getParameters(): array;

    /**
     * Set true if a reference is returned of false if not.
     *
     * @return $this
     */
    public function setReferenceReturned(bool $bool);

    /**
     * Returns whether a reference is returned.
     */
    public function isReferenceReturned(): bool;

    /**
     * Sets the body for this.
     *
     * @return $this
     */
    public function setBody(string $body);

    /**
     * Returns the body.
     */
    public function getBody(): string;

    /**
     * Returns the name of the routine.
     */
    public function getName(): string;
}
