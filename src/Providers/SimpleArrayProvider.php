<?php
namespace RulesBook\Providers;

/**
 * @author aikus
 */
class SimpleArrayProvider implements Provider
{
    private $data;
    
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function getValue(string $key)
    {
        return key_exists($key, $this->data) ? $this->data[$key] : null;
    }

}
