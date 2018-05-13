<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Http\Services\Content\ItemService;
use App\Http\Services\Shared\ConfigService;
use App\Models\Config;

class ItemController extends Controller
{
    /**
     * @var ItemService
     */
    protected $itemService;
    /**
     * @var Config
     */
    protected $configAll;
    /**
     * @var ConfigService
     */
    protected $configService;

    protected $config;

    public function __construct
    (
        ItemService $itemService,
        Config $configAll,
        ConfigService $configService
    )
    {

        $this->itemService = $itemService;
        $this->configAll = $configAll;
        $this->configService = $configService;
        $this->config = $this->configService->prepareConfigs($this->configAll->all());
    }
}