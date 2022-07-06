<?php
class ModelExtensionModuleImbaChat extends Model {
  // Загрузка настроек из базы данных
  public function getSecretKey() {
    $this->load->model('setting/setting');
    $data = $this->model_setting_setting->getSettingValue('module_imbachat_secret_key');
    return $data;
  }
  public function getDevID() {
    $this->load->model('setting/setting');
    $data = $this->model_setting_setting->getSettingValue('module_imbachat_dev_id');
    return $data;
  }
  public function getDevLogin() {
    $this->load->model('setting/setting');
    $data = $this->model_setting_setting->getSettingValue('module_imbachat_dev_login');
    return $data;
  }
  public function getDevPassword() {
    $this->load->model('setting/setting');
    $data = $this->model_setting_setting->getSettingValue('module_imbachat_dev_pass');
    return $data;
  }
  public function searchUsers($name) {
    $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "customer WHERE firstname LIKE '%" . $name . "%'");

    return $query->row;
  }
}