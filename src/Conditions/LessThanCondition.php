<?php
namespace RulesBook\Conditions;

/**
 * Description of LessThanCondition
 *
 * @author aikus
 */
class LessThanCondition extends SingleCondition
{
    protected function doTest($value, $other): bool
    {
        return $value > $other;
    }

}
