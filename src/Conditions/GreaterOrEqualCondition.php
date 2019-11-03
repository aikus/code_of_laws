<?php
namespace RulesBook\Conditions;

/**
 * Description of GreaterOrEqualCondition
 *
 * @author aikus
 */
class GreaterOrEqualCondition extends SingleCondition
{
    //put your code here
    protected function doTest($value, $other): bool
    {
        return $value <= $other;
    }
}
