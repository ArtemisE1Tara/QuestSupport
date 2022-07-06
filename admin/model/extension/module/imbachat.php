<?php 
class ModelExtensionModuleImbaChat extends Model {
 
    // Запись настроек в базу данных
    public function SaveSettings() {
      $this->load->model('setting/setting');
      $this->model_setting_setting->editSetting('module_imbachat', $this->request->post);
    }
   
    // Загрузка настроек из базы данных
    public function LoadSettings() {
      $this->load->model('setting/setting');
      $data = $this->model_setting_setting->getSetting('module_imbachat');
      return $data;
    }
   
}