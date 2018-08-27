<?php

namespace KitPvP;

use pocketmine\command\Command;
use pocketmine\command\PluginIdentifiableCommand;
use pocketmine\plugin\Plugin;
use pocketmine\utils\TextFormat as c;
use pocketmine\command\CommandSender;
use pocketmine\Player;

abstract class BaseCommand extends Command implements PluginIdentifiableCommand {
    /** @var Loader */
    private $loader;
    /** @var bool|string */
    private $consoleUsageMessage;

    /**
     *
     * @param Loader $loader;
     * @param string $name
     * @param string $description
     * @param null|string $usageMessage
     * @param bool|null|string $consoleUsageMessage
     * @param array $aliases
     */
    public function __construct(Loader $loader, $name, $description = "", $usageMessage = null, $consoleUsageMessage = true, array $aliases = []) {
        parent::__construct ( $name, $description, $usageMessage, $aliases );
        $this->loader = $loader;
        $this->consoleUsageMessage = $consoleUsageMessage;
    }

    /**
     *
     * @return Loader
     */
    public final function getPlugin(): Plugin {
        return $this->loader;
    }

    /**
     *
     * @return string
     */
    public function getUsage(): string {
        return "/" . parent::getName () . " " . parent::getUsage ();
    }

    /**
     *
     * @return bool|null|string
     */
    public function getConsoleUsage() {
        return $this->consoleUsageMessage;
    }

    /**
     *
     * @param CommandSender $sender
     * @param string $alias
     */
    public function sendUsage(CommandSender $sender, string $alias) {
        $message = c::BOLD . c::DARK_AQUA . "Usage: " . c::RESET . c::YELLOW . "/$alias";
        if (! ($sender instanceof Player)) {
            if (is_string ( $this->consoleUsageMessage )) {
                $message .= $this->consoleUsageMessage;
            } elseif (! ($this->consoleUsageMessage)) {
                $message .= c::BOLD . c::DARK_RED . "(" . c::RED . "�" . c::DARK_RED . ")" . c::RESET . c::RED . " Please run this command in-game.";
            } else {
                $message .= str_replace ( "[player]", "<player>", parent::getUsage () );
            }
        } else {
            $message .= parent::getUsage ();
        }
        $sender->sendMessage ( $message );
    }
}
