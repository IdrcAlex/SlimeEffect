<?php

namespace SlimeEffect;

use SlimeEffect\Commands\Slime;
use SlimeEffect\Events\BlockEvent;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase
{

    public function onEnable()
    {
        $this->saveDefaultConfig();
        $this->getServer()->getLogger()->info("Plugin Enabled!");
        $this->initCommands();
        $this->initEvents();
    }

    public function initCommands(){
       $cm = $this->getServer()->getCommandMap();

       $cm->register("slime", new Slime("slime", $this));
    }

    public function initEvents(){
        $em = $this->getServer()->getPluginManager();

        $em->registerEvents(new BlockEvent($this), $this);
    }


    public function onDisable()
    {
       $this->getServer()->getLogger()->info("Plugin Disabled!");
    }
}