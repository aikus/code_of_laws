<?php
namespace RulesBook\Tests\Conditions;

use \PHPUnit\Framework\TestCase;
use \RulesBook\Conditions\GreaterThanCondition;
use \RulesBook\Providers\SimpleArrayProvider;

/**
 * Description of GreaterThanConditionTest
 *
 * @author aikus
 */
class GreaterThanConditionTest extends TestCase
{
    /**
     * @dataProvider data
     * @param bool $expected
     * @param mixed $actualVal
     */
    public function testTest(bool $expected, $actualVal)
    {
        //Arrange
        $condition = new GreaterThanCondition('field', 11);
        $data = new SimpleArrayProvider(['field' => $actualVal]);
        
        //Act
        $result = $condition->test($data);
        
        //Assert
        $this->assertEquals($expected, $result);
    }
    
    public function data(): array
    {
        return [
            [false, 10],
            [false, 11],
            [true, 12],
        ];
    }
}
