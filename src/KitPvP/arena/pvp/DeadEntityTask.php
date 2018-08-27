<?php

namespace KitPvP\arena\pvp;


use pocketmine\entity\Human;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\DoubleTag;
use pocketmine\nbt\tag\FloatTag;
use pocketmine\nbt\tag\ListTag;
use pocketmine\nbt\tag\StringTag;
use pocketmine\Player;
use pocketmine\scheduler\Task;

class DeadEntityTask extends Task {

    private $player;
    private $seconds = 3;
    
    public function __construct(Player $player)
    {
        $this->player = $player;
    }
    
    public function onRun(int $currentTick)
    {
            $nbt = new CompoundTag("", [
                    "Pos" => new ListTag("Pos", [
                        new DoubleTag("", $this->player->getX()),
                        new DoubleTag("", $this->player->getY() + 1),
                        new DoubleTag("", $this->player->getZ())
                    ]),
                    "Motion" => new ListTag("Motion", [
                        new DoubleTag("", 0),
                        new DoubleTag("", 0),
                        new DoubleTag("", 0)
                    ]),
                    "Rotation" => new ListTag("Rotation", [
                        new FloatTag("", $this->player->getPitch()),
                        new FloatTag("", $this->player->getYaw())
                    ]),
                    "Skin" => new CompoundTag("Skin", [
                        "Data" => new StringTag("Data", $this->player->getSkin()),
                    ])
                ]
            );

            $npc = new Human($this->player->getLevel(), $nbt);
            $npc->setDataFlag(Human::DATA_PLAYER_FLAGS, Human::DATA_PLAYER_FLAG_SLEEP, true, Human::DATA_TYPE_BYTE);
            $npc->setNameTag("§c" . $this->player->getName());
            $npc->setNameTagVisible(false);

        if ($this->seconds === 3) {
            $npc->spawnToAll();
        }
        if ($this->seconds === 0) {
            $npc->despawnFromAll();
            $npc->close();
            $this->getHandler()->cancel();
        }
        --$this->seconds;
    }
}