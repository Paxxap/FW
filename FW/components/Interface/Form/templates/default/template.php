<?
use FW\core\Application;
$application = Application::getInstance();
?>

<div class="container" <? foreach ($params["attr"] as $key => $value) {echo "$key=$value";}?>>
 <form class=<?=$params["additional_class"];?> action=<?= $params["action"]; ?> method=<?= $params["method"];?>>
   <div class="stripes-block">
	<?
		$elements = $params["elements"];
		foreach($elements as $value)
    {
      foreach($value as $key => $element)
      {
        if ($key == "type")
        {
        switch($element)
          {
          case "text":
            $application->includeComponent("Interface:Text", "default", $value);
            break;
          case "password":
            $application->includeComponent("Interface:Password", "default", $value);
            break;
          case "select":
            $application->includeComponent("Interface:Select", "default", $value);
            break;
          case "checkbox":
            $application->includeComponent("Interface:Checkbox", "default", $value);
            break;
          case "textarea":
            $application->includeComponent("Interface:Textarea", "default", $value);
            break;
          case "radio":
            $application->includeComponent("Interface:Radio", "default", $value);
            break;
          case "tel":
            $application->includeComponent("Interface:Number", "default", $value);
            break;
          }
        }
      }
    }
	?>

	<div class="row mb-3">
	  <button type="submit" class="butt" > Отправить </button>
	  <button type="reset" class="butt"> Очистить </reset>
	</div>
</div>
	</form>
</div>
