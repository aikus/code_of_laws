<?php
namespace RulesBook\Conditions;

use \RulesBook\Providers\Provider;

/**
 *
 * @author aikus
 */
interface Condition
{
    public function test(Provider $data): bool;
}
