<?php
namespace RulesBook\Tests\Conditions;

use \PHPUnit\Framework\TestCase;
use \RulesBook\Providers\SimpleArrayProvider;
use \RulesBook\Conditions\LessThanCondition;

/**
 * Description of LessThenConditionTest
 *
 * @author aikus
 */
class LessThenConditionTest extends TestCase
{
    /**
     * @dataProvider data
     * @param bool $expected
     * @param mixed $value
     */
    public function testTest(bool $expected, $value)
    {
        //Arrange
        $condition = new LessThanCondition('a', '17');
        
        //Act
        $testResult = $condition->test(new SimpleArrayProvider(['a' => $value]));
        
        //Assets
        $this->assertEquals($expected, $testResult);
    }
    
    public function data(): array
    {
        return [
            [true, 11],
            [false, 17],
            [false, 18],
        ];
    }
}
