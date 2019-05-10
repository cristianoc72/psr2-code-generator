<?php declare(strict_types=1);

namespace cristianoc72\codegen\model\parts;

/**
 * Long description part
 *
 * For all models that can have an additional long description
 *
 * @author Thomas Gossmann
 */
trait LongDescriptionPart
{

    /** @var string */
    private $longDescription = '';

    /**
     * Returns the long description
     *
     * @return string
     */
    public function getLongDescription(): string
    {
        return $this->longDescription;
    }

    /**
     * Sets the long description
     *
     * @param string $longDescription
     * @return $this
     */
    public function setLongDescription(string $longDescription): self
    {
        $this->longDescription = $longDescription;
        return $this;
    }
}
