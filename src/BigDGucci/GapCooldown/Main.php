<?php

namespace BigDGucci\GapCooldown;

use pocketmine\plugin\PluginBase;
use pocketmine\plugin\Plugin;
use pocketmine\event\player\PlayerItemConsumeEvent;

class Main extends PluginBase implements Listener {
    
   private $cooldownArray = 60;
   private $timer = [];
   }
    
      public function onEnable(){
          $this->getLogger()->info("GapCooldown By BigDGucci Enabled!");
      }
  
      public function onDisable(){
          $this->getLogger()->info("GapCooldown By BigDGucci Disabled!");
      }  

      public function onConsume(PlayerItemConsumeEvent $event){
          if($event->getItem()->getId() === Item::ENCHANTED_GOLDEN_APPLE){
          //using isset may be unneccesary.
             if($this->cooldownArray[$event->getPlayer()->getName()]) && $this->cooldownArray[$event->getPlayer()->getName()] - time() < 60) {
             //Player ate a Golden Apple within the last 60 seconds
             $event->setCancelled();
             }else{
             //There is no cooldown for the player.
             $this->cooldownArray[$event->getPlayer()->getName()] = time();
                 break;
             }
          }
      }
   }
}
