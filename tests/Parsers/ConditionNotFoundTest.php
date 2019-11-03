<?php
namespace RulesBook\Tests\Parsers;

use \PHPUnit\Framework\TestCase;
use \RulesBook\Parsers\ConditionNotFound;

/**
 * Description of ConditionNotFoundTest
 *
 * @author aikus
 */
class ConditionNotFoundTest extends TestCase
{
    public function testGetMessage()
    {
        //Arrange
        //Act
        $exception = new ConditionNotFound('some-tag');
        
        //Accert
        $this->assertEquals("Not found condition for 'some-tag' element",
                $exception->getMessage());
    }
}
