<?php

namespace KitPvP\player\commands;



use KitPvP\BaseCommand;
use KitPvP\Loader;
use pocketmine\command\CommandSender;
use pocketmine\Player;

class SpawnCommand extends BaseCommand {

    /**
     * Factions constructor.
     * @param Loader $loader
     **/

    public function __construct(Loader $loader)
    {
        parent::__construct($loader, 'spawn', 'Teleports you to spawn.', null, false, ['spwn']);
    }

    /**
     * @param CommandSender $sender
     * @param string $commandLabel
     * @param array $args
     * @return mixed|void
     */
    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if ($sender instanceof Player)
            $sender->teleport($sender->getLevel()->getSafeSpawn());
    }
}