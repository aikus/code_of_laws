<?php
namespace RulesBook\Tests\Conditions;

use \PHPUnit\Framework\TestCase;
use \RulesBook\Providers\SimpleArrayProvider;
use \RulesBook\Conditions\LessOrEqualCondition;

/**
 * Description of LessOrEqualCondtionTest
 *
 * @author aikus
 */
class LessOrEqualCondtionTest extends TestCase
{
    /**
     * @dataProvider data
     * @param bool $expected
     * @param mixed $value
     */
    public function testTest(bool $expected, $value)
    {
        //Arrange
        $condition = new LessOrEqualCondition('a', '17');
        
        //Act
        $testResult = $condition->test(new SimpleArrayProvider(['a' => $value]));
        
        //Assets
        $this->assertEquals($expected, $testResult);
    }
    
    public function data(): array
    {
        return [
            [true, 11],
            [true, 17],
            [false, 18],
        ];
    }
}
