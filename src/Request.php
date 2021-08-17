<?php

namespace HarmSmits\SendCloudClient;

use HarmSmits\SendCloudClient\Models\Integration;
use HarmSmits\SendCloudClient\Models\NewParcel;
use HarmSmits\SendCloudClient\Models\Parcel;
use HarmSmits\SendCloudClient\Models\Shipment;

/**
 * Class Request
 *
 * @package HarmSmits\SendCloudClient
 */
class Request
{
    /**
     * This endpoint retrieves all parcels which you have imported under your provided API credentials. You may filter
     * parcels on the query parameters provided below.
     *
     * @param string $cursor Next and previous token that is used to paginate. The token is included in the response.
     * @param array  $search
     *
     * @return array
     */
    public function getParcels(?string $cursor = null, array $search = []): array
    {
        $data = [];
        $url = "https://panel.sendcloud.sc/api/v2/parcels";
        $method = "get";
        $data["headers"] = array(
            "Accept" => "application/json, text/plain, */*"
        );
        $data["query"] = array_merge(["cursor" => $cursor], array_filter($search));
        $response = [
            200 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\SendCloudClient\\Models\\ParcelsResponse',
                    'parcels' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\SendCloudClient\\Models\\Parcel',
                            'address_divided' =>
                                array(
                                    '$type' => 'OBJ',
                                    '$ref' => 'HarmSmits\\SendCloudClient\\Models\\ParcelAddressDivided',
                                ),
                            'status' =>
                                array(
                                    '$type' => 'OBJ',
                                    '$ref' => 'HarmSmits\\SendCloudClient\\Models\\ParcelStatus',
                                ),
                            'shipment' =>
                                array(
                                    '$type' => 'OBJ',
                                    '$ref' => 'HarmSmits\\SendCloudClient\\Models\\ParcelShipment',
                                ),
                            'country' =>
                                array(
                                    '$type' => 'OBJ',
                                    '$ref' => 'HarmSmits\\SendCloudClient\\Models\\Country',
                                ),
                            'carrier' =>
                                array(
                                    '$type' => 'OBJ',
                                    '$ref' => 'HarmSmits\\SendCloudClient\\Models\\Carrier'
                                ),
                            'documents' =>
                                array(
                                    '$type' => 'OBJ_ARRAY',
                                    '$ref' => 'HarmSmits\\SendCloudClient\\Models\\Document'
                                ),
                            'label' =>
                                array(
                                    '$type' => 'OBJ',
                                    '$ref' => 'HarmSmits\\SendCloudClient\\Models\\Label',
                                ),
                        ),
                ),
        ];
        $responseFilter = null;
        return [$method, $url, $data, $response, $responseFilter];
    }

    /**
     * This endpoint retrieves all parcels which you have imported under your provided API credentials. You may filter
     * parcels on the query parameters provided below.
     *
     * @param int $id The id of the parcel you want to retrieve
     *
     * @return array
     */
    public function getParcel(int $id): array
    {
        $data = [];
        $url = "https://panel.sendcloud.sc/api/v2/parcels/{id}";
        $method = "get";
        $url = str_replace("{id}", $id, $url);
        $data["headers"] = array(
            "Accept" => "application/json, text/plain, */*"
        );
        $response = [
            200 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\SendCloudClient\\Models\\Parcel',
                    'address_divided' =>
                        array(
                            '$type' => 'OBJ',
                            '$ref' => 'HarmSmits\\SendCloudClient\\Models\\ParcelAddressDivided',
                        ),
                    'status' =>
                        array(
                            '$type' => 'OBJ',
                            '$ref' => 'HarmSmits\\SendCloudClient\\Models\\ParcelStatus',
                        ),
                    'shipment' =>
                        array(
                            '$type' => 'OBJ',
                            '$ref' => 'HarmSmits\\SendCloudClient\\Models\\ParcelShipment',
                        ),
                    'country' =>
                        array(
                            '$type' => 'OBJ',
                            '$ref' => 'HarmSmits\\SendCloudClient\\Models\\Country',
                        ),
                    'carrier' =>
                        array(
                            '$type' => 'OBJ',
                            '$ref' => 'HarmSmits\\SendCloudClient\\Models\\Carrier'
                        ),
                    'documents' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\SendCloudClient\\Models\\Document'
                        ),
                    'label' =>
                        array(
                            '$type' => 'OBJ',
                            '$ref' => 'HarmSmits\\SendCloudClient\\Models\\Label',
                        ),
                ),
        ];
        $responseFilter = function ($response) {
            return $response["parcel"] ?? [];
        };
        return [$method, $url, $data, $response, $responseFilter];
    }

    /**
     * This endpoint creates a parcel under your user, for which you can request a label immediately.
     *
     * In order to create a parcel you have to pass some additional arguments in JSON format within the object of parcel
     * as you can see in the example on the right.
     *
     * To create a robust integration with SendCloud this Parcel creation end-point can be made idempotent. By providing
     * a unique reference per requested Parcel in the external_reference field, SendCloud makes sure no additional
     * parcels are created if the reference has been seen before. If the reference is known, the original parcel is
     * returned.
     *
     * @param \HarmSmits\SendCloudClient\Models\NewParcel $parcel
     *
     * @return array
     */
    public function createParcel(NewParcel $parcel): array
    {
        $data = [];
        $url = "https://panel.sendcloud.sc/api/v2/parcels";
        $method = "post";
        $data["json"] = [
            "parcel" => $parcel->__toArray()
        ];
        $data["headers"] = array(
            "Accept" => "application/json, text/plain, */*"
        );
        $response = array(
            200 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\SendCloudClient\\Models\\Parcel',
                    'address_divided' =>
                        array(
                            '$type' => 'OBJ',
                            '$ref' => 'HarmSmits\\SendCloudClient\\Models\\ParcelAddressDivided',
                        ),
                    'status' =>
                        array(
                            '$type' => 'OBJ',
                            '$ref' => 'HarmSmits\\SendCloudClient\\Models\\ParcelStatus',
                        ),
                    'shipment' =>
                        array(
                            '$type' => 'OBJ',
                            '$ref' => 'HarmSmits\\SendCloudClient\\Models\\ParcelShipment',
                        ),
                    'country' =>
                        array(
                            '$type' => 'OBJ',
                            '$ref' => 'HarmSmits\\SendCloudClient\\Models\\Country',
                        ),
                    'carrier' =>
                        array(
                            '$type' => 'OBJ',
                            '$ref' => 'HarmSmits\\SendCloudClient\\Models\\Carrier'
                        ),
                    'documents' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\SendCloudClient\\Models\\Document'
                        ),
                    'label' =>
                        array(
                            '$type' => 'OBJ',
                            '$ref' => 'HarmSmits\\SendCloudClient\\Models\\Label',
                        ),
                ),
        );
        $data = array_map("array_filter", $data);
        $responseFilter = function ($response) {
            return $response["parcel"] ?? [];
        };
        return [$method, $url, $data, $response, $responseFilter];
    }

    /**
     * Create multiple parcels
     *
     * @param array $parcels
     *
     * @return array
     */
    public function createParcels(array $parcels): array
    {
        $data = [];
        $url = "https://panel.sendcloud.sc/api/v2/parcels";
        $method = "post";
        $data["json"] = [
            "parcels" => array_map(fn(NewParcel $parcel) => $parcel->__toArray(), $parcels)
        ];
        $data["headers"] = array(
            "Accept" => "application/json, text/plain, */*"
        );
        $response = array(
            200 =>
                array(
                    '$type' => 'OBJ_ARRAY',
                    '$ref' => 'HarmSmits\\SendCloudClient\\Models\\Parcel',
                    'address_divided' =>
                        array(
                            '$type' => 'OBJ',
                            '$ref' => 'HarmSmits\\SendCloudClient\\Models\\ParcelAddressDivided',
                        ),
                    'status' =>
                        array(
                            '$type' => 'OBJ',
                            '$ref' => 'HarmSmits\\SendCloudClient\\Models\\ParcelStatus',
                        ),
                    'shipment' =>
                        array(
                            '$type' => 'OBJ',
                            '$ref' => 'HarmSmits\\SendCloudClient\\Models\\ParcelShipment',
                        ),
                    'country' =>
                        array(
                            '$type' => 'OBJ',
                            '$ref' => 'HarmSmits\\SendCloudClient\\Models\\Country',
                        ),
                    'carrier' =>
                        array(
                            '$type' => 'OBJ',
                            '$ref' => 'HarmSmits\\SendCloudClient\\Models\\Carrier'
                        ),
                    'documents' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\SendCloudClient\\Models\\Document'
                        ),
                    'label' =>
                        array(
                            '$type' => 'OBJ',
                            '$ref' => 'HarmSmits\\SendCloudClient\\Models\\Label',
                        ),
                ),
        );
        $data = array_map("array_filter", $data);
        $responseFilter = function ($response) {
            return $response["parcels"] ?? [];
        };
        return [$method, $url, $data, $response, $responseFilter];
    }

    /**
     * This endpoint updates a parcel with the option to request a label - if it hasn’t been requested before. The post
     * request parameters have to be nested under a parcel object. You can change any properties given in the Create
     * parcel example under Post request parameters.
     *
     * @param \HarmSmits\SendCloudClient\Models\Parcel $parcel
     *
     * @return array
     */
    public function updateParcel(Parcel $parcel): array
    {
        $data = [];
        $url = "https://panel.sendcloud.sc/api/v2/parcels";
        $method = "put";
        $data["headers"] = array(
            "Accept" => "application/json, text/plain, */*"
        );
        $data["json"] = $parcel->__toArray();
        $response = [
            200 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\SendCloudClient\\Models\\Parcel',
                    'address_divided' =>
                        array(
                            '$type' => 'OBJ',
                            '$ref' => 'HarmSmits\\SendCloudClient\\Models\\ParcelAddressDivided',
                        ),
                    'status' =>
                        array(
                            '$type' => 'OBJ',
                            '$ref' => 'HarmSmits\\SendCloudClient\\Models\\ParcelStatus',
                        ),
                    'shipment' =>
                        array(
                            '$type' => 'OBJ',
                            '$ref' => 'HarmSmits\\SendCloudClient\\Models\\ParcelShipment',
                        ),
                    'country' =>
                        array(
                            '$type' => 'OBJ',
                            '$ref' => 'HarmSmits\\SendCloudClient\\Models\\Country',
                        ),
                    'carrier' =>
                        array(
                            '$type' => 'OBJ',
                            '$ref' => 'HarmSmits\\SendCloudClient\\Models\\Carrier'
                        ),
                    'documents' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\SendCloudClient\\Models\\Document'
                        ),
                    'label' =>
                        array(
                            '$type' => 'OBJ',
                            '$ref' => 'HarmSmits\\SendCloudClient\\Models\\Label',
                        ),
                ),
        ];
        $responseFilter = function ($response) {
            return $response["parcel"] ?? [];
        };
        return [$method, $url, $data, $response, $responseFilter];
    }

    /**
     * This endpoint updates a parcel with the option to request a label for it if it hasn’t been requested before. Mind
     * that the post request parameters have to be nested under a parcel object. You can change any properties given in
     * the Create parcel example under Post request parameters.
     *
     * The cancellation is not guaranteed and may be asynchronous depending on the state of the parcel.
     *
     * @param string $parcelId
     *
     * @return array
     */
    public function cancelOrDeleteParcel(string $parcelId): array
    {
        $data = [];
        $url = "https://panel.sendcloud.sc/api/v2/parcels/{id}/cancel";
        $method = "post";
        $url = str_replace("{id}", $parcelId, $url);
        $data["headers"] = array(
            "Accept" => "application/json, text/plain, */*"
        );
        $response = [
            200 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\SendCloudClient\\Models\\Status',
                ),
            202 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\SendCloudClient\\Models\\Status',
                ),
            400 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\SendCloudClient\\Models\\Status',
                ),
            410 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\SendCloudClient\\Models\\Status',
                ),
        ];
        $responseFilter = null;
        return [$method, $url, $data, $response, $responseFilter];
    }

    /**
     * This endpoint returns the url to the return portal for a parcel. If there is no brand connected to the parcel
     * or no return portal is configured, this endpoint returns a status code 404.
     *
     * @param string $parcelId
     *
     * @return array
     */
    public function getParcelReturnPortalUrl(string $parcelId): array
    {
        $data = [];
        $url = "https://panel.sendcloud.sc/api/v2/parcels/{id}/return_portal_url";
        $method = "get";
        $url = str_replace("{id}", $parcelId, $url);
        $data["headers"] = array(
            "Accept" => "application/json, text/plain, */*"
        );
        $response = [
            200 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\SendCloudClient\\Models\\Url',
                ),
        ];
        $responseFilter = null;
        return [$method, $url, $data, $response, $responseFilter];
    }

    /**
     * Announced parcels contain a label and depending on the destination, carrier and used carrier service can also
     * contain other documents. These documents can be downloaded separately in different formats and DPI.
     *
     * By default the documents are returned in PDF format. The returned format can be changed by either providing a
     * Accept header or a format request argument.
     *
     * The resolution of the returned document can be changed as well, this can be done by passing a dpi request
     * argument.
     *
     * @param string $parcelId
     * @param string $documentType
     * @param string $format
     * @param int    $dpi
     *
     * @return array
     */
    public function getParcelDocuments(string $parcelId, string $documentType, string $format = "application/pdf", int $dpi = 72): array
    {
        $data = [];
        $url = "https://panel.sendcloud.sc/api/v2/parcels/{id}/documents/{type}";
        $method = "get";
        $url = str_replace("{id}", $parcelId, $url);
        $url = str_replace("{type}", $documentType, $url);
        $data["headers"] = array(
            "Accept" => $format
        );
        $data["query"] = array(
            "dpi" => $dpi,
        );
        $response = [];
        $responseFilter = null;
        return [$method, $url, $data, $response, $responseFilter];
    }

    /**
     * This endpoint will return all possible parcel statuses.
     *
     * @return array
     */
    public function getParcelStatuses(): array
    {
        $data = [];
        $url = "https://panel.sendcloud.sc/api/v2/parcels/statuses";
        $method = "get";
        $data["headers"] = array(
            "Accept" => "application/json, text/plain, */*"
        );
        $response = [
            200 =>
                array(
                    '$type' => 'OBJ_ARRAY',
                    '$ref' => 'HarmSmits\\SendCloudClient\\Models\\ParcelStatus',
                ),
        ];
        $responseFilter = null;
        return [$method, $url, $data, $response, $responseFilter];
    }

    /**
     * This endpoint retrieves all returns, both created through the return portal or the API. Depending on whether a
     * return parcel contains items or not, the refund, reason, and message fields will be filled either in the return
     * data, or the incoming parcel item data.
     *
     * @param string|null $cursor
     *
     * @return array
     */
    public function getReturns(?string $cursor = null): array
    {
        $data = [];
        $url = "https://panel.sendcloud.sc/api/v2/returns";
        $method = "get";
        $data["headers"] = array(
            "Accept" => "application/json, text/plain, */*"
        );
        $data["query"] = array_filter(["cursor" => $cursor]);
        $response = [
            200 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\SendCloudClient\\Models\\ReturnsResponse',
                    'returns' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\SendCloudClient\\Models\\ReturnItem',
                            'refund' =>
                                array(
                                    '$type' => 'OBJ',
                                    '$ref' => 'HarmSmits\\SendCloudClient\\Models\\Refund',
                                ),
                            'outgoing_parcel_data' =>
                                array(
                                    '$type' => 'OBJ',
                                    '$ref' => 'HarmSmits\\SendCloudClient\\Models\\ParcelData',
                                ),
                            'incoming_parcel_data' =>
                                array(
                                    '$type' => 'OBJ',
                                    '$ref' => 'HarmSmits\\SendCloudClient\\Models\\ParcelData',
                                ),
                            'incoming_parcel_status' =>
                                array(
                                    '$type' => 'OBJ',
                                    '$ref' => 'HarmSmits\\SendCloudClient\\Models\\GlobalStatus',
                                ),
                        ),
                ),
        ];
        $responseFilter = null;
        return [$method, $url, $data, $response, $responseFilter];
    }

    /**
     * This endpoint retrieves a specific return from your account based on ID. Depending on whether a return parcel
     * contains items or not, the refund, reason, and message fields will be filled either in the return data, or
     * the incoming parcel item data.
     *
     * @param string $returnId
     *
     * @return array
     */
    public function getReturn(string $returnId): array
    {
        $data = [];
        $url = "https://panel.sendcloud.sc/api/v2/returns/{id}";
        $method = "get";
        $url = str_replace("{id}", $returnId, $url);
        $data["headers"] = array(
            "Accept" => "application/json, text/plain, */*"
        );
        $response = [
            200 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\SendCloudClient\\Models\\ReturnItem',
                    'refund' =>
                        array(
                            '$type' => 'OBJ',
                            '$ref' => 'HarmSmits\\SendCloudClient\\Models\\Refund',
                        ),
                    'outgoing_parcel_data' =>
                        array(
                            '$type' => 'OBJ',
                            '$ref' => 'HarmSmits\\SendCloudClient\\Models\\ParcelData',
                        ),
                    'incoming_parcel_data' =>
                        array(
                            '$type' => 'OBJ',
                            '$ref' => 'HarmSmits\\SendCloudClient\\Models\\ParcelData',
                        ),
                    'incoming_parcel_status' =>
                        array(
                            '$type' => 'OBJ',
                            '$ref' => 'HarmSmits\\SendCloudClient\\Models\\GlobalStatus',
                        ),
                ),
        ];
        $responseFilter = null;
        return [$method, $url, $data, $response, $responseFilter];
    }

    /**
     * This endpoint retrieves all brands.
     *
     * @param string|null $cursor
     *
     * @return array
     */
    public function getBrands(?string $cursor = null): array
    {
        $data = [];
        $url = "https://panel.sendcloud.sc/api/v2/brands";
        $method = "get";
        $data["headers"] = array(
            "Accept" => "application/json, text/plain, */*"
        );
        $data["query"] = array_filter(["cursor" => $cursor]);
        $response = [
            200 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\SendCloudClient\\Models\\BrandsResponse',
                    'brands' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\SendCloudClient\\Models\\Brand',
                            'screen_logo' =>
                                array(
                                    '$type' => 'OBJ',
                                    '$ref' => 'HarmSmits\\SendCloudClient\\Models\\Url',
                                ),
                            'print_logo' =>
                                array(
                                    '$type' => 'OBJ',
                                    '$ref' => 'HarmSmits\\SendCloudClient\\Models\\Url',
                                ),
                        ),
                ),
        ];
        $responseFilter = null;
        return [$method, $url, $data, $response, $responseFilter];
    }

    /**
     * This endpoint retrieves a specific brand from your account based on id.
     *
     * @param int $brandId
     *
     * @return array
     */
    public function getBrand(int $brandId): array
    {
        $data = [];
        $url = "https://panel.sendcloud.sc/api/v2/brand/{id}";
        $method = "get";
        $url = str_replace("{id}", $brandId, $url);
        $data["headers"] = array(
            "Accept" => "application/json, text/plain, */*"
        );
        $response = [
            200 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\SendCloudClient\\Models\\Brand',
                    'screen_logo' =>
                        array(
                            '$type' => 'OBJ',
                            '$ref' => 'HarmSmits\\SendCloudClient\\Models\\Url',
                        ),
                    'print_logo' =>
                        array(
                            '$type' => 'OBJ',
                            '$ref' => 'HarmSmits\\SendCloudClient\\Models\\Url',
                        ),
                ),
        ];
        $responseFilter = null;
        return [$method, $url, $data, $response, $responseFilter];
    }

    /**
     * This endpoint will return the shipping methods that are associated with your default sender address. If you want
     * to change that behaviour please provide additional parameters which you can find under parameters.
     *
     * @param string    $sender_address An ID of your preferred sender address where you plan to ship your parcels
     *                                  from.
     *                                  If you want to retrieve all available shipping methods, please use all as a
     *                                  value for this parameter.
     * @param int|null  $servicePointId Returns shipping methods available for that specific service point together
     *                                  with the carriers that use it
     * @param bool|null $isReturn       If set to true the endpoint will return shipping methods specific for making a
     *                                  return
     *
     * @return array
     */
    public function getShippingMethods($sender_address = "all", ?int $servicePointId = null, ?bool $isReturn = null): array
    {
        $data = [];
        $url = "https://panel.sendcloud.sc/api/v2/shipping_methods";
        $method = "get";
        $data["headers"] = array(
            "Accept" => "application/json, text/plain, */*"
        );
        $data["query"] = array_filter([
            "sender_address" => $sender_address,
            "service_point_id" => $servicePointId,
            "is_return" => $isReturn
        ]);
        $response = [
            200 =>
                array(
                    '$type' => 'OBJ_ARRAY',
                    '$ref' => 'HarmSmits\\SendCloudClient\\Models\\ShippingMethod',
                    'countries' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\SendCloudClient\\Models\\ShippingMethodCountry',
                        ),
                ),
        ];
        $responseFilter = function ($response) {
            return $response["shipping_methods"] ?? [];
        };
        return [$method, $url, $data, $response, $responseFilter];
    }

    /**
     * This individual shipping method endpoint will provide you with a single detailed shipping method information
     * based on the id that you request. This endpoint works based on your default sender address which extends to the
     * behaviour written below:
     *
     * If you have sender addresses in multiple countries, this means you have to set a default carrier service for
     * each country. Take Colissimo and PostNL as an example - If your default sender address is set to the country of
     * Netherlands, you will not be able to retrieve the Colissimo shipping method by providing its ID. This occurs
     * when a sender address in France is not provided in the parameter.
     *
     * @param int       $id             Shipping method id that you request
     * @param string    $sender_address An ID of your preferred sender address where you plan to ship your parcels
     *                                  from.
     *                                  If you want to retrieve all available shipping methods, please use all as a
     *                                  value for this parameter.
     * @param int|null  $servicePointId Returns shipping methods available for that specific service point together
     *                                  with the carriers that use it
     * @param bool|null $isReturn       If set to true the endpoint will return shipping methods specific for making a
     *                                  return
     *
     * @return array
     */
    public function getShippingMethod(int $id, $sender_address = "all", ?int $servicePointId = null, ?bool $isReturn = null): array
    {
        $data = [];
        $url = "https://panel.sendcloud.sc/api/v2/shipping_methods/{id}";
        $method = "get";
        $url = str_replace("{id}", $id, $url);
        $data["headers"] = array(
            "Accept" => "application/json, text/plain, */*"
        );
        $data["query"] = array_filter([
            "sender_address" => $sender_address,
            "service_point_id" => $servicePointId,
            "is_return" => $isReturn
        ]);
        $response = [
            200 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\SendCloudClient\\Models\\ShippingMethod',
                    'countries' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\SendCloudClient\\Models\\ShippingMethodCountry',
                        ),
                ),
        ];
        $responseFilter = function ($response) {
            return $response["shipping_method"] ?? [];
        };
        return [$method, $url, $data, $response, $responseFilter];
    }

    /**
     * This endpoint retrieves the links for a PDF label from a specific parcel.
     *
     * @param string $parcelId
     *
     * @return array
     */
    public function getPdfLabel(string $parcelId): array
    {
        $data = [];
        $url = "https://panel.sendcloud.sc/api/v2/labels/{id}";
        $method = "get";
        $url = str_replace("{id}", $parcelId, $url);
        $data["headers"] = array(
            "Accept" => "application/json, text/plain, */*",
        );
        $response = [
            200 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\SendCloudClient\\Models\\LabelDocument',
                    'label' =>
                        array(
                            '$type' => 'OBJ',
                            '$ref' => 'HarmSmits\\SendCloudClient\\Models\\Label',
                        )
                ),
        ];
        $responseFilter = null;
        return [$method, $url, $data, $response, $responseFilter];
    }

    /**
     * This endpoint retrieves the links for a PDF label from a specific parcel.
     *
     * @param int[] $parcelIds
     *
     * @return array
     */
    public function getBulkPdfLabel(array $parcelIds): array
    {
        $data = [];
        $url = "https://panel.sendcloud.sc/api/v2/labels";
        $method = "post";
        $data["headers"] = array(
            "Accept" => "application/json, text/plain, */*"
        );
        $data["json"] = [
            "parcels" => $parcelIds
        ];
        $response = [
            200 =>
                array(
                    '$type' => 'OBJ_ARRAY',
                    '$ref' => 'HarmSmits\\SendCloudClient\\Models\\LabelDocument',
                    'label' =>
                        array(
                            '$type' => 'OBJ',
                            '$ref' => 'HarmSmits\\SendCloudClient\\Models\\Label',
                        )
                ),
        ];
        $responseFilter = null;
        return [$method, $url, $data, $response, $responseFilter];
    }

    /**
     * With this endpoint you can request the data that is connected with your own user.
     *
     * @return array
     */
    public function getUser(): array
    {
        $data = [];
        $url = "https://panel.sendcloud.sc/api/v2/user";
        $method = "get";
        $data["headers"] = array(
            "Accept" => "application/json, text/plain, */*"
        );
        $response = [
            200 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\SendCloudClient\\Models\\User',
                    'invoices' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\SendCloudClient\\Models\\Invoice',
                        ),
                    'modules' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\SendCloudClient\\Models\\Module',
                        ),
                ),
        ];
        $responseFilter = function ($response) {
            return $response["user"] ?? [];
        };
        return [$method, $url, $data, $response, $responseFilter];
    }

    /**
     * With this enpoint you can get all the invoices that have been issued to your account.
     *
     * @return array
     */
    public function getInvoices(): array
    {
        $data = [];
        $url = "https://panel.sendcloud.sc/api/v2/user/invoices";
        $method = "get";
        $data["headers"] = array(
            "Accept" => "application/json, text/plain, */*"
        );
        $response = [
            200 =>
                array(
                    '$type' => 'OBJ_ARRAY',
                    '$ref' => 'HarmSmits\\SendCloudClient\\Models\\Invoice',
                ),
        ];
        $responseFilter = function ($response) {
            return $response["invoices"] ?? [];
        };
        return [$method, $url, $data, $response, $responseFilter];
    }

    /**
     * With this enpoint you can get a specific invoice that has been issued to your account.
     *
     * @param int         $invoiceId The invoice ID
     * @param string|null $type      Type of invoices: periodical, forced, initial, other
     * @param string|null $ref       Reference of an invoice number.
     * @param bool|null   $isPayed   Displays true if invoice is payed and false otherwise.
     * @param array|null  $items     Array of items that are assigned to that invoice.
     *
     * @return array
     */
    public function getInvoice(int $invoiceId, ?string $type = null, ?string $ref = null, ?bool $isPayed = null, ?array $items = null): array
    {
        $data = [];
        $url = "https://panel.sendcloud.sc/api/v2/user/invoices/{id}";
        $method = "get";
        $url = str_replace("{id}", $invoiceId, $url);
        $data["headers"] = array(
            "Accept" => "application/json, text/plain, */*"
        );
        $data["query"] = array_filter([
            "type" => $type,
            "ref" => $ref,
            "isPayed" => $isPayed,
            "items" => $items
        ]);
        $response = [
            200 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\SendCloudClient\\Models\\Invoice',
                    'items' =>
                        array(
                            'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\SendCloudClient\\Models\\InvoiceItem',
                        ),
                ),
        ];
        $responseFilter = function ($response) {
            return $response["invoice"] ?? [];
        };
        return [$method, $url, $data, $response, $responseFilter];
    }

    /**
     * @return array
     */
    public function getSenderAddresses(): array
    {
        $data = [];
        $url = "https://panel.sendcloud.sc/api/v2/user/addresses/sender";
        $method = "get";
        $data["headers"] = array(
            "Accept" => "application/json, text/plain, */*"
        );
        $response = [
            200 =>
                array(
                    '$type' => 'OBJ_ARRAY',
                    '$ref' => 'HarmSmits\\SendCloudClient\\Models\\SenderAddress',
                ),
        ];
        $responseFilter = function ($response) {
            return $response["sender_addresses"] ?? [];
        };
        return [$method, $url, $data, $response, $responseFilter];
    }

    /**
     * @param int $senderId
     *
     * @return array
     */
    public function getSenderAddress(int $senderId): array
    {
        $data = [];
        $url = "https://panel.sendcloud.sc/api/v2/user/addresses/sender/{id}";
        $method = "get";
        $url = str_replace("{id}", $senderId, $url);
        $data["headers"] = array(
            "Accept" => "application/json, text/plain, */*"
        );
        $response = [
            200 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\SendCloudClient\\Models\\SenderAddress',
                ),
        ];
        $responseFilter = function ($response) {
            return $response["sender_address"] ?? [];
        };
        return [$method, $url, $data, $response, $responseFilter];
    }

    /**
     * @return array
     */
    public function getIntegrations(): array
    {
        $data = [];
        $url = "https://panel.sendcloud.sc/api/v2/integrations";
        $method = "get";
        $data["headers"] = array(
            "Accept" => "application/json, text/plain, */*"
        );
        $response = [
            200 =>
                array(
                    '$type' => 'OBJ_ARRAY',
                    '$ref' => 'HarmSmits\\SendCloudClient\\Models\\Integration',
                ),
        ];
        $responseFilter = null;
        return [$method, $url, $data, $response, $responseFilter];
    }

    /**
     * @param Integration $integration
     *
     * @return array
     */
    public function updateIntegration(Integration $integration): array
    {
        $data = [];
        $url = "https://panel.sendcloud.sc/api/v2/integrations/{id}";
        $method = "put";
        $url = str_replace("{id}", $integration->getId(), $url);
        $data["headers"] = array(
            "Accept" => "application/json, text/plain, */*"
        );
        $data["json"] = $integration->__toArray();
        $response = [
            200 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\SendCloudClient\\Models\\Integration',
                ),
        ];
        $responseFilter = null;
        return [$method, $url, $data, $response, $responseFilter];
    }

    /**
     * @param int         $integrationId
     * @param string|null $cursor
     * @param array|null  $search
     *
     * @return array
     */
    public function getShipments(int $integrationId, ?string $cursor = null, ?array $search = null): array
    {
        $data = [];
        $url = "https://panel.sendcloud.sc/api/v2/integrations/{id}/shipments";
        $method = "get";
        $url = str_replace("{id}", $integrationId, $url);
        $data["headers"] = array(
            "Accept" => "application/json, text/plain, */*"
        );
        $data["query"] = array_merge(["cursor" => $cursor], array_filter($search));
        $response = [
            200 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\SendCloudClient\\Models\\ShipmentsResponse',
                    'results' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\SendCloudClient\\Models\\Shipment',
                        )
                ),
        ];
        $responseFilter = null;
        return [$method, $url, $data, $response, $responseFilter];
    }

    /**
     * @param int   $integrationId
     * @param array $shipments
     *
     * @return array
     */
    public function insertShipment(int $integrationId, array $shipments): array
    {
        $data = [];
        $url = "https://panel.sendcloud.sc/api/v2/integrations/{id}/shipments";
        $method = "post";
        $url = str_replace("{id}", $integrationId, $url);
        $data["headers"] = array(
            "Accept" => "application/json, text/plain, */*"
        );
        $data["json"] = array_map(function (Shipment $item) {
            return $item->__toArray();
        }, $shipments);
        $response = [
            200 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\SendCloudClient\\Models\\ShipmentResponse',
                ),
        ];
        $responseFilter = null;
        return [$method, $url, $data, $response, $responseFilter];
    }

    /**
     * @param int    $integrationId
     * @param string $shipmentUuid
     *
     * @return array
     */
    public function deleteShipment(int $integrationId, string $shipmentUuid): array
    {
        $data = [];
        $url = "https://panel.sendcloud.sc/api/v2/integrations/{id}/shipments/delete";
        $method = "post";
        $url = str_replace("{id}", $integrationId, $url);
        $data["headers"] = array(
            "Accept" => "application/json, text/plain, */*"
        );
        $data["json"] = array(
            "shipment_uuid" => $shipmentUuid
        );
        $response = [
            200 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\SendCloudClient\\Models\\ShipmentDeleteResponse',
                ),
        ];
        $responseFilter = null;
        return [$method, $url, $data, $response, $responseFilter];

    }
}
