<?php

namespace KitPvP\player;


use KitPvP\BaseEvent;
use pocketmine\event\player\PlayerMoveEvent;

class MoveEvent extends BaseEvent {

    public function catchMovement(PlayerMoveEvent $event) {
        if ($this->getPlugin()->getRegion(0)->enteringPortal($event->getPlayer())) {
            // TODO: Teleport player to kits.
        }
    }

}