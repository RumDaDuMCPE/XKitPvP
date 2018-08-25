<?php

namespace KitPvP;


use KitPvP\regions\SpawnRegion;
use pocketmine\plugin\PluginBase;

class Loader extends PluginBase
{

    public static $instance;

    public function onEnable()
    {
        $this->registerEvents();
        self::$instance = $this;
    }

    private function registerEvents()
    {

    }

    public static function getInstance()
    {
        return self::$instance;
    }

    public function getRegion(int $id)
    {
        $regions = [
            new SpawnRegion()
        ];
        return $regions[$id];
    }
}