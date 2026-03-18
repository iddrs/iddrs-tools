<?php

namespace App\Command;

use GetOpt\Command;
use GetOpt\Operand;

class PadConvertCommand extends Command {
    public function __construct() {
        parent::__construct('pad:convert', [$this, 'handle']);
        
        $this->addOperands([
                Operand::create('destiny', Operand::REQUIRED),
                Operand::create('sources', Operand::REQUIRED+Operand::MULTIPLE),
        ]);
    }
    
    public function handle(\GetOpt\GetOpt $getOpt) {
        \pad\converter\main($getOpt->getOperand('destiny'), $getOpt->getOperand('sources'));
    }
}
