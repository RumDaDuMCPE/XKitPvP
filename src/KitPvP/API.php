<?php

namespace KitPvP;


use pocketmine\math\Vector3;
use pocketmine\Player;

class API {

    public const VECTORS = [
        [
            /* Kit Room - Normal */
            'x' => 360,
            'y' => 93,
            'z' => 361,
            'yaw' => 271,
            'pitch' => 3
        ],
        /* Kit Room - VIP */
        [
            'x' => 360,
            'y' => 93,
            'z' => 361,
            'yaw' => 271,
            'pitch' => 3
        ]
    ];

    /**
     * @param Player $player
     * @param int $id
     */
    public function teleport(Player $player, int $id) {
        $x = self::VECTORS[$id]['x'];
        $y = self::VECTORS[$id]['y'];
        $z = self::VECTORS[$id]['z'];
        $vector = new Vector3($x, $y, $z);
        $player->teleport($vector);
        if (isset(self::VECTORS[$id]['yaw'])) {
            $player->setRotation(self::VECTORS[$id]['yaw'], self::VECTORS[$id]['pitch']);
        }
    }

    public function fetchHud(Player $player, int $id) {
        switch ($id) {
            case 0:
                $ak = $player->getServer()->getPluginManager()->getPlugin("AdvancedKits");
                $name = $ak->getPlayerKit($player, false);
                $arena = "";
                if (!(isset($ak->hasKit[strtolower($player->getName())]))) {
                    $kit = "§dYou aren't equipped with a kit!\n§dEnter a portal to choose a kit.";
                } else {
                    $kit = "§dChosen kit: §b§l" . ucfirst($name);
                }
                return
                    "§l§fX§cFurnus §r§eKit-PvP\n" .
                    "§7- §6\n" .
                    $kit .
                    $arena;
                break;

            case 1:
                $economy = $player->getServer()->getPluginManager()->getPlugin("EconomyAPI");
                $money = $economy->myMoney($player);
                $ak = $player->getServer()->getPluginManager()->getPlugin("AdvancedKits");
                $name = $ak->getPlayerKit($player, false);
                if (!(isset($ak->hasKit[strtolower($player->getName())]))) {
                    $kit = "§l§dSelect a kit";
                } else {
                    $kit = "$name";
                }
                return
                    "§l§fX§cFurnus §r§eKit-PvP"."\n".
                    "§7-§r"."\n§l§b".
                    ucfirst($kit)." §r§8|§a§l $".$money."\n".
                    "§r§o§7Use the command /spawn to return!";


        }
    }

}