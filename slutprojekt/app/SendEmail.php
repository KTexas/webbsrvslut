<?php

namespace App;

class SendEmail
{

    /**
     * @param array  $recipient   The recipient of the email
     * @param string $orderId     Order id used to display in email
     * @param array  $destination Destination of order
     * @param array  $product     Product information
     */
    public static function orderConfirm(
        array $recipient,
        string $orderId,
        array $destination,
        array $product
    )
    {
        $curl = curl_init();

        curl_setopt_array( $curl, [
            CURLOPT_URL => "https://api.pepipost.com/v5.1/mail/send",
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => '
                {
                    "from":{
                        "email":"kevkvi879@pepisandbox.com",
                        "name":"Helish"
                    },
                    "reply_to":"",
                    "subject":"Your order has been confirmed",
                    "template_id":28862,
                    "content": [{
                        "type":"html",
                        "value": "Recived order: [%ORDERID%]"
                    }],
                    "personalizations":[{
                        "attributes": {
                            "ORDERID":"' . $orderId . '",
                            "PRODUCTID": "' . $product[ 'productId' ] . '",
                            "PRODUCTNAME" : "' . $product[ 'productId' ] . '",
                            "QTY": "' . $product[ 'amount' ] . '",
                            "UNITPRICE": "' . $product[ 'unitPrice' ] . '",
                            "COUNTRY": "' . $destination[ 'country' ] . '",
                            "CITY": "' . $destination[ 'city' ] . '",
                            "ZIPCODE": "' . $destination[ 'zipCode' ] . '"
                        },
                    "to": [{
                        "email": "' . $recipient[ 'email' ] . '",
                        "name":"' . $recipient[ 'fname' ] . " " . $recipient[ 'lname' ] . '"
                    }],
                        "token_to":"noble-land-mermaid",
                        "token_cc":"MSGID657243",
                        "token_bcc":"MSGID657244"
                    }],
                    "settings":{
                        "open_track":true,
                        "click_track":true,
                        "unsubscribe_track":false
                    }}',
            CURLOPT_HTTPHEADER => [
                "api_key: ba900ef8d631b980922257b1a74a8f49",
                "content-type: application/json",
            ],
        ] );

        $response = curl_exec( $curl );
        $err = curl_error( $curl );

        curl_close( $curl );
    }

    public static function validationCode(
        array $recipient,
        string $code
    )
    {
        $curl = curl_init();

        curl_setopt_array( $curl, [
            CURLOPT_URL => "https://api.pepipost.com/v5.1/mail/send",
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => '
                {
                    "from":{
                        "email":"kevkvi879@pepisandbox.com",
                        "name":"Helish"
                    },
                    "reply_to":"",
                    "subject":"Your validation code",
                    "template_id":0,
                    "content": [{
                        "type":"html",
                        "value": "Your validation code is: <br><b>[%CODE%]</b>"
                    }],
                    "personalizations":[{
                        "attributes": {
                            "CODE":"' . $code . '"
                        },
                    "to": [{
                        "email": "' . $recipient['email'] . '",
                        "name":"' . $recipient[ 'fname' ] . " " . $recipient[ 'lname' ] . '"
                    }],
                        "token_to":"noble-land-mermaid",
                        "token_cc":"MSGID657243",
                        "token_bcc":"MSGID657244"
                    }],
                    "settings":{
                        "open_track":true,
                        "click_track":true,
                        "unsubscribe_track":false
                    }}',
            CURLOPT_HTTPHEADER => [
                "api_key: ba900ef8d631b980922257b1a74a8f49",
                "content-type: application/json",
            ],
        ] );

        $response = curl_exec( $curl );
        $err = curl_error( $curl );

        curl_close( $curl );
    }
}