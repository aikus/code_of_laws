<?php
namespace RulesBook\Tests\Parsers;

use \PHPUnit\Framework\TestCase;
use \RulesBook\Rule;
use \RulesBook\Parsers\XmlConditionFactory;
use \RulesBook\Parsers\RuleParser;
use \RulesBook\Conditions\EqualConditon;
use \RulesBook\Parsers\EmptyRule;
use \DOMDocument;
use \RulesBook\Parsers\ConditionNotFound;

/**
 * Description of RuleParserTest
 *
 * @author aikus
 */
class RuleParserTest extends TestCase
{
    /**
     * @throws EmptyRule
     * @throws ConditionNotFound
     */
    public function testParse()
    {
        //Arrange
        $doc = new DOMDocument;
        $rule = $doc->createElement('roole');
        $rule->setAttribute('result-key', 'test');
        $equal = $doc->createElement('equal');
        $equal->setAttribute('field', 'field');
        $equal->setAttribute('value', 'value');
        $rule->appendChild($equal);
        $parser = new RuleParser(new XmlConditionFactory());
        
        //Act
        $result = $parser->parse($rule);
        
        //Assert
        $this->assertEquals(new Rule('test', new EqualConditon('field', 'value')),
                $result);
    }

    /**
     * @throws ConditionNotFound
     * @throws EmptyRule
     * @throws \ReflectionException
     */
    public function testParse_emptyRule()
    {
        //Assert
        $this->expectExceptionObject(new EmptyRule());

        //Arrange
        $doc = new DOMDocument;
        $rule = $doc->createElement('roole');
        $rule->setAttribute('result-key', 'test');
        $parser = new RuleParser(new XmlConditionFactory());
        
        //Act
        $parser->parse($rule);
    }
}
