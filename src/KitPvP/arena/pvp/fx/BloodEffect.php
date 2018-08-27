<?php

namespace KitPvP\arena\pvp\fx;


use KitPvP\BaseEvent;
use pocketmine\block\Block;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\level\particle\DestroyBlockParticle;
use pocketmine\Player;

class BloodEffect extends BaseEvent {

    const CHANCE = 5;

    public function inPvP(EntityDamageEvent $e){
        if($e instanceof EntityDamageByEntityEvent){
            if(!$e->isCancelled() and (mt_rand(1, self::CHANCE) === 1)){
                if($e->getEntity() instanceof Player and $e->getDamager() instanceof Player){
                    $e->getEntity()->getLevel()->addParticle(new DestroyBlockParticle($e->getEntity(), Block::get(152)));
                }
            }
        }
	}

}