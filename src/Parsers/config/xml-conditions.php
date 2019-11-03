<?php
return [
    'equal' => [
        'class' => \RulesBook\Parsers\SingleConditionParser::class,
        'arguments' => [\RulesBook\Conditions\EqualConditon::class],
    ],
    'less' => [
        'class' => \RulesBook\Parsers\SingleConditionParser::class,
        'arguments' => [\RulesBook\Conditions\LessThanCondition::class],
    ],
    'greater' => [
        'class' => \RulesBook\Parsers\SingleConditionParser::class,
        'arguments' => [\RulesBook\Conditions\GreaterThanCondition::class],
    ],
    'greater-or-equal' => [
        'class' => \RulesBook\Parsers\SingleConditionParser::class,
        'arguments' => [\RulesBook\Conditions\GreaterOrEqualCondition::class],
    ],
    'less-or-equal' => [
        'class' => \RulesBook\Parsers\SingleConditionParser::class,
        'arguments' => [\RulesBook\Conditions\LessOrEqualCondition::class],
    ],
    'not' => [
        'class' => \RulesBook\Parsers\NotConditionParser::class,
        'arguments' => [],
    ],
    'or' => [
        'class' => \RulesBook\Parsers\ComplexConditionParser::class,
        'arguments' => [RulesBook\Conditions\OrCondition::class, $this],
    ],
    'and' => [
        'class' => \RulesBook\Parsers\ComplexConditionParser::class,
        'arguments' => [RulesBook\Conditions\AndCondition::class, $this],
    ],
];