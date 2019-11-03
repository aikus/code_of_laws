<?php
namespace RulesBook\Tests;

use PHPUnit\Framework\TestCase;
use RulesBook\Parsers\XmlReader;
use RulesBook\Providers\SimpleArrayProvider;
use \RulesBook\Parsers\ConditionNotFound;
use \RulesBook\Parsers\EmptyRule;

/**
 * Description of FullWorkBook
 *
 * @author aikus
 */
class FullWorkBookTest extends TestCase
{
    /**
     * @throws ConditionNotFound
     * @throws EmptyRule
     */
    public function testRun() {
        $loader = new XmlReader();
        $loader->load(__DIR__.DIRECTORY_SEPARATOR.'data/FullWorkBookTest.xml');
        $book = $loader->getBook();
        $this->assertEquals('success', $book->resolve(new SimpleArrayProvider([
            'test' => 1,
        ])));
    }
}
