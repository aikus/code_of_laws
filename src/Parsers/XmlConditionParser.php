<?php
namespace RulesBook\Parsers;

use \RulesBook\Conditions\Condition;
use \DOMElement;

/**
 *
 * @author aikus
 */
interface XmlConditionParser
{
    public function parse(DOMElement $element): Condition;
}
