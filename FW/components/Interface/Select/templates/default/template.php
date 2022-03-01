<div class="form-group">
  <div class="row mb-3">
  <p> <?= $params["title"]; ?> </p>
  <select class=<?= $params["additional_class"]; ?>
  <?  if(array_key_exists("multiple", $params)) ?> multiple
  name=<?= $params["name"]; ?> >
    <?
      foreach ($params["list"] as $option)
      {
        ?>
        <option class=<?= $option["additional_class"]; ?> value=<?= $option["value"]; ?> selected=<?= $option["selected"]; ?> > <?= $option["title"];?> </option>
        <?
      }
    ?>
  </select>
</div>
</div>
