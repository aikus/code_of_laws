<?php
namespace RulesBook\Tests\Conditions;

use \PHPUnit\Framework\TestCase;
use \RulesBook\Conditions\NotCondition;
use \RulesBook\Conditions\EqualConditon;
use \RulesBook\Providers\SimpleArrayProvider;

/**
 * Description of NotConditionTest
 *
 * @author aikus
 */
class NotConditionTest extends TestCase
{
    /**
     * @dataProvider cases
     * @param bool $expected
     * @param mixed $val
     */
    public function testTest(bool $expected, $val)
    {
        //Arrange
        $condition = new NotCondition(new EqualConditon('field', '17'));
        
        //Act
        $result = $condition->test(new SimpleArrayProvider(['field' => $val]));
        
        //Assert
        $this->assertEquals($expected, $result);
    }
    
    public function cases(): array
    {
        return [
            'true' => [true, 11],
            'false' => [false, 17],
        ];
    }
}
