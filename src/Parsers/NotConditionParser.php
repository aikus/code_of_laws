<?php
namespace RulesBook\Parsers;

use \RulesBook\Conditions\Condition;
use \RulesBook\Conditions\NotCondition;
use \DOMElement;
use \ReflectionException;

/**
 * Description of NotConditionParser
 *
 * @author aikus
 */
class NotConditionParser implements XmlConditionParser
{
    /**
     * @param DOMElement $element
     * @return Condition
     * @throws ComplexConditionEmpty
     * @throws ConditionNotFound
     * @throws ReflectionException
     */
    public function parse(DOMElement $element): Condition
    {
        $positiveNode = $this->getPositiveConditionElement($element);
        return new NotCondition(
            (new XmlConditionFactory)
                ->getConditionParser($positiveNode->nodeName)
                ->parse($positiveNode)
        );
    }

    /**
     * 
     * @param  DOMElement $not
     * @return DOMElement
     * @throws ComplexConditionEmpty
     */
    private function getPositiveConditionElement(DOMElement $not): DOMElement
    {
        foreach ($not->childNodes as $node) {
            if($node->nodeType == XML_ELEMENT_NODE) {
                return $node;
            }
        }
        throw new ComplexConditionEmpty($not->nodeName);
    }
}
