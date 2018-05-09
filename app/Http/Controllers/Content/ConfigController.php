<?php

namespace App\Http\Controllers\Content;

use App\Http\Services\Shared\ConfigService;
use App\Models\Config;

class ConfigController
{
    /**
     * @var Config
     */
    private $config;
    /**
     * @var ConfigService
     */
    private $configService;

    /**
     * ConfigController constructor.
     * @param Config $config
     * @param ConfigService $configService
     */
    public function __construct
    (
        Config $config,
        ConfigService $configService
    )
    {
        $this->config = $config;
        $this->configService = $configService;
    }

    /**
     * @return array
     */
    public function getConfig()
    {
        $config = $this->config->all();
        $refactoredConfig = $this->configService->prepareConfigs($config);
        define('CONFIG', $refactoredConfig);
    }
}