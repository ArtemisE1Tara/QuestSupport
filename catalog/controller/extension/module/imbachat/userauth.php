<?php
include 'additionally.php';

class ControllerExtensionModuleImbaChatUserAuth extends Controller {
    public function index() {
        $this->load->model('extension/module/imbachat');
        additionally::testAuthOrDie($this->model_extension_module_imbachat->getDevLogin(), $this->model_extension_module_imbachat->getDevPassword());
        
        $this->load->model('account/customer');
        $this->customer->login($this->request->post['email'], $this->request->post['password']);
        $user_m = $this->model_account_customer->getCustomer($this->customer->getId());
        $user = [];
        $user['name'] = $user_m['firstname'];
        $user['user_id'] =  $user_m['customer_id'];
        
        echo json_encode($user);
    }
}