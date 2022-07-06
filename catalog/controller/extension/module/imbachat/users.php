<?php
include 'additionally.php';

class ControllerExtensionModuleImbaChatUsers extends Controller {
    public function index() {
        $this->load->model('extension/module/imbachat');
        additionally::testAuthOrDie($this->model_extension_module_imbachat->getDevLogin(), $this->model_extension_module_imbachat->getDevPassword());
        
        $ids = $this->request->get['ids'];
        $ids = explode(",", $ids);
        $users = [];
        $this->load->model('account/customer');
        
        foreach ($ids as $id){ 
            $user_m = $this->model_account_customer->getCustomer($id);
            if(!$user_m)
                continue;
            $user = [];
            $user['name'] = $user_m['firstname'];
            $user['user_id'] =  $id; 
            $users[] = $user;
        }
        
        echo json_encode($users);
    }
}
