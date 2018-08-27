<?php

namespace KitPvP\regions;


use pocketmine\Player;

class ArenaRegion
{

    public function isInAnyArena(Player $player) : bool {
        if ($this->isInIce($player) || $this->isInDragon($player) || $this->isInSteamPunk($player) || $this->isInForest($player)) return true;
        return false;
    }

    public function isInForest(Player $player) {
        $x = $player->getX();
        $z = $player->getZ();
        $xx = [301,360];
        $zz = [288,228];
        if ($x >= min($xx) && $x <= max($xx) && $z >= min($zz) && $z <= max($zz)) {
            return true;
        }
        return false;
    }
    public function isInIce(Player $player) {
        $x = $player->getX();
        $z = $player->getZ();
        $xx = [211,149];
        $zz = [214,294];
        if ($x >= min($xx) && $x <= max($xx) && $z >= min($zz) && $z <= max($zz)) return true;
        return false;
    }
    public function isInDragon(Player $player) {
        $x = $player->getX();
        $z = $player->getZ();
        $xx = [216,287];
        $zz = [301,358];
        if ($x >= min($xx) && $x <= max($xx) && $z >= min($zz) && $z <= max($zz)) return true;
        return false;
    }

    public function isInSteamPunk(Player $player) {
        $x = $player->getX();
        $z = $player->getZ();
        $xx = [301,213];
        $zz = [216,161];
        if ($x >= min($xx) && $x <= max($xx) && $z >= min($zz) && $z <= max($zz)) return true;
        return false;
    }
    public function isNearIce(Player $player) {
        $x = $player->getX();
        $z = $player->getZ();
        $xx = [229,212];
        $zz = [251,263];
        if ($x >= min($xx) && $x <= max($xx) && $z >= min($zz) && $z <= max($zz)) {
            return true;
        } else {
            return false;
        }
    }

    public function isNearSP(Player $player) {
        $x = $player->getX();
        $z = $player->getZ();
        $xx = [262,252];
        $zz = [228,217];
        if ($x >= min($xx) && $x <= max($xx) && $z >= min($zz) && $z <= max($zz)) {
            return true;
        } else {
            return false;
        }
    }

    public function isNearForest(Player $player) {
        $x = $player->getX();
        $z = $player->getZ();
        $xx = [285,300];
        $zz = [264,250];
        if ($x >= min($xx) && $x <= max($xx) && $z >= min($zz) && $z <= max($zz)) {
            return true;
        } else {
            return false;
        }
    }

    public function isNearDragon(Player $player) {
        $x = $player->getX();
        $z = $player->getZ();
        $xx = [248,265];
        $zz = [289,300];
        if ($x >= min($xx) && $x <= max($xx) && $z >= min($zz) && $z <= max($zz)) {
            return true;
        } else {
            return false;
        }
    }
}