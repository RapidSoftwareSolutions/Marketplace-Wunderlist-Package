<?php

$app->post('/api/Wunderlist/test', function ($request, $response) {

    $settings = $this->settings;
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, []);

    if(!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback']=='error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }


    $client = $this->httpClient;
    $filePath = 'https://hi-news.ru/wp-content/uploads/2016/10/1448366149-650x366.jpg';
    $filePath = '/img.jpg';
    try {
        $resp = $client->put('https://upload.wunderlist.io/52f05010-7508-0135-2be5-22000a4aa927-1504685237-733410?partNumber=1&uploadId=KD0rjvnMCx1Yl_TIstmoTpadGmsA7Lf5y7AzqMGvI8jXw.tAigr1ROkMBLmYqMXkqRqbIpV5S2iTkErrt1za.PI0J9FVsNhDLxNS1TcZw4jCbljV9rge2LNdz5C1qOuc'
            ,[   'multipart' => [
                [
                    'name' => 'file',
                    'contents' => fopen( $filePath, 'r')
                ]],

                'headers' => ['x-amz-date' => 'Wed, 06 Sep 2017 08:12:17 UTC +00:00','Authorization' => 'AWS AKIAJEN6W4AO3LJODOAA:UVPqIlImVPOkDRE1TPcIAL3/2tc=','Content-Type' => ""]
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