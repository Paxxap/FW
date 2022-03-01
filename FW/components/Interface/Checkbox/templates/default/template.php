<div>
  <input class=<?= $params["additional_class"];
  if(array_key_exists("multiple", $params)) ?> multiple
  type="checkbox" name=<?= $params["name"]; ?> value="yes"/> <?= $params["title"]; ?>
</div>
