<?php
namespace RulesBook\Parsers;

use \ReflectionClass;
use \ReflectionException;

/**
 * Description of XmlConditionFactory
 *
 * @author aikus
 */
class XmlConditionFactory
{
    /**
     *
     * @var array
     */
    private $config;

    public function __construct()
    {
        $this->config = include __DIR__.'/config/xml-conditions.php';
    }

    /**
     * 
     * @param  string $conditionKey
     * @return XmlConditionParser
     * @throws ConditionNotFound
     * @throws ReflectionException
     */
    public function getConditionParser(string $conditionKey): XmlConditionParser
    {
        if(key_exists($conditionKey, $this->config)) {
            return $this->buildParser($this->config[$conditionKey]);
        }
        throw new ConditionNotFound($conditionKey);
    }

    /**
     * @param array $conf
     * @return XmlConditionParser
     * @throws ReflectionException
     */
    private function buildParser(array $conf): XmlConditionParser
    {
        $class = new ReflectionClass($conf['class']);
        return $class->newInstanceArgs($conf['arguments']);
    }
}
