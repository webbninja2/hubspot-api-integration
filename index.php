<?php
require 'vendor/autoload.php';

use HubSpot\Factory;
use HubSpot\Client\Crm\Tickets\ApiException;

$client = Factory::createWithApiKey("{API-KEY}");

$properties = [
    'content'             => 'Ticket Description',
    'hs_pipeline'         => '0',
    'hs_pipeline_stage'   => '2',
    'hs_ticket_priority'  => 'HIGH',
    'subject'             => 'Ticket Subject',
    "hubspot_owner_id"    => '{OWNER-ID}',
];

$SimplePublicObjectInput =  new \HubSpot\Client\Crm\Tickets\Model\SimplePublicObjectInput(['properties' => $properties]);

try {
    $apiResponse = $client->crm()->tickets()->basicApi()->create($SimplePublicObjectInput);
    var_dump($apiResponse);
} catch (ApiException $e) {
    echo "Exception when calling basic_api->create: ", $e->getMessage();
}
