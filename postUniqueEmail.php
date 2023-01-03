<?php
$username = "Register_AMPHORAMKTCL";
$password = '8634-E$6xO$$F$6Ex125';
$userpwd = $username.":".$password;

$html = "<style>
         table,th,td{
            border: 1px solid;
         }
         </style>
         
         <table>
            <tr>
               <th>Person 1</th>
               <th>Person 2</th><th>Person 3</th>
            </tr>
            <tr>
               <td>Emil</td>
               <td>Tobias</td>
               <td>Linus</td>
            </tr>
            <tr>
               <td>16</td>
               <td>14</td>
               <td>10</td>
            </tr>
         </table>";

$data = json_encode([
    "GeneralData" => [
        "FromName" => "No Reply Amphora",
        "From" => "noreply@amphora.cl",
        "To" => [
           "Email" => [
              "jsepulveda@amphora.cl", 
              "maballay@amphora.cl"
           ]
        ],
        "Message" => [
           "Subject" => "Envío de tabla",
           "Classification" => "C",
           "Body"=> [
              "Format" => "html",
              "Value" => $html
            ]
        ],
        "Options" => [
           "OpenTracking" => "true",
           "ClickTracking" => "true",
           "TextHtmlTracking" => "true",
           "AutoTextBody" => "false"
        ]
    ]
]);

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api2019.masterbase.com/UniqueMail/v3/amphoramktcl',
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_SSL_VERIFYHOST => false,
    CURLOPT_HTTPHEADER => array( 'Content-Type: application/json'),
    CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
    CURLOPT_USERPWD => $userpwd,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => $data
));


$chresults = curl_exec($curl);
$response = json_decode($chresults, true);


var_dump($response);
