<?php declare(strict_types=1);

namespace cristianoc72\codegen\generator\builder;

use cristianoc72\codegen\config\GeneratorConfig;
use cristianoc72\codegen\generator\ModelGenerator;
use cristianoc72\codegen\generator\utils\Writer;
use cristianoc72\codegen\model\AbstractModel;
use cristianoc72\codegen\model\DocblockInterface;

abstract class AbstractBuilder
{
    /** @var ModelGenerator */
    protected $generator;

    /** @var Writer */
    private $writer;

    /** @var GeneratorConfig */
    private $config;

    public function __construct(ModelGenerator $generator)
    {
        $this->generator = $generator;
        $this->writer = $generator->getWriter();
        $this->config = $generator->getConfig();
    }

    abstract public function build(AbstractModel $model): void;

    protected function getConfig(): GeneratorConfig
    {
        return $this->config;
    }

    protected function getWriter(): Writer
    {
        return $this->writer;
    }

    protected function generate(AbstractModel $model): void
    {
        $builder = $this->generator->getFactory()->getBuilder($model);
        $builder->build($model);
    }

    protected function ensureBlankLine(): void
    {
        if (!$this->writer->endsWith("\n\n") && (strlen($this->writer->rtrim()->getContent()) > 0) &&
            !$this->writer->endsWith("{\n")) {
            $this->writer->writeln();
        }
    }

    protected function buildDocblock(DocblockInterface $model): void
    {
        $this->ensureBlankLine();
        $model->generateDocblock();
        $docblock = $model->getDocblock();
        if (!$docblock->isEmpty() || $this->config->getGenerateEmptyDocblock()) {
            $this->writer->writeln($docblock->toString());
        }
    }
}
