<?php
namespace RulesBook\Conditions;

/**
 * Description of GreaterThanCondition
 *
 * @author aikus
 */
class GreaterThanCondition extends SingleCondition
{
    
    protected function doTest($value, $other): bool
    {
        return $value < $other;
    }

}
