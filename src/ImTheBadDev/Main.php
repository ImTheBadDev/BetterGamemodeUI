
<?php

namespace ImTheBadDev;

use pocketmine\player\Player;

use pocketmine\Server;

use pocketmine\event\Listener as L;

use pocketmine\plugin\PluginBase as P;

use pocketmine\command\CommandSender;

use pocketmine\command\Command;

use pocketmine\player\GameMode;

#libs

use libs\FormAPI\SimpleForm;

class Main extends P implements L {

  

  public $prefix = "§7[§a√§7] ";

  

  public function onEnable(): void {

    

  $this->getServer()->getLogger()->info($this->prefix."CookiePE - BestGamemodeUI

Plugin Is Running...

Author: ImTheBadDev

Discors; ImTheBadDev#4090");                                                                                                                                                                                                                                                                                                                                                                                       

  

  }

  

  public function onCommand(CommandSender $pl, Command $cmd, string $label, array $args): bool{

    switch($cmd->getName()){

      case "gmui":

        if($pl->hasPermission("cookiepe.gmui.use")){

          $this->getGamemodes($pl);

        }else{

          

        }

      break;

    }

    return true;

  }

  

  public function getGamemodes(Player $pl){

    $form = new SimpleForm(function (Player $pl, int $data = null){

      if($data === null){

        return true;

      }

      switch($data){

        case 0:

          $pl->setGamemode(GameMode::SURVIVAL());

          $pl->sendTip($this->prefix."§bYour Game Mode Was Changed To Survival Mode Successfully");

        break;

        case 1:

          $pl->setGamemode(GameMode::CREATIVE());

          $pl->sendTip($this->prefix."§bYour Game Mode Was Changed To Creative Mode Successfully");

        break;

        case 2:

          $pl->setGamemode(GameMode::SPECTATOR());

          $pl->sendTip($this->prefix."§bYour Game Mode Was Changed To Spectator Mode Successfully");

        break;

        case 3:

          $pl->setGamemode(GameMode::ADVENTURE());

          $pl->sendTip($this->prefix."§bYour Game Mode Was Changed To Adventure Mode Successfully");

        break;

      }

    });

    $form->setTitle("§l§eCookie§6PE");

    $form->SetContent("§l§bSelect Mode");

    $form->addButton("§l§aSurvival");

    $form->addButton("§l§cCreative");

    $form->addButton("§l§fSpectator");

    $form->addButton("§l§eAdventure");

    $form->sendToPlayer($pl);

    return $form;

  }

}

