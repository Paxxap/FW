<div class="row mb-3">
  <div <?if (array_key_exists("attr", $params))
  {
   foreach ($params["attr"] as $key => $value) {echo "$key=$value";}
  } ?>>
  <? foreach ($params["list"] as $option) ?>
  <p><?= $option["title"]; ?></p>
  <input class=<?= $option["additional_class"];?> name=<?= $params["name"]; ?> default="<?=$params["default"]; ?>"
  type=<?= $params["type"];?>/>
<? endforeach; ?>
  </div>
</div>
