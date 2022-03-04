<div <?if (array_key_exists("attr", $params))
{
 foreach ($params["attr"] as $key => $value) {echo "$key=$value";}
}
 ?>>
  <input class=<?= $params["additional_class"];?>
  type="checkbox" name=<?= $params["name"]; ?> value=<?= $params["value"];?>/> <?= $params["title"]; ?>
</div>
