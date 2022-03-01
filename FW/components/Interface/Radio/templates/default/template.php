<div>
  <p> <?= $params["title"]; ?> </p>
  <div>
    <input
    <? if(array_key_exists("multiple", $params)) ?> multiple
     type="radio" name=<?= $params["name"]; ?> value=<?= $params["value"]; ?>/>
  </div>
</div>
