<?php

namespace KitPvP\regions;


use pocketmine\math\AxisAlignedBB;
use pocketmine\Player;

class SpawnRegion {

    private $portals = [
        0 => ['x' => [231,233], 'z' => [260]],
        1 => ['x' => [279,281], 'z' => [252]],
        2 => ['x' => [260], 'z' => [279,281]],
        3 => ['x' => [252], 'z' => [279,281]],
        4 => ['x' => [252], 'z' => [279,281]],
        5 => ['z' => [232,234], 'x' => [260]]
    ];


    /*
     * NOTE: Player class is an instance of Position.
     *       Player -> Human > Creature > Living > Entity -> Position.
     */

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

    /**
     * @param Player $vector3
     * @return bool
     */
    public function enteringPortal(Player $vector3) : bool
    {
        $y = [0, 700];
        for ($i = 0; $i < count($this->portals); $i++) {
            $x = $this->portals[$i]['x'];
            $z = $this->portals[$i]['z'];
            $x = min($x);
            $X = max($x);
            $z = min($z);
            $Z = max($z);
            $axis = [new AxisAlignedBB($x, $X, min($y), max($y), $z, $Z)];
            for ($i = 0; $i < count($axis); $i++) {
                if ($axis[$i]->isVectorInside($vector3)) {
                    return true;
                }
            }
        }
        return false;
    }

}