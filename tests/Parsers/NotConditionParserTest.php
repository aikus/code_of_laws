<?php
namespace RulesBook\Tests\Parsers;

use \PHPUnit\Framework\TestCase;
use \RulesBook\Conditions\EqualConditon;
use \RulesBook\Conditions\NotCondition;
use \RulesBook\Parsers\NotConditionParser;
use \RulesBook\Parsers\ComplexConditionEmpty;
use \DOMDocument;
use \RulesBook\Parsers\ConditionNotFound;

/**
 * Description of NotConditionParserTest
 *
 * @author aikus
 */
class NotConditionParserTest extends TestCase
{
    /**
     * @throws ComplexConditionEmpty
     * @throws ConditionNotFound
     * @throws \ReflectionException
     */
    public function testParse()
    {
        //Arrange
        $parser = new NotConditionParser;
        $doc = new DOMDocument;
        $not = ($doc)->createElement('not');
        $equal = ($doc)->createElement('equal');
        $equal->setAttribute('field', 'field');
        $equal->setAttribute('value', 'value');
        $not->appendChild($equal);
        
        //Act
        $condition = $parser->parse($not);
        
        //Assert
        $this->assertEquals(new NotCondition(new EqualConditon('field', 'value')), $condition);
    }

    /**
     * @throws ComplexConditionEmpty
     * @throws ConditionNotFound
     * @throws \ReflectionException
     */
    public function testParse_emptyPositive()
    {
        //Assert
        $this->expectExceptionObject(new ComplexConditionEmpty('not'));
        
        //Arrange
        $parser = new NotConditionParser;
        $doc = new DOMDocument;
        $not = ($doc)->createElement('not');
        
       //Act
        $parser->parse($not);
    }
}
