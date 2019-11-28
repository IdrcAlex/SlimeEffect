<?php

namespace SlimeEffect\Events;

use pocketmine\entity\Effect;
use pocketmine\entity\EffectInstance;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\utils\TextFormat;
use SlimeEffect\Main;

class BlockEvent implements Listener{
    private $main;
    public function __construct(Main $main)
    {
        $this->main = $main;
    }

    public function BlockEvent(PlayerInteractEvent $event){
        $player = $event->getPlayer();
        if($player instanceof Player && $player->getInventory()->getItemInHand()->getId() === Item::SLIME_BALL){
            $player->addEffect(new EffectInstance(Effect::getEffect(Effect::SPEED), 20 * 3600, 0));
            $player->sendMessage(TextFormat::AQUA . "Slime Effect Enabled!");
            $slime = Item::get(Item::SLIME_BALL);
            $player->getInventory()->removeItem($slime);
        }
    }
}
