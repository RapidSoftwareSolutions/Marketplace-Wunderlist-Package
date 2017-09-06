<?php

$app->post('/api/Wunderlist/uploadFileOnAmazon', function ($request, $response) {


    ini_set('display_errors',1);

    $settings = $this->settings;
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['uploadFile','uploadUrl','uploadDate','uploadAuthorization']);

    if(!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback']=='error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }

    $requiredParams = ['uploadFile'=>'upload_file','uploadUrl'=>'upload_url','uploadDate'=>'date','uploadAuthorization'=>'authorization'];
    $optionalParams = [];
    $bodyParams = [
       'form_params' => []
    ];

    $data = \Models\Params::createParams($requiredParams, $optionalParams, $post_data['args']);



    $client = $this->httpClient;
    $query_str = "{$data['upload_url']}";
    $filePath = $data['upload_file'];
    $requestParams = \Models\Params::createRequestBody($data, $bodyParams);
    $requestParams['headers'] = ["Content-Type"=>"", "Authorization"=>"{$data['authorization']}", "x-amz-date"=>"{$data['date']}"];
//    $requestParams['multipart'] = [
//        [
//            'name' => 'length',
//            'contents' => 45586
//        ],
//        [
//            'name' => 'file',
//            'filename' => '1448366149-650x366.jpg',
//            'contents' => fopen($filePath,'r')
//        ]
//    ];

    $requestParams['body'] = fopen($filePath,'r');


    try {
        $resp = $client->put($query_str, $requestParams);
        $responseBody = $resp->getBody()->getContents();

        if(in_array($resp->getStatusCode(), ['200', '201', '202', '203', '204'])) {
            $result['callback'] = 'success';
            $result['contextWrites']['to'] = is_array($responseBody) ? $responseBody : json_decode($responseBody);
            if(empty($result['contextWrites']['to'])) {
                $result['contextWrites']['to']['status_msg'] = "Api return no results";
            }
        } else {
            $result['callback'] = 'error';
            $result['contextWrites']['to']['status_code'] = 'API_ERROR';
            $result['contextWrites']['to']['status_msg'] = json_decode($responseBody);
        }

    } catch (\GuzzleHttp\Exception\ClientException $exception) {

        $responseBody = $exception->getResponse()->getBody()->getContents();
        if(empty(json_decode($responseBody))) {
            $out = $responseBody;
        } else {
            $out = json_decode($responseBody);
        }
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $out;

    } catch (GuzzleHttp\Exception\ServerException $exception) {

        $responseBody = $exception->getResponse()->getBody()->getContents();
        if(empty(json_decode($responseBody))) {
            $out = $responseBody;
        } else {
            $out = json_decode($responseBody);
        }
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $out;

    } catch (GuzzleHttp\Exception\ConnectException $exception) {

        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'INTERNAL_PACKAGE_ERROR';
        $result['contextWrites']['to']['status_msg'] = 'Something went wrong inside the package.';

    }

    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);

});