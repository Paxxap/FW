<div class="form-group">
  <div class="row mb-3" <?if (array_key_exists("attr", $params))
  {
   foreach ($params["attr"] as $key => $value) {echo "$key=$value";}
  }
   ?>>
   <p> <?= $params["title"]; ?> </p>
   <select class=<?=$params["additional_class"];?> name=<?= $params["name"];?> multiple>
     <?
      foreach ($params["list"] as $option):
        ?>
        <option class=<?= $option["additional_class"]; ?> value=<?= $option["value"]; ?>
<?if (array_key_exists("attr", $option)) { echo "selected";}?> > <?= $option["title"];?> </option>
        <?
      endforeach;
    ?>
  </select>
  </div>
</div>
