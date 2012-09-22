<?php
App::uses('ConfigAdminAppController', 'ConfigAdmin.Controller');
Configure::load('config_admin_codes');
/**
 * Settings Controller
 *
 */
class SettingsController extends ConfigAdminAppController {

    public $uses = array();
    public function index() {
        $codes = Configure::read('config_admin_codes');
        $this->set($codes);
        if($this->request->is('post')) {
            if(isset($this->request->data['field_submit'])) {
                $field = $this->request->data['field'];
                $values = $codes[$field];
                $this->set(compact('values'));
            }
            else {
                $field = $this->request->data['selected_field'];
                $field_name = $codes['editable_fields'][$field];
                $codes[$field] = $this->request->data['values'];
                Configure::write('config_admin_codes', $codes);
                Configure::dump('config_admin_codes.php', 'default', array('config_admin_codes'));
                $this->Session->setFlash("Settings Updated for $field_name");
            }
        }
    }

}
