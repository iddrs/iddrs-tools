<?php

namespace App\Command;

use GetOpt\Command;
use GetOpt\GetOpt;
use GetOpt\Operand;
use GetOpt\Option;
use function contab\tester\main;

class TestesContabilidadeCommand extends Command {
    public function __construct() {
        parent::__construct('test:contab', [$this, 'handle']);
        
        $this->addOperands([
                Operand::create('db', Operand::REQUIRED),
                Operand::create('report', Operand::REQUIRED),
        ]);
        
        $this->addOptions([
                Option::create('r', 'remessa', GetOpt::REQUIRED_ARGUMENT),
                Option::create('e', 'entidade', GetOpt::REQUIRED_ARGUMENT),
                Option::create('p', 'perfil', GetOpt::REQUIRED_ARGUMENT),
        ]);
    }
    
    public function handle(GetOpt $getOpt) {
        main($getOpt->getOperand('db'), $getOpt->getOperand('report'), $getOpt->getOption('remessa'), $getOpt->getOption('entidade'), $getOpt->getOption('perfil'));
    }
}
