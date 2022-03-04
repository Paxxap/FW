<div class="row mb-3">
  <p><?= $params["title"]; ?></p>
  <div <?
  if (array_key_exists("attr", $params))
  {
   foreach ($params["attr"] as $key => $value) {echo "$key=$value";}
  } ?>>
  <div id="input0"></div>
  <input class=<?= $params["additional_class"];?> name=<?= $params["name"]; ?> default="<?=$params["default"]; ?> "type="text"/>
  <div class="add" onclick="addInput(this)">+</div>
  </div>
</div>
