<?php

return [
    'environment'   => env('MONDIAL_RELAY_ENVIRONMENT', 'demo'),
    'site_id'       => env('MONDIAL_RELAY_SITE_ID'),
    'site_key'      => env('MONDIAL_RELAY_SITE_KEY'),
    'wsdl'          => env('MONDIAL_RELAY_WSDL', 'https://api.mondialrelay.com/Web_Services.asmx?WSDL'),
];