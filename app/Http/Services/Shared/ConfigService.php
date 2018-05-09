<?php

namespace App\Http\Services\Shared;


use App\Models\Config;

class ConfigService
{
    /**
     * @var Config
     */
    protected $config;

    public function __construct
    (
        Config $config
    )
    {
        $this->config = $config;
    }

    public function prepareConfigs($config)
    {
        $refactoredConfig = [];
        foreach ($config as $configOnce) {
            if ($configOnce->type === 'string') {
                $refactoredConfig[$configOnce->name] = $configOnce->value;
            } elseif ($configOnce->type === 'json') {
                $refactoredConfig[$configOnce->name] = (array)json_decode($configOnce->value, true);
            }
        }
        return $refactoredConfig;
    }
}