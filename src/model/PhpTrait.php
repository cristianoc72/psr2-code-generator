<?php declare(strict_types=1);

namespace cristianoc72\codegen\model;

use cristianoc72\codegen\model\parts\PropertiesPart;
use cristianoc72\codegen\model\parts\TraitsPart;

/**
 * Represents a PHP trait.
 *
 * @author Thomas Gossmann
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
class PhpTrait extends AbstractPhpStruct implements GenerateableInterface, TraitsInterface, PropertiesInterface
{
    use PropertiesPart;
    use TraitsPart;

    /**
     * Creates a new PHP trait
     *
     * @param string $name qualified name
     *
     * @psalm-suppress PropertyNotSetInConstructor
     */
    public function __construct(string $name = null)
    {
        parent::__construct($name);
        $this->initProperties();
        $this->initTraits();
    }

    /**
     * @inheritDoc
     */
    public function generateDocblock(): self
    {
        parent::generateDocblock();

        $this->properties->each(function (string $key, PhpProperty $element): void {
            $element->generateDocblock();
        });

        return $this;
    }
}
