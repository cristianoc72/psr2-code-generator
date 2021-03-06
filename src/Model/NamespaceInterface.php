<?php declare(strict_types=1);

namespace Susina\Codegen\Model;

/**
 * Represents models that have a namespace.
 *
 * @author Thomas Gossmann
 */
interface NamespaceInterface
{
    /**
     * Sets the namespace.
     *
     * @return $this
     */
    public function setNamespace(string $namespace);

    /**
     * Returns the namespace.
     */
    public function getNamespace(): string;
}
