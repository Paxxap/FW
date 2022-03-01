<div class="row mb-3">
  <p><?= $params["title"]; ?></p>
  <input class=<?= $params["additional_class"]; ?>
  <?  if(array_key_exists("multiple", $params)) ?> multiple
  name=<?= $params["name"]; ?> default=<?= $params["default"]; ?>
  type="text" data-id=<?= $params["data-id"]; ?>/>
</div>
