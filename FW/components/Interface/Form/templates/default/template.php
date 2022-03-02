<?
use FW\core\Application;
$application = Application::getInstance();
?>

<div class="container" <?if (array_key_exists("attr", $params))
{
 foreach ($params["attr"] as $key => $value) {echo "$key=$value";}
}
 ?>>
 <form class=<?=$params["additional_class"];?> action=<?= $params["action"]; ?> method=<?= $params["method"];?>>
   <div class="stripes-block">
	<?
		$elements = $params["elements"];
		foreach($elements as $value)
    {
      foreach($value as $key => $atribute)
      {
        if ($key == "type")
        {
        switch($atribute)
          {
          case "text":
            if (array_key_exists("multiple", $value))
            {
              $application->includeComponent("Interface:TextMultiple", "default", $value);
            }
            else
            {
              $application->includeComponent("Interface:Text", "default", $value);
            }
            break;
          case "password":
            $application->includeComponent("Interface:Password", "default", $value);
            break;
          case "select":
            if (array_key_exists("multiple", $value))
            {
              $application->includeComponent("Interface:SelectMultiple", "default", $value);
            }
            else
            {
              $application->includeComponent("Interface:Select", "default", $value);
            }
            break;
          case "checkbox":
            if (array_key_exists("multiple", $value))
            {
              $application->includeComponent("Interface:CheckboxMultiple", "default", $value);
            }
            else
            {
              $application->includeComponent("Interface:Checkbox", "default", $value);
            }
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
