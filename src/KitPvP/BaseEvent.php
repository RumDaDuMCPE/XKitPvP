<?php

namespace KitPvP;

use pocketmine\event\Listener;

abstract class BaseEvent implements Listener
{
    /** @var Loader */
    private $loader;

    /**
     * BaseEvent constructor.
     * @param Loader $loader
     */
    public function __construct(Loader $loader)
    {
        $this->loader = $loader;
    }

    /**
     * @return Loader
     */
    public function getPlugin(): Loader
    {
        return $this->loader;
    }

    /**
     * @return API
     */
    public function getAPI() : API {
        return new API();
    }
}