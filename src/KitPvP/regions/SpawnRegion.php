<?php

namespace KitPvP\regions;


use pocketmine\math\AxisAlignedBB;
use pocketmine\Player;

class SpawnRegion {

    /**
     * @param Player $vector3
     * @return bool
     */
    public function inSpawn(Player $vector3) : bool {
        $x = [212, 300];
        $y = [0, 700];
        $z = [217, 300];
        $axis = new AxisAlignedBB(min($x), max($x), min($y), max($y), min($z), max($z));
        if ($axis->isVectorInside($vector3)) {
            return true;
        }
        return false;
    }

    public function inAnyArena(Player $vector3) : bool {

    }

}