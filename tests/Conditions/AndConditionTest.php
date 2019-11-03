<?php
namespace RulesBook\Tests\Conditions;

use \PHPUnit\Framework\TestCase;
use \RulesBook\Conditions\AndCondition;
use \RulesBook\Conditions\EqualConditon;
use \RulesBook\Providers\SimpleArrayProvider;

/**
 * Description of AndConditionTest
 *
 * @author aikus
 */
class AndConditionTest extends TestCase
{
    /**
     * @dataProvider cases
     * @param bool $expected
     * @param array $source
     */
    public function testTest(bool $expected, array $source)
    {
        //Arrange
        $condition = new AndCondition([
            new EqualConditon('a', '1'),
            new EqualConditon('b', '2'),
        ]);
        $data = new SimpleArrayProvider($source);
        
        //Act
        $result = $condition->test($data);
        
        //Assert
        $this->assertEquals($expected, $result);
    }
    
    public function cases(): array
    {
        return [
            [true, ['a' => 1, 'b' => 2]],
            [false, ['a' => -1, 'b' => 2]],
            [false, ['a' => 1, 'b' => 3]],
            [false, ['a' => -1, 'b' => 3]],
        ];
    }
}
