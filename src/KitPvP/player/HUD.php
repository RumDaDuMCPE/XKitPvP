<?php

namespace KitPvP\player;


use KitPvP\API;
use KitPvP\Loader;
use pocketmine\Player;
use pocketmine\scheduler\Task;

class HUD extends Task {

    private $player;

    public function __construct(Player $player)
    {
        $this->player = $player;
    }

    public function onRun(int $currentTick)
    {
        $HUD = null;
        $spawn = $this->getLoader()->getRegion(0);
        if ($spawn->isInSpawn($this->player)) {
            $HUD = $this->getAPI()->fetchHud($this->player, 0);
        } elseif ($spawn->isInKitRoom($this->player)) {
            $HUD = $this->getAPI()->fetchHud($this->player, 1);
        }
        if (!is_null($HUD)) {
            $this->player->sendPopup($HUD);
        }
    }

    private function getLoader() : Loader {
        return Loader::getInstance();
    }

    private function getAPI() : API {
        return new API();
    }

}