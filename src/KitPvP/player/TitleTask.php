<?php

namespace KitPvP\player;


use pocketmine\Player;
use pocketmine\scheduler\Task;

class TitleTask extends Task {

    private $player;

    public function __construct(Player $player)
    {
        $this->player = $player;
    }

    public function onRun(int $currentTick)
    {
        $title = '.l.fX.cFurnus';
        $subtitle = '.eWelcome'.($this->player->hasPlayedBefore() ? ' back' : '').', %player%';
        $this->player->addTitle($title, str_replace('%player', $this->player->getNameTag(), $subtitle), 20, 20 * 3, 20);
    }

}