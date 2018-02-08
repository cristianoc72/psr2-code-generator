<?php
namespace cristianoc72\codegen\generator;

use cristianoc72\codegen\config\CodeGeneratorConfig;
use cristianoc72\codegen\generator\utils\Writer;
use cristianoc72\codegen\model\AbstractModel;

/**
 * Model Generator
 *
 * @author Thomas Gossmann
 */
class ModelGenerator
{

    /** @var Writer */
    private $writer;
    
    /** @var BuilderFactory */
    private $factory;
    
    /** @var CodeGeneratorConfig */
    private $config;

    /**
     *
     * @param CodeGeneratorConfig|array $config
     */
    public function __construct($config = null)
    {
        if (is_array($config)) {
            $this->config = new CodeGeneratorConfig($config);
        } elseif ($config instanceof CodeGeneratorConfig) {
            $this->config = $config;
        } else {
            $this->config = new CodeGeneratorConfig(['generateDocblock' => false]);
        }
        
        $this->writer = new Writer();
        $this->factory = new BuilderFactory($this);
    }
    
    /**
     * @return CodeGeneratorConfig
     */
    public function getConfig()
    {
        return $this->config;
    }
    
    /**
     * @return Writer
     */
    public function getWriter()
    {
        return $this->writer;
    }
    
    /**
     * @return BuilderFactory
     */
    public function getFactory()
    {
        return $this->factory;
    }

    /**
     * @param AbstractModel $model
     * @return string
     */
    public function generate(AbstractModel $model)
    {
        $this->writer->reset();
        
        $builder = $this->factory->getBuilder($model);
        $builder->build($model);

        return $this->writer->getContent();
    }
}
