<?php
namespace RulesBook\Parsers;

use \RulesBook\Conditions\OrCondition;
use \RulesBook\Conditions\Condition;
use \DOMElement;
use \ReflectionException;

/**k
 *
 * @author aikus
 */
class ComplexConditionParser implements XmlConditionParser
{
    private $parserFactory;
    private $class;

    public function __construct(string $class, XmlConditionFactory $factory)
    {
        $this->parserFactory = $factory;
        $this->class = $class;
    }

    /**
     * @param DOMElement $element
     * @return Condition
     * @throws ComplexConditionEmpty
     * @throws ConditionNotFound
     * @throws ReflectionException
     */
    public function parse(DOMElement $element): Condition
    {
        return new OrCondition($this->getChildConditions($element));
    }

    /**
     * @param DOMElement $element
     * @return array
     * @throws ComplexConditionEmpty
     * @throws ConditionNotFound
     * @throws ReflectionException
     */
    private function getChildConditions(DOMElement $element): array
    {
        $result = [];
        foreach ($element->childNodes as $node) {
            if($node->nodeType == XML_ELEMENT_NODE) {
                $result[] = $this->parserFactory
                    ->getConditionParser($node->nodeName)
                    ->parse($node);
            }
        }
        if(!$result) {
            throw new ComplexConditionEmpty($element->nodeName);
        }
        return $result;
    }

}
