<?php

require_once("magpierss/rss_fetch.inc");

function FeedParser($url_feed, $nb_items_affiches=10)
{
  $rss = fetch_rss($url_feed);


  if (is_array($rss->items))
  {
   $items = array_slice($rss->items, 0, $nb_items_affiches);

   $html = "<div class=\"items\">\n";
   $i = 1;

   foreach ($items as $item)
   {
    $html .= "<div class=\"item\"><h3 class=\"text-center\">".$item['title']."</h3>";
    //$html .= "<div class=\"item\"><h3 class=\"text-center\">Titre en course de modification</h3>";
    $html .= "<p id=\"pnews\"><h4>".$item['description']."</h4></p>";
    $html .= "<p class=\"text-center\"><a target=\"_blank\" href=\"".$item['link']."\">[+] Lire la suite</a></p></div><br><hr>";
   }
   $html .= "</div>\n";
 }

 return utf8_encode($html);
}
?>