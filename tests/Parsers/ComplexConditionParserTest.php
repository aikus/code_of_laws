<?php
namespace RulesBook\Tests\Parsers;

use \PHPUnit\Framework\TestCase;
use \RulesBook\Parsers\ComplexConditionParser;
use \RulesBook\Conditions\EqualConditon;
use \RulesBook\Conditions\OrCondition;
use \RulesBook\Parsers\ComplexConditionEmpty;
use \RulesBook\Parsers\XmlConditionFactory;
use \DOMDocument;
use \RulesBook\Parsers\ConditionNotFound;

/**
 * Description of OrConditionPareserTest
 *
 * @author aikus
 */
class ComplexConditionParserTest extends TestCase
{
    /**
     * @throws ComplexConditionEmpty
     * @throws ConditionNotFound
     */
    public function testParse() {
        //Arrange
        $parser = new ComplexConditionParser(OrCondition::class, new XmlConditionFactory());
        $doc = new DOMDocument;
        $or = ($doc)->createElement('or');
        $equal1 = ($doc)->createElement('equal');
        $equal1->setAttribute('field', 'field');
        $equal1->setAttribute('value', 'value');
        $or->appendChild($equal1);
        $equal2 = ($doc)->createElement('equal');
        $equal2->setAttribute('field', 'field');
        $equal2->setAttribute('value', 'value2');
        $or->appendChild($equal2);
        
        //Act
        $condition = $parser->parse($or);
        
        //Assert
        $this->assertEquals(new OrCondition([
            new EqualConditon('field', 'value'),
            new EqualConditon('field', 'value2'),
        ]), $condition);
    }

    /**
     * @throws ComplexConditionEmpty
     * @throws ConditionNotFound
     */
    public function testParse_emptyElement() {
        //Assert
        $this->expectExceptionObject(new ComplexConditionEmpty('or'));
        
        //Arrange
        $parser = new ComplexConditionParser(OrCondition::class, new XmlConditionFactory());
        $doc = new DOMDocument;
        $or = ($doc)->createElement('or');
        
        //Act
        $parser->parse($or);
    }
}
