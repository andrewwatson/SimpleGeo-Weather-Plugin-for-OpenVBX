<?php

	$plugin = OpenVBX::$currentPlugin;
   $info = $plugin->getInfo();
   $path = $info['plugin_path'];

   include($path . "/php-simplegeo/SimpleGeo.php");

	$client = new SimpleGeo(
		'FfRSuQ6A6AxzysQnUdvhdKEUExEMxzgJ', 
		'4A4WYG9LGkD2NuYWB47ubkQMTnPKm4xQ'
	);

	$address = AppletInstance::getValue('address', 'New York, NY');
	$weather = $client->WeatherAddress($address);
	$condition = $weather['weather']['conditions'];

	$response = new Response();
	$response->addSay("The weather in ${address} is ${condition}");
	$response->Respond();
?>
