<?php
// headers requeridos
header("Access-Control-Allow-Origin: http://localhost/APIRest");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
include_once 'model/Usuario.php';

$usuario = new Usuario();

// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// set valores das propriedades do produto
$usuario->$msisdn = $data->$msisdn;
$msisdn_exists = $usuario->msisdnExists();
 
// generate json web token
include_once 'config/core.php';
include_once 'libs/php-jwt-master/src/BeforeValidException.php';
include_once 'libs/php-jwt-master/src/ExpiredException.php';
include_once 'libs/php-jwt-master/src/SignatureInvalidException.php';
include_once 'libs/php-jwt-master/src/JWT.php';
use \Firebase\JWT\JWT;
 
// checar se msisdn existe e se password está correcta
if($msisdn_exists && password_verify($data->password, $usuario->password)){
 
    $token = array(
       "iss" => $iss,
       "aud" => $aud,
       "iat" => $iat,
       "nbf" => $nbf,
       "data" => array(
           "msisdn" => $usuario->msisdn,
           "name" => $usuario->name,
           "access_level" => $usuario->access_level,
           "external_id" => $usuario->external_id
       )
    );
 
    // set response code
    http_response_code(200);
 
    // generate jwt
    $jwt = JWT::encode($token, $key);
    echo json_encode(
            array(
                "message" => "Logado com sucesso.",
                "jwt" => $jwt
            )
        ); 
} 
// login failed
else{
 
    // set response code
    http_response_code(401);
 
    // tell the user login failed
    echo json_encode(array("message" => "Login falhou."));
}

?>