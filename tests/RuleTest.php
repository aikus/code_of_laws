<?php
namespace RulesBook\Tests;

use \RulesBook\Rule;
use \RulesBook\Providers\SimpleArrayProvider;
use \RulesBook\Conditions\EqualConditon;
use \PHPUnit\Framework\TestCase;

/**
 * Description of RuleTest
 *
 * @author aikus
 */
class RuleTest extends TestCase
{
    public function testWhen()
    {
        $rule = new Rule('key', new EqualConditon('field', '11'));
        
        $this->assertTrue($rule->when(new SimpleArrayProvider(['field' => 11])));
    }
}