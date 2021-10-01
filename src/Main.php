<?php
namespace EconomyAddon;
use pocketmine\plugin\PluginBase;
use Ifera\ScoreHud\scoreboard\ScoreTag;
use Ifera\ScoreHud\event\PlayerTagUpdateEvent;
use Ifera\ScoreHud\event\ServerTagUpdateEvent;
use Ifera\ScoreHud\event\TagsResolveEvent;
use pocketmine\event\Listener;
use onebone\economyapi\EconomyAPI;

class Main extends PluginBase implements Listener {
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
