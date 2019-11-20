<?php declare(strict_types=1);

namespace cristianoc72\codegen\generator\builder\parts;

use cristianoc72\codegen\model\AbstractModel;

trait TypeBuilderPart
{
    /** @var string[] */
    protected static $noTypeHints = [
        'string', 'int', 'integer', 'bool', 'boolean', 'float', 'double', 'object', 'mixed', 'resource',
    ];

    /** @var string[] */
    protected static $php7typeHints = [
        'string', 'int', 'integer', 'bool', 'boolean', 'float', 'double',
    ];

    /** @var array */
    protected static $typeHintMap = [
        'string' => 'string',
        'int' => 'int',
        'integer' => 'int',
        'bool' => 'bool',
        'boolean' => 'bool',
        'float' => 'float',
        'double' => 'float',
    ];

    /**
     * @param AbstractModel $model
     *
     * @return null|string
     *
     * @psalm-suppress UndefinedMethod
     * Concrete model classes using this trait always have `getType()` method.
     */
    private function getType(AbstractModel $model): ?string
    {
        $type = $model->getType();
        if (!empty($type) && false === strpos($type, '|')
                && (!in_array($type, self::$noTypeHints)
                    || (in_array($type, self::$php7typeHints)))
                ) {
            if (isset(self::$typeHintMap[$type])) {
                return self::$typeHintMap[$type];
            }

            return $type;
        }

        return null;
    }
}
