<?php
namespace Gumbratt\UnlimitedSlots;
	
use pocketmine\plugin\PluginBase as Plugin;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerKickEvent;
use pocketmine\utils\TextFormat as Color;
			
	class Main extends Plugin implements Listener {
		public function onEnable() {
			$this->getServer()->getPluginManager()->registerEvents($this, $this);
                        $this->saveDefaultConfig();
                        $this->reloadConfig();
			$this->getServer()->getLogger()->info("Unlimited Enabled!");
		}
		
		public function onPlayerKick(PlayerKickEvent $event) {
                        $playersOnline=count($server->getOnlinePlayers());
                        $config=$this->getConfig();
			if($event->getReason() === "disconnectionScreen.serverFull" && $config->get("MaxPlayers") >== $playersOnline)
                                $player=$event->getPlayer();
                                $player->sendMessage(Color::PURPLE."The server currently has more players than it can hold. The server may become unstable or crash.");
				$event->setCancelled(true);
		}
		
		public function onDisable() {
			$this->getServer()->getLogger()->info("Unlimited is no longer enabled! Did the server stop?");
		}
}
