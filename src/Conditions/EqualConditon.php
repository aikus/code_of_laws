<?php
namespace RulesBook\Conditions;

/**
 * @author aikus
 */
class EqualConditon extends SingleCondition
{
    protected function doTest($value, $other): bool
    {
        return $value == $other;
    }

}
