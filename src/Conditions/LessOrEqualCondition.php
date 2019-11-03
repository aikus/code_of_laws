<?php

namespace RulesBook\Conditions;

/**
 * Description of LessOrEqualCondition
 *
 * @author aikus
 */
class LessOrEqualCondition extends SingleCondition
{
    //put your code here
    protected function doTest($value, $other): bool
    {
        return $value >= $other;
    }

}
