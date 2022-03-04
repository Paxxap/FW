<div class="row mb-3">
  <div <?if (array_key_exists("attr", $params))
  {
   foreach ($params["attr"] as $key => $value) {echo "$key=$value";}
  }
   ?>>
  <p> <?= $params["title"]; ?> </p>
  <input class=<?= $params['additional_class'] ?> name= <?= $params["name"]?> type="tel"/>
</div>
</div>
