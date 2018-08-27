<?php

namespace KitPvP\player;


use pocketmine\Player;
use pocketmine\scheduler\Task;
use pocketmine\utils\TextFormat;

class TitleTask extends Task {

    private $player;

    public function __construct(Player $player)
    {
        $this->player = $player;
    }

    public function onRun(int $currentTick)
    {
        $title = '.l.fX.cFurnus';
        $subtitle = '.eWelcome'.($this->player->hasPlayedBefore() ? ' back' : '').', .l.b%player%';
        $this->player->addTitle(TextFormat::colorize($title, '.'), TextFormat::colorize(str_replace('%player%', $this->player->getNameTag(), $subtitle), '.'), 20, 20 * 3, 20);
    }

}