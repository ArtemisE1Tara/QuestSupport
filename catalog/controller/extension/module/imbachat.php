<?php
class ControllerExtensionModuleImbaChat extends Controller {
    public function index() {

        $data = array();
        $data['params'] = json_encode([
            'token' => $this->getJWT(),
            'id' => $this->customer->getId(),
        ]);
        $data['dev_id'] = $this->model_extension_module_imbachat->getDevID();
        echo json_encode($data);
        return $this->load->view('extension/module/imbachat', $data);
    }
    public function getJWT()
    {
// Create token header as a JSON string
        $this->load->model('extension/module/imbachat');
        $header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);
        $pass = $this->model_extension_module_imbachat->getSecretKey();
        $data = array();
        $data['exp'] = (int)date('U')+3600*7;
        $data['user_id'] = $this->customer->getId();
        if(isset($data['user_id']))
        {
            $data['user_id'] = (int)$data['user_id'];
        }
// Create token payload as a JSON string
        $payload = json_encode($data);
// Encode Header to Base64Url String
        $base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));
// Encode Payload to Base64Url String
        $base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));
// Create Signature Hash
        $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, $pass, true);
// Encode Signature to Base64Url String
        $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));
// Create JWT
        return trim($base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature);
    }
}