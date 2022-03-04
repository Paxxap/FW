<div class="row mb-3">
  <p> <?= $params["title"]; ?> </p>
  <div <?if (array_key_exists("attr", $params))
  {
   foreach ($params["attr"] as $key => $value) {echo "$key=$value";}
  }
   ?>>
    <input class=<?= $params["additional_class"];?>
     type="radio" name=<?= $params["name"]; ?> value=<?= $params["value"]; ?>/>
  </div>
</div>
