<?php
namespace RulesBook\Providers;

/**
 * Description of ArrayProvider
 *
 * @author aikus
 */
class ArrayProvider implements Provider
{
    /**
     * @var array
     */
    private $data;
    
    public function __construct(array $data)
    {
        $this->data = $data;
    }
    
    public function getValue(string $key)
    {
        $path = new ArrayPath($key);
        $result = $this->data;
        foreach ($path->getSteps() as $arrayKey) {
            $result = $result[$arrayKey];
        }
        return $result;
    }
}
