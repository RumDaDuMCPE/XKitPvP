<?php

namespace KitPvP\player;


use KitPvP\API;
use KitPvP\BaseEvent;
use pocketmine\event\player\PlayerMoveEvent;

class MoveEvent extends BaseEvent {

    public function catchMovement(PlayerMoveEvent $event) {
        $player = $event->getPlayer();
        if ($this->getPlugin()->getRegion(0)->enteringSpawnPortal($player)) {
            if ($player->hasPermission('xfurnus.premium')) {
                $this->getAPI()->teleport($player, 0);
            } else {
                $this->getAPI()->teleport($player, 1);
           }
        }
        if ($player->y < 40) $player->teleport($player->getLevel()->getSafeSpawn());
    }

}