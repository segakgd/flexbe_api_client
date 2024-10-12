# flexbe_api_client
 Api client for the flexbe web designer

### Example Usage:

``` php
$domain = 'domain.com'; // Replace with your Flexbe domain
$apiKey = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'; // Replace with your Flexbe API key

// Create a DTO object with the domain and API key
$clientFlexbeDto = new FlexbeApiClientDto($domain, $apiKey);

// Initialize the Flexbe API manager
$flexbeManager = new FlexbeApiManager();

// Fetch leads from the Flexbe API
$leads = $flexbeManager->getLeads($clientFlexbeDto);

// $leads will contain the response with your Flexbe leads
```