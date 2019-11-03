<?php
namespace RulesBook\Tests\Providers;

use \PHPUnit\Framework\TestCase;
use \RulesBook\Providers\ArrayProvider;

/**
 * Description of ArrayProviderTest
 *
 * @author aikus
 */
class ArrayProviderTest extends TestCase
{
    /**
     * @dataProvider cases
     * @param void $expected
     * @param string $field
     */
    public function testGetValue($expected, string $field)
    {
        //Arrange
        $provider = new ArrayProvider([
            'field' => 'value',
            'child' => [
                'childField' => 'child value',
            ],
            'dotted.field' => 1324,
            'slashed-field\\' => [
                'field' => 312,
            ],
            '\\' => [
                'field' => 'a',
            ],
        ]);
        
        //Act
        $result = $provider->getValue($field);
        
        //Assert
        $this->assertEquals($expected, $result);
    }
    
    public function cases(): array
    {
        return [
            'single field' => ['value', 'field'],
            'children value' => ['child value', 'child.childField'],
            'dotted field' => [1324, 'dotted\.field'],
            'slashed field' => [312, 'slashed-field\\\\.field'],
            'slash first' => ['a', '\\\\.field'],
        ];
    }
}
