<?php
namespace RulesBook\Tests\Parsers;

use \PHPUnit\Framework\TestCase;
use \RulesBook\Parsers\ComplexConditionEmpty;

/**
 * Description of ComplexConditionEmptyTest
 *
 * @author aikus
 */
class ComplexConditionEmptyTest extends TestCase
{
    public function testGetMessage()
    {
        //Arrange
        //Act
        $exception = new ComplexConditionEmpty('some-tag');
        
        //Accert
        $this->assertEquals("The 'some-tag' tag must have a child element",
                $exception->getMessage());
    }
}
