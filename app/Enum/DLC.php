<?php

namespace App\Enum;


class DLC
{
   use ListConstants;

   const  DLC_BASE_GAME  = 0;
   const  DLC_IMPERIAL_CITY = 1;
   const  DLC_ORSINIUM = 2;
   const  DLC_THIEVES_GUILD = 3;
   const  DLC_DARK_BROTHERHOOD = 4;
   const  DLC_SHADOWS_OF_THE_HIST = 5;
   const  DLC_MORROWIND = 6;
   const  DLC_HORNS_OF_THE_REACH = 7;
   const  DLC_CLOCKWORK_CITY = 8;
   const  DLC_DRAGON_BONES = 9;
   const  DLC_SUMMERSET = 10;
   const  DLC_WOLFHUNTER = 11;
   const  DLC_MURKMIRE = 12;
   const  DLC_WRATHSTONE = 13;
   const  DLC_ELSWEYR = 14;
   const  DLC_SCALEBREAKER = 15;
   const  DLC_DRAGONHOLD = 16;
   const  DLC_HARROWSTORM = 17;
   const DLC_GREYMOOR  = 18;
   


   public static function getDlcLabel($const)
   {
      $rarLabel = DLC::getLabel($const);
      $newstr = str_replace('Dlc', '', $rarLabel);
      return trim($newstr);
   }
}
