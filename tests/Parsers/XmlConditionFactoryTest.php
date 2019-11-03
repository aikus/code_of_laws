<?php
namespace RulesBook\Tests\Parsers;

use \PHPUnit\Framework\TestCase;
use \RulesBook\Parsers\XmlConditionFactory;
use \RulesBook\Conditions\EqualConditon;
use \RulesBook\Parsers\SingleConditionParser;
use \RulesBook\Conditions\LessThanCondition;
use \RulesBook\Conditions\GreaterThanCondition;
use \RulesBook\Conditions\GreaterOrEqualCondition;
use \RulesBook\Parsers\XmlConditionParser;
use \RulesBook\Conditions\LessOrEqualCondition;
use \RulesBook\Parsers\NotConditionParser;
use \RulesBook\Parsers\ConditionNotFound;
use \RulesBook\Parsers\ComplexConditionParser;
use \RulesBook\Conditions\OrCondition;
use \RulesBook\Conditions\AndCondition;
use \ReflectionException;

/**
 * Description of XmlRuleFactory
 *
 * @author aikus
 */
class XmlConditionFactoryTest extends TestCase
{
    /**
     * @dataProvider cases
     * @param XmlConditionParser $expected
     * @param string $node
     * @throws ReflectionException
     * @throws ConditionNotFound
     */
    public function testGetConditionParser(XmlConditionParser $expected, string $node)
    {
        //Arrange
        $factory = new XmlConditionFactory;
        
        //Act
        $result = $factory->getConditionParser($node);
        
        //Assert
        $this->assertEquals($expected, $result);
    }
    
    public function cases(): array
    {
        return [
            [new SingleConditionParser(EqualConditon::class), 'equal'],
            [new SingleConditionParser(LessThanCondition::class), 'less'],
            [new SingleConditionParser(GreaterThanCondition::class), 'greater'],
            [new SingleConditionParser(GreaterOrEqualCondition::class), 'greater-or-equal'],
            [new SingleConditionParser(LessOrEqualCondition::class), 'less-or-equal'],
            [new NotConditionParser(), 'not'],
            [new ComplexConditionParser(OrCondition::class, new XmlConditionFactory()), 'or'],
            [new ComplexConditionParser(AndCondition::class, new XmlConditionFactory()), 'and'],
        ];
    }

    /**
     * @throws ConditionNotFound
     * @throws ReflectionException
     */
    public function testNotFoundParser()
    {
        //Assert
        $this->expectExceptionObject(new ConditionNotFound('bla-bla'));
        
        //Arrange
        $factory = new XmlConditionFactory;
        
        //Act
        $factory->getConditionParser('bla-bla');
    }
}
