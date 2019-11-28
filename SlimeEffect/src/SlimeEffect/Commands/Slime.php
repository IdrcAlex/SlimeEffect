<?php

namespace SlimeEffect\Commands;

use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\utils\Config;
use SlimeEffect\Main;

class Slime extends PluginCommand
{
    private $main;

    public function __construct(string $name, Main $main)
    {
        parent::__construct($name, $main);
        $this->main = $main;
        $this->setDescription("Slime Effect");
        $this->setPermission("slime.cmd");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if($sender instanceof Player) {
            if($sender->hasPermission("slime.cmd")) {
                $config = new Config($this->main->getDataFolder(). "config.yml", Config::YAML);
                $name = $config->get("name");
                $slime = Item::get(Item::SLIME_BALL);
                $slime->setCustomName($name);
                $sender->getInventory()->addItem($slime);
            }
        }
    }
}