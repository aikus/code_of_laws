<?php
namespace RulesBook\Tests\Providers;

use PHPUnit\Framework\TestCase;
use RulesBook\Providers\SimpleArrayProvider;

/**
 * Description of SimpleArrayProviderTest
 *
 * @author aikus
 */
class SimpleArrayProviderTest extends TestCase
{
    /**
     * @dataProvider cases
     * @param mixed $expected
     * @param string $field
     */
    public function testGetValue($expected, string $field) {
        //Arrange
        $provider = new SimpleArrayProvider([
            'test' => 11,
            'field.field' => 'value',
        ]);
        
        //Act
        $result = $provider->getValue($field);
        
        //Assert
        $this->assertEquals($expected, $result);
    }
    
    public function cases(): array
    {
        return [
            'return single field' => [11, 'test'],
            'return custom field as single' => ['value', 'field.field'],
            'return null if field is not exists' => [null, 'some.field'],
        ];
    }
}
