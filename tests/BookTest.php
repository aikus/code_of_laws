<?php

namespace RulesBook\Tests;

use \PHPUnit\Framework\TestCase;
use \RulesBook\Book;
use \RulesBook\Providers\SimpleArrayProvider;
use \RulesBook\Rule;
use \RulesBook\Conditions\EqualConditon;

/**
 * Description of BookTest
 *
 * @author aikus
 */
class BookTest extends TestCase
{

    /**
     * @dataProvider cases
     * @param string|null $expected
     * @param array $data
     */
    public function testResolve(?string $expected, array $data)
    {
        //Arrange
        $rule = new Rule('test', new EqualConditon('field1', 'a'));
        $rule2 = new Rule('test2', new EqualConditon('field1', 'b'));
        $book = new Book();
        $book->addRule($rule)
                ->addRule($rule2);
        $provider = new SimpleArrayProvider($data);

        //Act
        $result = $book->resolve($provider);

        //Assert
        $this->assertEquals($expected, $result);
    }

    public function cases(): array
    {
        return [
            'resolve first rule' => ['test', [
                    'field1' => 'a',
                    'field2' => 'c',
                ]],
            'resolve second rule' => ['test2', [
                    'field1' => 'b',
                    'field2' => 'c',
                ]],
            'rule not found' => [null, [
                    'field1' => 't',
                    'field2' => 'c',
                ]],
        ];
    }

}
