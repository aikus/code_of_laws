<?php
namespace RulesBook\Parsers;

use \RulesBook\Conditions\Condition;
use \DOMElement;

/**
 * @author aikus
 */
class SingleConditionParser implements XmlConditionParser
{
    private $conditionClass;
    
    public function __construct($conditionClass)
    {
        $this->conditionClass = $conditionClass;
    }

    public function parse(DOMElement $element): Condition
    {
        $class = $this->conditionClass;
        return new $class(
            $element->getAttribute('field'),
            $element->getAttribute('value')
        );
    }

}
