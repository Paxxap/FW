<div <?if (array_key_exists("attr", $params))
{
 foreach ($params["attr"] as $key => $value) {echo "$key=$value";}
}
 ?>>
  <p> <?= $params["title"]; ?> </p>
  <textarea class=<?= $params["additional_class"];?> name=<?= $params["name"]; ?>> </textarea>
</div>
