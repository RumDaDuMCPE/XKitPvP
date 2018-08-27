<?php

namespace KitPvP\regions;


use pocketmine\Player;

class SpawnRegion {

    public function enteringSpawnPortal(Player $player) {
        /*
         * HOLY FUCK
         */
        if ($this->portalOne($player) || $this->portalTwo($player) || $this->portalThree($player) || $this->portalFour($player) || $this->portalFive($player) || $this->portalSix($player) || $this->portalSeven($player) || $this->portalEight($player)) {
            return true;
        }
        return false;
    }

    public function portalOne(Player $player) {
        $x = $player->getX();
        $z = $player->getZ();
        $xx = [231,233];
        $zz = 260;
        if ($x >= min($xx) && $x <= max($xx) && $z > $zz - 1 && $z < $zz + 1) {
            return true;
        } else {
            return false;
        }
    }

    public function portalTwo(Player $player) {
        $x = $player->getX();
        $z = $player->getZ();
        $xx = [279,281];
        $zz = 252;
        if ($x <= max($xx) && $x >= min($xx) && $z > $zz - 1 && $z < $zz + 1) {
            return true;
        } else {
            return false;
        }
    }

    public function portalThree(Player $player) {
        $x = $player->getX();
        $z = $player->getZ();
        $xx = 260;
        $zz = [279,281];
        if ($z >= min($zz) && $z <= max($zz) && $x > $xx - 1 && $x < $xx + 1) {
            return true;
        } else {
            return false;
        }
    }

    public function portalFour(Player $player) {
        $x = $player->getX();
        $z = $player->getZ();
        $xx = 252;
        $zz = [279,281];
        if ($z >= min($zz) && $z <= max($zz) && $x > $xx - 1 && $x < $xx + 1) {
            return true;
        } else {
            return false;
        }
    }

    public function portalFive(Player $player) {
        $x = $player->getX();
        $z = $player->getZ();
        $xx = [231,233];
        $zz = 252;
        if ($x >= min($xx) && $x <= max($xx) && $z > $zz - 1 && $z < $zz + 1) {
            return true;
        } else {
            return false;
        }
    }

    public function portalSix(Player $player) {
        $x = $player->getX();
        $z = $player->getZ();
        $zz = [232,234];
        $xx = 260;
        if ($z >= 232 && $z <= 234 && $x > $xx - 1 && $x < $xx + 1) {
            return true;
        } else {
            return false;
        }
    }

    public function portalSeven(Player $player) {
        $x = $player->getX();
        $z = $player->getZ();
        $xx = 252;
        $zz = [232,234];
        if ($z >= min($zz) && $z <= max($zz) && $x > $xx - 1 && $x < $xx + 1) {
            return true;
        } else {
            return false;
        }
    }

    public function portalEight(Player $player) {
        $x = $player->getX();
        $z = $player->getZ();
        $xx = [279,281];
        $zz = 260;
        if ($x >= min($xx) && $x <= max($xx) && $z > $zz - 1 && $z < $zz + 1) {
            return true;
        } else {
            return false;
        }
    }

    public function isInSpawn(Player $player) {
        $x = $player->getX();
        $y = $player->getY();
        $z = $player->getZ();
        $xx = [212, 300];
        $yy = 84;
        $zz = [217, 300];
        if($x >= min($xx) and $x <= max($xx) and $z >= min($zz) and $z <= max($zz)){
            return true;
        } else {
            return false;
        }
    }

    public function isInKitRoom(Player $player) {
        $x = $player->getX();
        $z = $player->getZ();
        $xx = [383,325];
        $zz = [348,375];
        if ($x >= min($xx) && $x <= max($xx) && $z >= min($zz) && $z <= max($zz)) {
            return true;
        } else {
            return false;
        }
    }

    public function isInVIPRoom(Player $player) {
        $x = $player->getX();
        $z = $player->getZ();
        $xx = [326,354];
        $zz = [372,350];
        if ($x >= min($xx) && $x <= max($xx) && $z >= min($zz) && $z <= max($zz)) {
            return true;
        } else {
            return false;
        }
    }


}