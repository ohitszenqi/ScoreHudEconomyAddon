<?php
namespace EconomyAddon;
# Imports the class
use pocketmine\plugin\PluginBase;
use Ifera\ScoreHud\scoreboard\ScoreTag;
use Ifera\ScoreHud\event\PlayerTagUpdateEvent;
use Ifera\ScoreHud\event\ServerTagUpdateEvent;
use Ifera\ScoreHud\event\TagsResolveEvent;
use pocketmine\event\Listener;
use onebone\economyapi\EconomyAPI;
# Uses the main class and gives the permission to use events.
class Main extends PluginBase implements Listener {
  # register the events idk if its needed LOL
  public function onEnabled() {
    $this->getLogger()->info("Addon enabled.");
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
}
# registers the economy tag :)
  public function onTagResolve(TagsResolveEvent $event){
      	$player = $event->getPlayer();
      	$tag = $event->getTag();
      	new ScoreTag("economy.money", "{EconomyAPI::getInstance()->myMoney($player)}");
      	    	switch($tag->getName()){
      	    	  case "economy.money":
      	    	    $tag->setValue(EconomyAPI::getInstance()->myMoney($player));
      	    	    break;
      	    	}
  }
}
