<?php

$app->post('/api/Wunderlist/updateTask', function ($request, $response) {

    $settings = $this->settings;
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['clientId','accessToken','taskId','revision']);

    if(!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback']=='error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }

    $requiredParams = ['clientId'=>'client_id','accessToken'=>'access_token','taskId'=>'task_id','revision'=>'revision'];
    $optionalParams = ['listId'=>'list_id','title'=>'title','assigneeId'=>'assignee_id','completed'=>'completed','recurrenceType'=>'recurrence_type','recurrenceCount'=>'recurrence_count','dueDate'=>'due_date','starred'=>'starred','remove'=>'remove'];
    $bodyParams = [
       'json' => ['list_id','title','assignee_id','completed','recurrence_type','recurrence_count','due_date','starred','revision','task_id']
    ];

    $data = \Models\Params::createParams($requiredParams, $optionalParams, $post_data['args']);

    
    $data['dueDate'] = \Models\Params::toFormat($data['dueDate'], 'Y-m-d H:i:s');

    if(!empty($data['list_id']))
    {
        $data['list_id'] = (int) $data['list_id'] ;
    }

    if(!empty($data['recurrence_count']))
    {
        $data['recurrence_count'] = (int) $data['recurrence_count'] ;
    }

    if(!empty($data['assignee_id']))
    {
        $data['assignee_id'] = (int) $data['assignee_id'];
    }

    if(!empty($data['task_id']))
    {
        $data['task_id'] = (int) $data['task_id'];
    }

    if(!empty($data['revision']))
    {
        $data['revision'] = (int) $data['revision'];
    }


    if(!empty($data['completed']))
    {
        if($data['completed'] == 'true')
        {
            $data['completed'] = true;
        } else {
            $data['completed'] = false;
        }

    }

    if(!empty($data['starred']))
    {
        if($data['starred'] == 'true')
        {
            $data['starred'] = true;
        } else {
            $data['starred'] = false;
        }

    }




    $client = $this->httpClient;
    $query_str = "https://a.wunderlist.com/api/v1/tasks/{$data['task_id']}";

    

    $requestParams = \Models\Params::createRequestBody($data, $bodyParams);
    $requestParams['headers'] = ["X-Access-Token"=>"{$data['access_token']}", "X-Client-ID"=>"{$data['client_id']}"];

    try {
        $resp = $client->patch($query_str, $requestParams);
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