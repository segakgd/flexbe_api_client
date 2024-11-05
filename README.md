# flexbe_api_client
 Api client for the flexbe web designer

## Installation

Install via Composer:

```bash
composer require segakgd/flexbe_api_client
```

### Example Usage:

#### Getting all lead's:

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

#### Updating the lead:

``` php
$domain = 'domain.com'; // Replace with your Flexbe domain
$apiKey = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'; // Replace with your Flexbe API key

// Create a DTO object with the domain and API key
$clientFlexbeDto = new FlexbeApiClientDto($domain, $apiKey);

// Initialize the Flexbe API manager
$flexbeManager = new FlexbeApiManager();

$leadUpdateRequest = new LeadUpdateRequest(
    id: 99999999,
    status: LeadStatusEnum::InWork,
);

$flexbeManager->changeLead($clientFlexbeDto, $leadUpdateRequest);
```