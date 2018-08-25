<?php

namespace KitPvP\player;


use KitPvP\BaseEvent;
use pocketmine\event\player\PlayerJoinEvent;

class JoinEvent extends BaseEvent {

    public function catchEvent(PlayerJoinEvent $event) {
        $player = $event->getPlayer();
        if (!$this->getPlugin()->getRegion(1)->inAnyArena($event->getPlayer())) {
            $this->getPlugin()->getScheduler()->scheduleDelayedTask(new TitleTask($player), 20 * 5);
        }
    }
    
}