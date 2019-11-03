<?php
namespace RulesBook\Tests\Conditions;

use PHPUnit\Framework\TestCase;
use RulesBook\Conditions\EqualConditon;
use RulesBook\Providers\SimpleArrayProvider;

/**
 * Description of EqualConditionTest
 *
 * @author aikus
 */
class EqualConditionTest extends TestCase
{
    /**
     * @dataProvider cases
     * @param bool $expected
     * @param string $field
     * @param mixed $value
     */
    public function testTest(bool $expected, string $field, $value)
    {
        //Arrange
        $condition = new EqualConditon($field, $value);
        $data = new SimpleArrayProvider([
            'abc' => '11',
            'cba' => 'string',
        ]);
        
        //Act
        $result = $condition->test($data);
        
        //Assert
        $this->assertEquals($expected, $result);
    }
    
    public function cases(): array
    {
        return [
            'hard equal - return true' => [true, 'abc', '11'],
            'soft equal - return true' => [true, 'abc', 11],
            'not equal - return false' => [false, 'abc', 'erwterw'],
        ];
    }
}
