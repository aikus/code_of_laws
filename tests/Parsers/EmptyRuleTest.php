<?php
namespace RulesBook\Tests\Parsers;

use \PHPUnit\Framework\TestCase;
use \RulesBook\Parsers\EmptyRule;

/**
 * Description of EmptyRuleTest
 *
 * @author aikus
 */
class EmptyRuleTest extends TestCase
{
    public function testGetMessage()
    {
        $this->assertEquals('Rule must have one condition',
            (new EmptyRule())->getMessage());
    }
}
