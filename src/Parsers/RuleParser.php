<?php
namespace RulesBook\Parsers;

use \RulesBook\Rule;
use \RulesBook\Conditions\Condition;
use \DOMElement;
use \ReflectionException;

/**
 *
 * @author aikus
 */
class RuleParser
{
    private $conditionFactory;
    
    public function __construct(XmlConditionFactory $factory)
    {
        $this->conditionFactory = $factory;
    }

    /**
     * @param DOMElement $element
     * @return Rule
     * @throws ConditionNotFound
     * @throws EmptyRule
     * @throws ReflectionException
     */
    public function parse(DOMElement $element): Rule
    {
        return new Rule(
            $element->getAttribute('result-key'),
            $this->getCondition($element)
        );
    }

    /**
     * @param DOMElement $element
     * @return Condition|null
     * @throws ConditionNotFound
     * @throws EmptyRule
     * @throws ReflectionException
     */
    private function getCondition(DOMElement $element): ?Condition
    {
        foreach ($element->childNodes as $node) {
            if($node->nodeType == XML_ELEMENT_NODE) {
                return $this->conditionFactory
                    ->getConditionParser($node->nodeName)->parse($node);
            }
        }
        throw new EmptyRule();
    }
}
