<?php
namespace RulesBook\Tests\Parsers;

use \PHPUnit\Framework\TestCase;
use \RulesBook\Conditions\EqualConditon;
use \RulesBook\Parsers\SingleConditionParser;
use \DOMDocument;

/**
 * Description of SingleConditionParserTest
 *
 * @author aikus
 */
class SingleConditionParserTest extends TestCase
{
    public function testParse()
    {
        //Arrange
        $parser = new SingleConditionParser(EqualConditon::class);
        $element = (new DOMDocument())->createElement('equals');
        $element->setAttribute('field', 'field');
        $element->setAttribute('value', 'value');
        
        //Act
        $condition = $parser->parse($element);
        
        //Assert
        $this->assertEquals(new EqualConditon('field', 'value'), $condition);
    }
}
