<?php

namespace KitPvP;


use KitPvP\arena\pvp\CustomKill;
use KitPvP\arena\pvp\fx\BloodEffect;
use KitPvP\player\commands\SpawnCommand;
use KitPvP\player\JoinEvent;
use KitPvP\player\MoveEvent;
use KitPvP\regions\ArenaRegion;
use KitPvP\regions\SpawnRegion;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Loader extends PluginBase
{

    public static $instance;

    public function onEnable()
    {
        $this->registerEvents();
        $this->registerCommands();
        $this->sendEnabledMessage(0);
        self::$instance = $this;
    }

    private function registerEvents()
    {
        foreach ([
            new CustomKill($this),
            new BloodEffect($this),
            new JoinEvent($this),
            new MoveEvent($this),
                 ] as $event) {
            $this->getServer()->getPluginManager()->registerEvents($event, $this);
        }
    }

    private function registerCommands() {
        $commands = [
            new SpawnCommand($this)
        ];
        $aliased = [];
        foreach ($commands as $cmd) {
            /** @var BaseCommand $cmd */
            $commands [$cmd->getName()] = $cmd;
            $aliased [$cmd->getName()] = $cmd->getName();
            foreach ($cmd->getAliases() as $alias) {
                $aliased [$alias] = $cmd->getName();
            }
        }
        $this->getServer()->getCommandMap()->registerAll("XCore", $commands);

    }

    public static function getInstance()
    {
        return self::$instance;
    }

    public function getRegion(int $id)
    {
        $regions = [
            new SpawnRegion(),
            new ArenaRegion()
        ];
        return $regions[$id];
    }

    private function sendEnabledMessage(int $style) {
        $s = str_repeat(" ", 40);
        $ver = $this->getDescription()->getVersion();
        switch ($style) {
            case 0: // Graffiti
                $graffiti = TextFormat::colorize(
                    "".PHP_EOL.
                    $s."&f____  ___&c_________                       ".PHP_EOL.
                    $s."&f\   \/  /&c\_   ___ \  ___________   ____  ".PHP_EOL.
                    $s."&f \     / &c/    \  \/ /  _ \_  __ \_/ __ \ ".PHP_EOL.
                    $s."&f /     \ &c\     \___(  <"."_"."> )  | \/\  ___/ ".PHP_EOL.
                    $s."&f/___/\  \ &c\______  /\____/|__|    \___  >".PHP_EOL.
                    $s."&f      \_/        &c\/                   \/ ".PHP_EOL.
                    $s."&e                      v$ver".PHP_EOL.PHP_EOL.
                    $s."&b         Copyright (c) 2018 &fX&cFurnus &6Games&b".PHP_EOL.
                    $s."              All Rights Reserved.".PHP_EOL.
                    $s."    This product is protected by copyright and".PHP_EOL.
                    $s."   distributed under licenses restricting copying,".PHP_EOL.
                    $s."         distribution and de-compilation.".PHP_EOL
                );
                $this->getServer()->getLogger()->info($graffiti);
                break;
        }
    }
}