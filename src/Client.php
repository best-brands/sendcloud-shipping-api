<?php

namespace HarmSmits\SendCloudClient;

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Promise\PromiseInterface;
use HarmSmits\SendCloudClient\Exception\NotFoundException;
use HarmSmits\SendCloudClient\Exception\RateLimitException;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Class Client
 * @method PromiseInterface asyncGetParcels(?string $cursor = null, array $search = [])
 * @method \HarmSmits\SendCloudClient\Models\ParcelsResponse getParcels(?string $cursor = null, array $search = [])
 * @method PromiseInterface asyncGetParcel(int $id)
 * @method \HarmSmits\SendCloudClient\Models\Parcel getParcel(int $id)
 * @method PromiseInterface asyncCreateParcel(\HarmSmits\SendCloudClient\Models\NewParcel $parcel)
 * @method \HarmSmits\SendCloudClient\Models\Parcel createParcel(\HarmSmits\SendCloudClient\Models\NewParcel $parcel)
 * @method PromiseInterface asyncCreateParcels(array $parcels)
 * @method \HarmSmits\SendCloudClient\Models\ParcelsResponse createParcels(array $parcels)
 * @method PromiseInterface asyncUpdateParcel(\HarmSmits\SendCloudClient\Models\Parcel $parcel)
 * @method \HarmSmits\SendCloudClient\Models\Parcel updateParcel(\HarmSmits\SendCloudClient\Models\Parcel $parcel)
 * @method PromiseInterface asyncCancelOrDeleteParcel(string $parcelId)
 * @method \HarmSmits\SendCloudClient\Models\Status cancelOrDeleteParcel(string $parcelId)
 * @method PromiseInterface asyncGetParcelReturnPortalUrl(string $parcelId)
 * @method \HarmSmits\SendCloudClient\Models\Url getParcelReturnPortalUrl(string $parcelId)
 * @method PromiseInterface asyncGetParcelDocuments(string $parcelId, string $documentType, string $format = "application/pdf", int $dpi = 72)
 * @method string getParcelDocuments(string $parcelId, string $documentType, string $format = "application/pdf", int $dpi = 72)
 * @method PromiseInterface asyncGetParcelStatuses()
 * @method \HarmSmits\SendCloudClient\Models\Status[] getParcelStatuses()
 * @method PromiseInterface asyncGetReturns(?string $cursor = null)
 * @method \HarmSmits\SendCloudClient\Models\ReturnsResponse getReturns(?string $cursor = null)
 * @method PromiseInterface asyncGetReturn(string $returnId)
 * @method \HarmSmits\SendCloudClient\Models\ReturnItem getReturn(string $returnId)
 * @method PromiseInterface asyncGetBrands(?string $cursor = null)
 * @method \HarmSmits\SendCloudClient\Models\BrandsResponse getBrands(?string $cursor = null)
 * @method PromiseInterface asyncGetBrand(int $brandId)
 * @method \HarmSmits\SendCloudClient\Models\Brand getBrand(int $brandId)
 * @method PromiseInterface asyncGetShippingMethods($sender_address = "all", ?int $servicePointId = null, ?bool $isReturn = null)
 * @method \HarmSmits\SendCloudClient\Models\ShippingMethod[] getShippingMethods($sender_address = "all", ?int $servicePointId = null, ?bool $isReturn = null)
 * @method PromiseInterface asyncGetShippingMethod(int $id, $sender_address = "all", ?int $servicePointId = null, ?bool $isReturn = null)
 * @method \HarmSmits\SendCloudClient\Models\ShippingMethod getShippingMethod(int $id, $sender_address = "all", ?int $servicePointId = null, ?bool $isReturn = null)
 * @method PromiseInterface asyncGetPdfLabel(string $parcelId)
 * @method \HarmSmits\SendCloudClient\Models\LabelDocument getPdfLabel(string $parcelId)
 * @method PromiseInterface asyncGetBulkPdfLabel(array $parcelIds)
 * @method \HarmSmits\SendCloudClient\Models\LabelDocument[] getBulkPdfLabel(array $parcelIds)
 * @method PromiseInterface asyncGetUser()
 * @method \HarmSmits\SendCloudClient\Models\User getUser()
 * @method PromiseInterface asyncGetInvoices()
 * @method \HarmSmits\SendCloudClient\Models\Invoice[] getInvoices();
 * @method PromiseInterface asyncGetInvoice(int $invoiceId, ?string $type = null, ?string $ref = null, ?bool $isPayed = null, ?array $items = null)
 * @method \HarmSmits\SendCloudClient\Models\Invoice getInvoice(int $invoiceId, ?string $type = null, ?string $ref = null, ?bool $isPayed = null, ?array $items = null)
 * @method PromiseInterface asyncGetSenderAddresses()
 * @method \HarmSmits\SendCloudClient\Models\SenderAddress[] getSenderAddresses()
 * @method PromiseInterface asyncGetSenderAddress(int $senderId)
 * @method \HarmSmits\SendCloudClient\Models\SenderAddress getSenderAddress(int $senderId);
 * @method PromiseInterface asyncGetIntegrations()
 * @method array getIntegrations()
 *
 * @package HarmSmits\SendCloudClient
 */
class Client
{
    /** @var \GuzzleHttp\Client */
    protected \GuzzleHttp\Client $client;

    /** @var \HarmSmits\SendCloudClient\Request request dispatcher */
    protected Request $request;

    /** @var \HarmSmits\SendCloudClient\Populator */
    protected Populator $populator;

    /** @var string api key */
    protected string $apiKey;

    /** @var string api secret */
    protected string $apiSecret;

    /** @var string partner uuid */
    protected ?string $partnerUuid;

    protected int $autoRateLimit;

    /**
     * Client constructor.
     *
     * @param string      $apiKey
     * @param string      $apiSecret
     * @param string|null $partnerUuid
     * @param int         $autoRateLimit
     */
    public function __construct(string $apiKey, string $apiSecret, ?string $partnerUuid = null, int $autoRateLimit = 3)
    {
        $this->apiKey = $apiKey;
        $this->apiSecret = $apiSecret;
        $this->partnerUuid = $partnerUuid;
        $this->autoRateLimit = $autoRateLimit;

        $stack = HandlerStack::create();
        $stack->push(Middleware::mapRequest($this->getRequestHandler()));
        $stack->push(Middleware::retry($this->getRetryHandler()));

        $this->client = new \GuzzleHttp\Client(["handler" => $stack]);
        $this->request = new Request();
        $this->populator = new Populator();
    }

    /**
     * @param string $method
     * @param array  $args
     *
     * @return array|\GuzzleHttp\Promise\PromiseInterface|mixed|\Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function __call(string $method, array $args)
    {
        if (($async = substr($method, -5) === 'Async')) {
            $method = substr($method, 0, -5);
        }

        [$method, $url, $data, $response, $responseFilter] = call_user_func_array([$this->request, $method], $args);

        if ($async) {
            return $this->handleAsyncRequest($method, $url, $data, $response, $responseFilter);
        } else {
            return $this->handleRequest($method, $url, $data, $response, $responseFilter);
        }
    }

    /**
     * Handle a non-blocking request
     *
     * @param               $method
     * @param               $url
     * @param               $data
     * @param array         $responseFormat
     * @param \Closure|null $filter
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    private function handleAsyncRequest($method, $url, $data, array $responseFormat, ?\Closure $filter): PromiseInterface
    {
        return $this->client->requestAsync($method, $url, $data)
            ->then(function (ResponseInterface $response) use (&$responseFormat, $filter) {
                return $this->handleResponse($response, $responseFormat, $filter);
            });
    }

    /**
     * Handle a blocking request
     *
     * @param               $method
     * @param               $url
     * @param               $data
     * @param array         $responseFormat
     * @param \Closure|null $filter
     *
     * @return array|mixed|\Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function handleRequest($method, $url, $data, array $responseFormat, ?\Closure $filter)
    {
        try {
            $result = $this->client->request($method, $url, $data);
        } catch (RequestException $exception) {
            $response = $exception->getResponse();
            return $this->handleResponse($response, $responseFormat, $filter);
        }

        return $this->handleResponse($result, $responseFormat, $filter);
    }

    /**
     * Handle the response accordingly
     *
     * @param \Psr\Http\Message\ResponseInterface $response
     * @param array                               $responseFormat
     * @param \Closure|null                       $filter
     *
     * @return array|mixed|\Psr\Http\Message\StreamInterface
     */
    private function handleResponse(ResponseInterface &$response, array &$responseFormat, ?\Closure $filter)
    {
        if ($responseFormat && isset($responseFormat[$response->getStatusCode()])) {
            $body = json_decode($response->getBody(), true);
            $body = $filter ? $filter($body) : $body;
            return $this->populator->populate($responseFormat[$response->getStatusCode()], $body);
        } elseif ($response->getStatusCode() !== 200) {
            throw new \HarmSmits\SendCloudClient\Exception\RequestException();
        } else {
            return $response->getBody();
        }
    }

    /**
     * Get the request handler
     *
     * @return \Closure
     */
    private function getRequestHandler(): \Closure
    {
        return function (RequestInterface $request) {
            $request = $request->withHeader(
                'Authorization',
                'Basic ' . base64_encode(sprintf("%s:%s", $this->apiKey, $this->apiSecret))
            );

            if ($this->partnerUuid) {
                return $request->withHeader('Sendcloud-Partner-Id', $this->partnerUuid);
            } else {
                return $request;
            }
        };
    }

    /**
     * Get the retry handler
     *
     * @return \Closure
     */
    private function getRetryHandler(): \Closure
    {
        return function ($retries, ?RequestInterface $request, ?ResponseInterface $response, ?RequestException $exception) {
            if ($response->getStatusCode() == 429) {
                if ($this->autoRateLimit) {
                    sleep($this->autoRateLimit);
                    return true;
                } else {
                    throw new RateLimitException("Your requests are being throttled, slow down");
                }
            }
            return false;
        };
    }
}