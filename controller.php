<?php
    $arr = array(
        'properties' => array(
            array(
                'property' => 'email',
                'value' => $_GET['email']
            ),
            array(
                'property' => 'firstname',
                'value' => $_GET['name']
            ),
            array(
                'property' => 'lastname',
                'value' => ''
            ),
            array(
                'property' => 'phone',
                'value' => $_GET['phone']
            ),            array(
                'property' => 'aff_source',
                'value' => $_GET['aff_source']
            ),
            array(
                'property' => 'aff_sid',
                'value' => $_GET['aff_sid']
            ),
            array(
                'property' => 'identifier',
                'value' => $_GET['identifier']
            ),
            array(
                'property' => 'hs_lead_status',
                'value' => "NEW"
            )
        )
    );

    $post_json = json_encode($arr);

    $endpoint = "https://api.hubapi.com/contacts/v1/contact/?hapikey=eec0dd53-5df5-442d-a3bb-30da698eca9b";
    $ch = @curl_init();
    @curl_setopt($ch, CURLOPT_POST, true);
    @curl_setopt($ch, CURLOPT_POSTFIELDS, $post_json);
    @curl_setopt($ch, CURLOPT_URL, $endpoint);
    @curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    @curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = @curl_exec($ch);
    $status_code = @curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curl_errors = curl_error($ch);
    @curl_close($ch);

    if ($status_code == 200) {
        $msg = 'success';
    }else{
        $msg = 'error';
    }
    echo $msg;
