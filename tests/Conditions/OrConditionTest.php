<?php
namespace RulesBook\Tests\Conditions;

use \PHPUnit\Framework\TestCase;
use \RulesBook\Conditions\OrCondition;
use \RulesBook\Conditions\EqualConditon;
use \RulesBook\Providers\SimpleArrayProvider;

/**
 * Description of OrCondition
 *
 * @author aikus
 */
class OrConditionTest extends TestCase
{
    /**
     * @dataProvider cases
     * @param bool $expected
     * @param mixed $val
     */
    public function testTest(bool $expected, $val)
    {
        //Arrange
        $condition = new OrCondition([
            new EqualConditon('a', '1'),
            new EqualConditon('a', '2'),
        ]);
        $data = new SimpleArrayProvider([
            'a' => $val,
        ]);
        
        //Act
        $result = $condition->test($data);
        
        //Assert
        $this->assertEquals($expected, $result);
    }
    
    public function cases(): array
    {
        return [
            [true, 2],
            [true, 1],
            [false, 0],
        ];
    }
}
