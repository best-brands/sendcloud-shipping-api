# A working API for a shitty API

A simple API that supports almost all calls and which is mapped to objects accordingly.

## Initialize the client as follows and work with the api
```php
$client = new \HarmSmits\SendCloudClient\Client(
    "...",
    "..."
);
```

Going over all parcels is really easy:
```php
$cursor = null;
while (($result = $client->getParcels($cursor))) {
    $cursor = $result->getNext();
    foreach ($result->getParcels() as $parcel) {
        ...
    }
}
```

Statuses work likewise:
```php
foreach ($client->getParcelStatuses() as $parcelStatus) {
    ...
}
```

Same for brands:
```php
$cursor = null;
while (($result = $client->getBrands($cursor))) {
    $cursor = $result->getNext();
    foreach ($result->getBrands() as $brand) {
        ...
    }
}
```

Everything can be done asynchronously as well
```php
$promise = $client->asyncGetParcelStatuses();
...
$result = $promise->wait();
```

## The following methods can be used directly from the client, prefix with `async` if you want to get a promise

* getParcels
* getParcel
* createParcel
* createParcels
* updateParcel
* cancelOrDeleteParcel
* getParcelReturnPortalUrl
* getParcelDocuments
* getParcelStatuses
* getReturns
* getReturn
* getBrands
* getBrand
* getShippingMethods
* getShippingMethod
* getPdfLabel
* getBulkPdfLabel
* getUser
* getInvoices
* getInvoice
* getSenderAddresses
* getSenderAddress
* getIntegrations

