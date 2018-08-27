<?php

namespace KitPvP\player;


use KitPvP\BaseEvent;
use pocketmine\event\entity\EntityDamageEvent;

class DamageEvent extends BaseEvent {

    public function catch(EntityDamageEvent $event) {
        $entity = $event->getEntity();
        if ($this->getPlugin()->getRegion(1)->isInAnyArena($entity)) {
            if ($event->getCause() instanceof $event::CAUSE_FALL) {
                $event->setCancelled(true);
            }
        } else {
            $event->setCancelled(true);
        }
    }

}