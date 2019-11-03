<?php
namespace RulesBook\Conditions;

use \RulesBook\Providers\Provider;

/**
 * Description of SingleCondition
 *
 * @author aikus
 */
abstract class SingleCondition implements Condition
{
    private $field;
    private $expected;
    
    public function __construct(string $field, string $value)
    {
        $this->field = $field;
        $this->expected = $value;
    }
    
    public function test(Provider $data): bool
    {
        return $this->doTest($this->expected, $data->getValue($this->field));
    }
    
    protected abstract function doTest($value, $other): bool;
}
