<?php declare(strict_types=1);

namespace cristianoc72\codegen\generator\builder;

use cristianoc72\codegen\model\AbstractModel;
use cristianoc72\codegen\generator\builder\parts\StructBuilderPart;
use cristianoc72\codegen\model\PhpTrait;

class TraitBuilder extends AbstractBuilder
{
    use StructBuilderPart;
    
    public function build(AbstractModel $model): void
    {
        if (! $model instanceof PhpTrait) {
            throw new \InvalidArgumentException('The trait builder can only build Trait classes.');
        }

        $this->sort($model);
    
        $this->buildHeader($model);
    
        // signature
        $this->buildSignature($model);
    
        // body
        $this->getWriter()->writeln("\n{\n")->indent();
        $this->buildTraits($model);
        $this->buildProperties($model);
        $this->buildMethods($model);
        $this->getWriter()->outdent()->rtrim()->write("}\n");
    }
    
    private function buildSignature(PhpTrait $model)
    {
        $this->getWriter()->write('trait ');
        $this->getWriter()->write($model->getName());
    }
    
    private function sort(PhpTrait $model)
    {
        $this->sortUseStatements($model);
        $this->sortProperties($model);
        $this->sortMethods($model);
    }
}
