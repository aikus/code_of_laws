<?php
namespace RulesBook\Tests\Conditions;

use \PHPUnit\Framework\TestCase;
use \RulesBook\Conditions\GreaterOrEqualCondition;
use \RulesBook\Providers\SimpleArrayProvider;

/**
 * Description of GreateOrEqualConditionTest
 *
 * @author aikus
 */
class GreateOrEqualConditionTest extends TestCase
{
    /**
     * @dataProvider data
     * @param bool $expected
     * @param mixed $actualVal
     */
    public function testTest(bool $expected, $actualVal)
    {
        //Arrange
        $condition = new GreaterOrEqualCondition('field', 11);
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
            [true, 11],
            [true, 12],
        ];
    }
}
