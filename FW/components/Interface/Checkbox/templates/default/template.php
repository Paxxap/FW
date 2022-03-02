<div <?if (array_key_exists("attr", $params))
{
 foreach ($params["attr"] as $key => $value) {echo "$key=$value";}
}
 ?>>
  <input class=<?= $params["additional_class"];?>
  type=<?=$params["type"]; ?> name=<?= $params["name"]; ?> value="yes"/> <?= $params["title"]; ?>
</div>
