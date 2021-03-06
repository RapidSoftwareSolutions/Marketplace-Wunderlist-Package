<?php

$app->post('/api/Wunderlist/test', function ($request, $response) {



    print_r($request);
    exit();



    $settings = $this->settings;
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, []);

    if(!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback']=='error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    $size = 45586;

    $client = $this->httpClient;
    $filePath = 'https://hi-news.ru/wp-content/uploads/2016/10/1448366149-650x366.jpg';

    try {
        $resp = $client->put('https://upload.wunderlist.io/6740a0d0-7513-0135-adda-22000ac5e637-1504689996-278221?partNumber=1&uploadId=Dq1xIXMF_ppOVOQIHQQxjcCEQI0lKI5oKDSZWjNEQxIml4y36J3qiPtIeKrGM1M1AWIi5mbnZvkhb9ufgwtnk0xA2obDvH8uRIBGhURMp5rTnkl9dHeeZwmpVZkQgi1D'
            ,[   'multipart' => [
                [
                    'name' => 'file',
                    'contents' => fread(fopen( $filePath, 'r'),$size)
                ]],

                'headers' => ['x-amz-date' => 'Wed, 06 Sep 2017 09:31:36 UTC +00:00','Authorization' => 'AWS AKIAJEN6W4AO3LJODOAA:lSRJwcmsyT8bdMelMASnz2g4GBA=','Content-Type' => ""]
            ]);
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