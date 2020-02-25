<?php


//Checks Title for keywords and 
//uses those to create categories
//We are using our own Main categories so only 
//sub and subsub categroies need to be created.
//Call function
//    [get_subcat_from_title({combination_name[1]},{category[1]})]

//Function
function get_cat_from_title($title, $defaultcat)
{
   if (strpos($title, "Kask") !== false) {
      $cat = "Rower";
   } elseif (strpos($title, "Rower") !== false) {
      $cat = "Rower";
   } elseif (strpos($title, "Buty") !== false) {
      $cat = "Bieg";
   } elseif (strpos($title, "But") !== false) {
      $cat = "Bieg";
   } elseif (strpos($title, "Skarpety") !== false) {
      $cat = "Bieg";
   } elseif (strpos($title, "Skarpetki") !== false) {
      $cat = "Bieg";
   } elseif (strpos($title, "Kamizelka") !== false) {
      $cat = "Bieg";
   } elseif (strpos($title, "Koszulka") !== false) {
      $cat = "Bieg";
   } elseif (strpos($title, "Kalesony") !== false) {
      $cat = "Bieg";
   } elseif (strpos($title, "T-Shirt") !== false) {
      $cat = "Bieg";
   } elseif (strpos($title, "T-shirt") !== false) {
      $cat = "Bieg";
   } elseif (strpos($title, "T-SHIRT") !== false) {
      $cat = "BIEG";
   } elseif (strpos($title, "Bluza") !== false) {
      $cat = "Bieg";
   } elseif (strpos($title, "Spodnie") !== false) {
      $cat = "Bieg";
   } elseif (strpos($title, "Spodenki") !== false) {
      $cat = "Bieg";
   } elseif (strpos($title, "Getry") !== false) {
      $cat = "Bieg";
   } elseif (strpos($title, "Kurtka") !== false) {
      $cat = "Bieg";
   } elseif (strpos($title, "Koszulka") !== false) {
      $cat = "Bieg";
   } elseif (strpos($title, "Bieg") !== false) {
      $cat = "Bieg";
   } elseif (strpos($title, "Opaska") !== false) {
      $cat = "Bieg";
   } elseif (strpos($title, "Czapka") !== false) {
      $cat = "Bieg";
   } elseif (strpos($title, "Kominiarka") !== false) {
      $cat = "Bieg";
   } elseif (strpos($title, "Ocieplacz") !== false) {
      $cat = "Bieg";
   } elseif (strpos($title, "Stanik") !== false) {
      $cat = "Bieg";
   } elseif (strpos($title, "Bokserki") !== false) {
      $cat = "Bieg";
   } elseif (strpos($title, "Okulary") !== false) {
      $cat = "Okulary sportowe/Gogle";
   } elseif (strpos($title, "Gogle") !== false) {
      $cat = "Okulary sportowe/Gogle";
   } elseif (strpos($title, "Zestaw do kastomizacji") !== false) {
      $cat = "Okulary sportowe/Gogle";
   } elseif (strpos($title, "Soczewki") !== false) {
      $cat = "Okulary sportowe/Gogle";
   } elseif (strpos($title, "Zauszniki") !== false) {
      $cat = "Okulary sportowe/Gogle";
   } elseif (strpos($title, "Szyba") !== false) {
      $cat = "Okulary sportowe/Gogle";
   } elseif (strpos($title, "Wkładki") !== false) {
      $cat = "Rower";
   } elseif (strpos($title, "Wymienne paski") !== false) {
      $cat = "Rower";
   } elseif (strpos($title, "Śruby") !== false) {
      $cat = "Rower";
   } elseif (strpos($title, "System regulacji") || strpos($title, "Klamra do pasków") || strpos($title, "Pokrywa wentylacyjna") || strpos($title, "Owiewka")  !== false) {
      $cat = "Rower";
   } elseif (strpos($title, "Wkładki optyczne") !== false) {
      $cat = "Okulary sportowe/Gogle";
   } elseif (strpos($title, "Części do okularów") !== false) {
      $cat = "Okulary sportowe/Gogle";
   } elseif (strpos($title, "Nakładka") !== false) {
      $cat = "Okulary sportowe/Gogle";
   } elseif (strpos($title, "Noski") !== false) {
      $cat = "Okulary sportowe/Gogle";
   } elseif (strpos($title, "Oprawki") !== false) {
      $cat = "Okulary sportowe/Gogle";
   } elseif (strpos($title, "ZYON SIDE SHIELDS") !== false) {
      $cat = "Okulary sportowe/Gogle";
   } elseif (strpos($title, "OPTICAL DOCK") !== false) {
      $cat = "Okulary sportowe/Gogle";
   } elseif (strpos($title, "VULCAN Rudy Project ") !== false) {
      $cat = "Okulary sportowe/Gogle";
   } elseif (strpos($title, "Pokrowiec") !== false) {
      $cat = "Rower";
   } elseif (strpos($title, "Torba") !== false) {
      $cat = "Triathlon";
   } elseif (strpos($title, "Plecak") !== false) {
      $cat = "Triathlon";
   } elseif (strpos($title, "Ochraniacz") !== false) {
      $cat = "Triathlon";
   } elseif (strpos($title, "Daszek") !== false) {
      $cat = "Rower";
   } else {
      $cat = "BLAD";
   }
   return $cat;
}


//Checks Title for keywords and uses those to create subcategories
//Function
function get_subcat_from_title($title, $defaultcat)
{
   if (strpos($title, "Kask") !== false) {
      $cat = "Kaski rowerowe";
   } elseif (strpos($title, "Buty biegowe") !== false) {
      $cat = "Buty biegowe";
   } elseif (strpos($title, "But") !== false) {
      $cat = "Buty biegowe";
   } elseif (strpos($title, "Skarpety") !== false) {
      $cat = "Odzież biegowa";
   } elseif (strpos($title, "Skarpetki") !== false) {
      $cat = "Odzież biegowa";
   } elseif (strpos($title, "Kamizelka") !== false) {
      $cat = "Odzież biegowa";
   } elseif (strpos($title, "Koszulka") !== false) {
      $cat = "Odzież biegowa";
   } elseif (strpos($title, "Kalesony") !== false) {
      $cat = "Odzież biegowa";
   } elseif (strpos($title, "T-Shirt") !== false) {
      $cat = "Odzież biegowa";
   } elseif (strpos($title, "T-shirt") !== false) {
      $cat = "Odzież biegowa";
   } elseif (strpos($title, "T-SHIRT") !== false) {
      $cat = "Odzież biegowa";
   } elseif (strpos($title, "Bluza") !== false) {
      $cat = "Odzież biegowa";
   } elseif (strpos($title, "Spodnie") !== false) {
      $cat = "Odzież biegowa";
   } elseif (strpos($title, "Spodenki") !== false) {
      $cat = "Odzież biegowa";
   } elseif (strpos($title, "Getry") !== false) {
      $cat = "Odzież biegowa";
   } elseif (strpos($title, "Kurtka") !== false) {
      $cat = "Odzież biegowa";
   } elseif (strpos($title, "Koszulka") !== false) {
      $cat = "Odzież biegowa";
   } elseif (strpos($title, "Opaska") !== false) {
      $cat = "Opaski";
   } elseif (strpos($title, "Czapka") !== false) {
      $cat = "Czapki";
   } elseif (strpos($title, "Kominiarka") !== false) {
      $cat = "Kominiarki";
   } elseif (strpos($title, "Ocieplacz") !== false) {
      $cat = "Ocieplacze";
   } elseif (strpos($title, "Stanik") !== false) {
      $cat = "Bielizna";
   } elseif (strpos($title, "Bokserki") !== false) {
      $cat = "Bielizna";
   } elseif (strpos($title, "Zestaw do kastomizacji") !== false) {
      $cat = "Części i akcesoria do okularów/gogli";
   } elseif (strpos($title, "Soczewki") !== false) {
      $cat = "Części i akcesoria do okularów/gogli";
   } elseif (strpos($title, "Zauszniki") !== false) {
      $cat = "Części i akcesoria do okularów/gogli";
   } elseif (strpos($title, "Szyba") !== false) {
      $cat = "Części i akcesoria do okularów/gogli";
   } elseif (strpos($title, "Wkładki") !== false) {
      $cat = "Kaski rowerowe";
   } elseif (strpos($title, "Wymienne paski") !== false) {
      $cat = "Kaski rowerowe";
   } elseif (strpos($title, "Śruby") !== false) {
      $cat = "Kaski rowerowe";
   } elseif (strpos($title, "System regulacji") || strpos($title, "Klamra do pasków") || strpos($title, "Pokrywa wentylacyjna") || strpos($title, "Owiewka")  !== false) {
      $cat = "Kaski rowerowe";
   } elseif (strpos($title, "Wkładki optyczne") !== false) {
      $cat = "Części i akcesoria do okularów/gogli";
   } elseif (strpos($title, "Części do okularów") !== false) {
      $cat = "Części i akcesoria do okularów/gogli";
   } elseif (strpos($title, "Nakładka") !== false) {
      $cat = "Części i akcesoria do okularów/gogli";
   } elseif (strpos($title, "Noski") !== false) {
      $cat = "Części i akcesoria do okularów/gogli";
   } elseif (strpos($title, "Oprawki") !== false) {
      $cat = "Części i akcesoria do okularów/gogli";
   } elseif (strpos($title, "ZYON SIDE SHIELDS") !== false) {
      $cat = "Części i akcesoria do okularów/gogli";
   } elseif (strpos($title, "OPTICAL DOCK") !== false) {
      $cat = "Części i akcesoria do okularów/gogli";
   } elseif (strpos($title, "VULCAN Rudy Project ") !== false) {
      $cat = "Części i akcesoria do okularów/gogli";
   } elseif (strpos($title, "Pokrowiec") !== false) {
      $cat = "Pozostałe akcesoria rowerowe";
   } elseif (strpos($title, "Torba") !== false) {
      $cat = "Akcesoria triathlonowe";
   } elseif (strpos($title, "Plecak") !== false) {
      $cat = "Akcesoria triathlonowe";
   } elseif (strpos($title, "Ochraniacz") !== false) {
      $cat = "Akcesoria triathlonowe";
   } elseif (strpos($title, "Daszek") !== false) {
      $cat = "Kaski rowerowe";
   } else {
      $cat = $defaultcat;
   }
   return $cat;
}


function get_subsubcat_from_title($title, $defaultcat)
{
   if (strpos($title, "Wkładki") !== false) {
      $cat = "Części i akcesoria do kasków";
   } elseif (strpos($title, "Daszek") !== false) {
      $cat = "Części i akcesoria do kasków";
   } elseif (strpos($title, "Wymienne paski") !== false) {
      $cat = "Części i akcesoria do kasków";
   } elseif (strpos($title, "Śruby") !== false) {
      $cat = "Części i akcesoria do kasków";
   } elseif (strpos($title, "System regulacji") || strpos($title, "Klamra do pasków") || strpos($title, "Pokrywa wentylacyjna") || strpos($title, "Owiewka")  !== false) {
      $cat = "Części i akcesoria do kasków";
   } else {
      $cat = $defaultcat;
   }
   return $cat;
}
