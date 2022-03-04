<div class="container" <?if (array_key_exists("attr", $params))
{
 foreach ($params["attr"] as $key => $value) {echo "$key=$value";}
}
 ?>>
 <form class=<?=$params["additional_class"];?> action=<?= $params["action"]; ?> method=<?= $params["method"];?>>
   <div class="stripes-block">
