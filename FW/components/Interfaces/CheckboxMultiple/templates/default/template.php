  <div <?if (array_key_exists("attr", $params))
  {
   foreach ($params["attr"] as $key => $value) {echo "$key=$value";}
  }?>
  class=<?= $params["additional_class"];?>>
  <p><?= $params["title"];?></p>
  <? foreach($params["list"] as $option): ?>
  <input type="checkbox" name=<?=$params["name"]; ?> value=<?=$option["value"];?>/> <?=$option["title"]; ?>
  </div>
  <? endforeach; ?>
