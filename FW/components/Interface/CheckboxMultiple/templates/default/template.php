  <? foreach($params["list"] as $option) ?>
  <div <?if (array_key_exists("attr", $params))
  {
   foreach ($params["attr"] as $key => $value) {echo "$key=$value";}
  }
   ?>>
  <input class=<?= $option["additional_class"];?>
  type=<?=$params["type"]; ?> name=<?= $params["name"]; ?> value="yes"/> <?= $option["title"]; ?>>
  </div>
<? endforeach; ?>
