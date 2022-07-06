<?php
include 'additionally.php';

class ControllerExtensionModuleImbaChatUserSearch extends Controller {
    public function index() {
        $this->load->model('extension/module/imbachat');
        additionally::testAuthOrDie($this->model_extension_module_imbachat->getDevLogin(), $this->model_extension_module_imbachat->getDevPassword());
        
        $user_m = $this->model_extension_module_imbachat->searchUsers($this->request->get['str']);
        $user['name'] = $user_m['firstname'];
        $user['user_id'] =  $user_m['customer_id'];
        echo json_encode($user);
    }
}