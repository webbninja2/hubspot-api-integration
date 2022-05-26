
# Create HubSpot Ticket using PHP

## Setup

**Composer:**

```bash
composer update
```

## API Documentation

### Step 1 (HubSpot API reference documentation)

- [API Docs](https://developers.hubspot.com/docs/api/overview)
- [Create Ticket](https://developers.hubspot.com/docs/api/crm/tickets)
- Click On Endpoints > Choose PHP Language.

### Step 2 (Local File Setup)
- Create index.php where HubSpot Installed

   ```php
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
   ```

## GET {API-KEY}
- Click on setting.
![Screenshot 1](https://www.web-xperts.xyz/api/hubspot/api-key/1.png)

- Click "Integrations" in the sidebar. 
![Screenshot 2](https://www.web-xperts.xyz/api/hubspot/api-key/2.png)

- Click on  ‘API Key’.
![Screenshot 3](https://www.web-xperts.xyz/api/hubspot/api-key/3.png)

- You can create one or just copy from here if its already created. 
![Screenshot 4](https://www.web-xperts.xyz/api/hubspot/api-key/4.png)

- Click on Edit or View.
- Get Id from  “Internal Value”.

## GET {OWNER-ID}
- Click on setting icon.
![Screenshot 1](https://www.web-xperts.xyz/api/hubspot/owner-key/1.png)

- Click "Properties" in the left-hand menu. 
![Screenshot 2](https://www.web-xperts.xyz/api/hubspot/owner-key/2.png)

- Select ‘Contact properties’.
![Screenshot 3](https://www.web-xperts.xyz/api/hubspot/owner-key/3.png)

- Type "Owner" in the search bar under "Contact properties".
![Screenshot 4](https://www.web-xperts.xyz/api/hubspot/owner-key/4.png)

- Hover on "Contact owner".
![Screenshot 5](https://www.web-xperts.xyz/api/hubspot/owner-key/5.png)

- Click on Edit or View.
![Screenshot 6](https://www.web-xperts.xyz/api/hubspot/owner-key/6.png)

- Get Id from  “Internal Value”.
![Screenshot 7](https://www.web-xperts.xyz/api/hubspot/owner-key/7.png)


## In case you get this error

```
Fatal error: Uncaught Error: Class "Normalizer" not found in /var/www/api/application/libraries/aws/Symfony/Polyfill/Intl/Idn/Idn.php:338 Stack trace: #0 /var/www/api/application/libraries/aws/Symfony/Polyfill/Intl/Idn/Idn.php(163): Symfony\Polyfill\Intl\Idn\Idn::process() #1 /var/www/api/application/libraries/aws/Symfony/Polyfill/Intl/Idn/bootstrap.php(136): Symfony\Polyfill\Intl\Idn\Idn::idn_to_ascii() #2 /var/www/api/application/third_party/hubspot/vendor/guzzlehttp/guzzle/src/Utils.php(377): idn_to_ascii() #3 /var/www/api/application/third_party/hubspot/vendor/guzzlehttp/guzzle/src/Utils.php(324): GuzzleHttp\Utils::idnToAsci() #4 /var/www/api/application/libraries/aws/GuzzleHttp/Client.php(219): GuzzleHttp\Utils::idnUriConvert() #5 /var/www/api/application/libraries/aws/GuzzleHttp/Client.php(112): GuzzleHttp\Client->buildUri() #6 /var/www/api/application/libraries/aws/GuzzleHttp/Client.php(129): GuzzleHttp\Client->sendAsync() #7 /var/www/api/application/third_party/hubspot/vendor/hubspot/api-client/codegen/Crm/Tickets/Api/BasicApi.php(396): GuzzleHttp\Client->send() #8 /var/www/api/application/third_party/hubspot/vendor/hubspot/api-client/codegen/Crm/Tickets/Api/BasicApi.php(374): HubSpot\Client\Crm\Tickets\Api\BasicApi->createWithHttpInfo() #9 /var/www/api/application/modules/tickets/models/hubspot_model.php(34): HubSpot\Client\Crm\Tickets\Api\BasicApi->create() #10 /var/www/api/application/modules/cron/controllers/debugger.php(1096): Hubspot_model->ticketAdd() #11 /var/www/api/system/core/CodeIgniter.php(359): Debugger->hubspotAddTicket() #12 /var/www/api/index.php(205): require_once('...') #13 {main} thrown in /var/www/api/application/libraries/aws/Symfony/Polyfill/Intl/Idn/Idn.php on line 338
```

Its because intl php extension is missing or disabled on your system. Here is the solution for this -

```bash
sudo apt-get install php-intl