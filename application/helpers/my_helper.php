<?php

if (!function_exists('get_list_table')) {    
    function get_list_table($table, $field, $where){
        $CI = &get_instance();
        $result = null;
        $data = $CI->DataHandle->getAllWhere($table, $field, $where);
        if($data->num_rows()){
            $result = $data->result();
        }

        return $result;
    }
}

function base64url_encode($data) {
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}

function base64url_decode($data) {
    return base64_decode(strtr($data, '-_', '+/') . str_repeat('=', 3 - (3 + strlen($data)) % 4));
}

function encryptArrayForUrl($array) {
    // Serialize array to string
    $serializedData = serialize($array);

    
    $secretKey = 'mySecretKey123';
    $secretIv = 'mySecretIv123';

    // Hash the key and IV
    $key = hash('sha256', $secretKey);
    $iv = substr(hash('sha256', $secretIv), 0, 16);

    // Encrypt the data
    $encryptedData = openssl_encrypt($serializedData, 'AES-256-CBC', $key, 0, $iv);

    // Encode to URL-safe Base64
    return base64url_encode($encryptedData);
}

function decryptArrayFromUrl($encryptedString) {
    // Decode from URL-safe Base64
    $encryptedData = base64url_decode($encryptedString);

    
    $secretKey = 'mySecretKey123';
    $secretIv = 'mySecretIv123';

    // Hash the key and IV
    $key = hash('sha256', $secretKey);
    $iv = substr(hash('sha256', $secretIv), 0, 16);

    // Decrypt the data
    $decryptedData = openssl_decrypt($encryptedData, 'AES-256-CBC', $key, 0, $iv);

    // Unserialize back to array
    return unserialize($decryptedData);
}

if (!function_exists('test_ntrigb_connection')) {
    function test_ntrigb_connection()
    {
        $CI =& get_instance();
    
        try {
    
            $db = $CI->load->database('ntrigb', TRUE);
    
            if (!$db->conn_id) {
                return false;
            }
    
            $query = $db->query("SELECT 1");
    
            if (!$query) {
                return false;
            }
    
            return true;
    
        } catch (Exception $e) {
    
            log_message('error', 'NTRIGB Connection Error : '.$e->getMessage());
    
            return false;
        }
    }
}

if(!function_exists('test_oracle_connection')){
    function formatDateExcel($value)
    {
        if(empty($value)) return null;
    
        // 1. Kalau numeric (Excel serial date)
        if(is_numeric($value)){
            try {
                return \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value)
                    ->format('Y-m-d');
            } catch (\Exception $e) {
                return null;
            }
        }
    
        // 2. Normalize separator (biar aman)
        $value = str_replace('/', '-', trim($value));
    
        // 3. Coba berbagai format umum
        $formats = [
            'd-m-Y',
            'd-m-y',
            'Y-m-d',
            'm-d-Y',
            'm-d-y'
        ];
    
        foreach ($formats as $format) {
            $date = DateTime::createFromFormat($format, $value);
            if ($date && $date->format($format) === $value) {
                return $date->format('Y-m-d');
            }
        }
    
        // 4. Fallback (strtotime)
        $timestamp = strtotime($value);
        if($timestamp){
            return date('Y-m-d', $timestamp);
        }
    
        return null;
    }
}

if(!function_exists('test_oracle_connection')){

    function test_oracle_connection()
    {
        $username = 'MCFPRO';
        $password = 'MCFPRO';
        $tns_alias = 'MCF.npr.co.jp'; // Ini adalah alias dari tnsnames.ora
    
        $conn = @oci_connect($username, $password, $tns_alias);
    
        if (!$conn) {
            $e = oci_error();
            $CI = &get_instance();
            $CI->session->set_flashdata('msg_html', '<div class="alert alert-danger p-3 mt-5 information-field">
                    <div class=" d-flex align-items-center">
                        <div class="d-flex flex-column">
                            <h4 class="mb-1 text-danger">Gagal Terhubung ke Mc Frame!</h4>
                            <span class="fw-normal fs-6">
                                Untuk Penggunaan ITS SIMPLE yang berhubungan dengan Mc Frame tidak dapat dilakukan 
                            </span>
                        </div>
                        <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
                            <i class="fa fa-times text-danger"></i>
                        </button>
                    </div>
                </div>
                ');
            log_message('error', 'Oracle Connection Failed: ' . $e['message']);
            return false;
        }
    
        oci_close($conn);
        return true;
    }
}

if (!function_exists('set_session_array_safe')) {
    function set_session_array_safe($data = [])
    {
        $CI = &get_instance();

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!empty($data) && is_array($data)) {
            $CI->session->set_userdata($data);
        }

        session_write_close();
    }
}

if (!function_exists('unset_session_array_safe')) {
    function unset_session_array_safe($keys = [])
    {
        $CI = &get_instance();

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!empty($keys)) {
            $CI->session->unset_userdata($keys);
        }

        session_write_close();
    }
}

if (!function_exists('set_session_safe')) {
    function set_session_safe($param, $data)
    {
        $CI = &get_instance();

        session_start();

        $CI->session->set_userdata($param,$data);

        session_write_close();
    }
}

if (!function_exists('check_session')) {
    function check_session(){
        $return_url = base_url();
        $CI = &get_instance();

        
        $role = $CI->session->userdata('role');
        $nama_role = null;
        $data_menu = null;
        $arr_menu = null;

        if(is_array($role)){
            $string_role = arr_to_string($role);

            if(strpos($string_role, "29") > 0){
                $IS_SA = true;
            }
            $cek_role = $CI->DataHandle->getAllWhere('t_tipe_user', 'tipe', ["id in (".$string_role.")" => null]);

            $nama_role = [];
            foreach($cek_role->result() as $baris){
                $nama_role[] = $baris->tipe;
            }

            $cek_menu = $CI->DataHandle->getAllWhere('t_auth', 'id_menu', ["id_tipe_user in (".$string_role.")" => null]);

            if($cek_menu->num_rows() < 1){
                $response = [
                    'status' => 0,
                    'message' => "Role Anda belum memiliki menu Aktif, hubungi admin untuk dilakukan setting",
                    'tipe' => "info",
                    'title' => "Maaf",
                ];
                echo json_encode($response);
                die;                        
            }

            $menu_akses = [];
            foreach($cek_menu->result() as $menu){
                $menu_akses[] = $menu->id_menu;
            }

            $menu = arr_to_string($menu_akses);

            $cek_menu = $CI->DataHandle->getAllWhere('t_menu', '*', ["id in (".$menu.")" => null], 'sort ASC');

            if($cek_menu->num_rows() < 1){
                $response = [
                    'status' => 0,
                    'message' => "Role Anda belum memiliki menu Aktif, hubungi admin untuk dilakukan setting",
                    'tipe' => "info",
                    'title' => "Maaf",
                ];
                echo json_encode($response);
                die;                          
            }

            $data_menu = $cek_menu->result();
            foreach($cek_menu->result() as $menu){
                if($menu->path != null):
                    $arr_menu[] = $menu->path;
                endif;
            }
            $arr_menu[] = 'Ng_dashboard';
            $arr_menu[] = 'New_production_result';
            $arr_menu[] = 'Dashboard';
            $arr_menu[] = 'Password_change';
            $arr_menu[] = 'Logout';
            $arr_menu[] = 'Upload';
        }
        if ($CI->session->userdata('role') == null && $CI->session->userdata('username') == null) {
            $CI->session->set_flashdata('msg', '<script>Swal.fire("Oops..", "Lakukan Login terlebih dahulu!!!", "info"); </script>');
            redirect($return_url);
        }                
        if($CI->session->userdata('arr_menu') == null){
            $CI->session->set_flashdata('msg', '<script>Swal.fire("Oops..", "Lakukan Login terlebih dahulu!!!", "info"); </script>');
            redirect('Logout');
        }

        $link_access = $CI->uri->segment(1);
        if(!in_array($link_access, $arr_menu)){
            $CI->session->set_flashdata('msg_html', '<div class="alert alert-danger p-3 mt-5 information-field">
            <div class=" d-flex align-items-center">
                <div class="d-flex flex-column">
                    <h4 class="mb-1 text-danger">Access Denied!</h4>
                    <span class="fw-normal fs-6">
                        Maaf Role Anda tidak diizinkan mengakses Menu tersebut. 
                    </span>
                </div>
                <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
                    <i class="fa fa-times text-danger"></i>
                </button>
            </div>
        </div>
        ');
            $CI->session->set_flashdata('msg', '<script>Swal.fire({
                title: "Maaf!",
                html: "Role Anda tidak diizinkan meng-akses Halaman ini. <a href id=\'stop-timer\'>.</a>",
                type:"warning",
                timer: 10000,
                didOpen: () => {
                  Swal.getHtmlContainer().querySelector(`#stop-timer`).addEventListener(`click`, e => {
                    e.preventDefault()
                    Swal.stopTimer()
                  })
                }
              })</script>');
            redirect('Dashboard');
        }
    }

}


if (!function_exists('convertFlexibleDate')) {
    function convertFlexibleDate($dateString, $outputFormat = 'Y-m-d')
    {
        if (empty($dateString)) {
            return false;
        }

        $dateString = trim($dateString);

        // 🔎 Cek apakah mengandung huruf A-Z
        if (preg_match('/[A-Za-z]/', $dateString)) {

            // Normalisasi jadi uppercase biar aman (jan -> JAN)
            $dateString = strtoupper($dateString);

            // Coba format Oracle: 24-FEB-26
            $date = DateTime::createFromFormat('d-M-y', $dateString);

        } else {

            // Kalau numeric, coba beberapa kemungkinan format
            $formats = ['Y-m-d', 'd-m-Y', 'd/m/Y', 'Y/m/d'];

            foreach ($formats as $format) {
                $date = DateTime::createFromFormat($format, $dateString);
                if ($date !== false) {
                    break;
                }
            }
        }

        if (empty($date) || $date === false) {
            return false; // tidak valid
        }

        return $date->format($outputFormat);
    }
}

if (!function_exists('log_icl')) {
    function log_icl($ICL_NUMBER = null, $ACTIVITY=null, $APPROVAL = null, $REASON = null){
        if($ACTIVITY && $ICL_NUMBER){
            $CI = &get_instance();
            $APPROVER_NAME = $CI->session->userdata('nama_lengkap');
            $CREATED_BY = $CI->session->userdata('username');
            $data_log = [
                'ICL_NUMBER' => $ICL_NUMBER,
                'APPROVAL' => $APPROVAL,
                'CREATED_BY' => $CREATED_BY,
                'APPROVER_NAME' => $APPROVER_NAME,
                'ACTIVITY' => $ACTIVITY,
                'REASON' => $REASON,
            ];

            $CI->DataHandle->insert('tr_log_icl', $data_log);

        }
    }
}

if (!function_exists('update_task')) {
    function update_task($table = null, $UNIQ_NO = null, $nama_role=null){
        $CI = &get_instance();

        $update_task = null;
        $cek_task = $CI->DataHandle->getAllWhere('tr_notifications', '*', ['uniq_no' => $UNIQ_NO, 'role'=>$nama_role, 'task_type' => $table]);
        if($cek_task->num_rows() > 0){
            $task = $cek_task->row_array();
            $task_update = [
                'done_at' => date('Y-m-d H:i:s'),
                'task_status' => 'done',
            ];
            $kondisi = [
                'id' => $task['id'],
            ];

            $update_task = [
                'update_data' => $task_update,
                'where' => $kondisi,
            ];
        }

        return $update_task;
    }
}
if (!function_exists('log_all')) {
    function log_all($table = null, $UNIQ_NO = null, $ACTIVITY=null, $APPROVAL = null, $REASON = null, $table_name = null, $waktu_custom = null){
        if($ACTIVITY && $UNIQ_NO){
            $CI = &get_instance();

            $get_user = $CI->DataHandle->getAllWhere('t_user', 'username, nama_lengkap', ['username' => $APPROVAL]);
            if($get_user->num_rows() > 0){
                $get_user = $get_user->row_array();
                $APPROVER_NAME = $get_user['nama_lengkap'];
                $CREATED_BY = $get_user['username'];            }
            else{
                $APPROVER_NAME = $CI->session->userdata('nama_lengkap');
                $CREATED_BY = $CI->session->userdata('username');
            }
            $data_log = [
                'UNIQ_NO' => $UNIQ_NO,
                'APPROVAL' => $APPROVAL,
                'CREATED_BY' => $CREATED_BY,
                'APPROVER_NAME' => $APPROVER_NAME,
                'ACTIVITY' => $ACTIVITY,
                'REASON' => $REASON,
                'TABLE_NAME' => $table_name,
            ];

            if($waktu_custom != null){
                $data_log['CREATED_AT'] = $waktu_custom;
            }

            $CI->DataHandle->insert($table, $data_log);

        }
    }
}
if (!function_exists('log_all_siguber')) {
    function log_all_siguber($table = null, $UNIQ_NO = null, $ACTIVITY=null, $APPROVAL = null, $REASON = null, $table_name = null, $waktu_custom = null){
        if($ACTIVITY && $UNIQ_NO){
            $CI = &get_instance();

            $get_user = $CI->DataHandle->getAllWhere('t_user', 'username, nama_lengkap', ['username' => $APPROVAL]);
            if($get_user->num_rows() > 0){
                $get_user = $get_user->row_array();
                $APPROVER_NAME = $get_user['nama_lengkap'];
                $CREATED_BY = $get_user['username'];            }
            else{
                $APPROVER_NAME = $CI->session->userdata('nama_lengkap');
                $CREATED_BY = $CI->session->userdata('username');
            }
            $data_log = [
                'UNIQ_NO' => $UNIQ_NO,
                'APPROVAL' => $APPROVAL,
                'CREATED_BY' => $CREATED_BY,
                'APPROVER_NAME' => $APPROVER_NAME,
                'ACTIVITY' => $ACTIVITY,
                'REASON' => $REASON,
                'TABLE_NAME' => $table_name,
            ];

            if($waktu_custom != null){
                $data_log['CREATED_AT'] = $waktu_custom;
            }

            $CI->DataHandle_ntrigb->insert($table, $data_log);

        }
    }
}
if (!function_exists('log_multi_table')) {
    function log_multi_table($table = null, $UNIQ_NO = null, $ACTIVITY=null, $APPROVAL = null, $REASON = null){
        if($ACTIVITY && $UNIQ_NO){
            $CI = &get_instance();
            $APPROVER_NAME = $CI->session->userdata('nama_lengkap');
            $CREATED_BY = $CI->session->userdata('username');
            $data_log = [
                'UNIQ_NO' => $UNIQ_NO,
                'APPROVAL' => $APPROVAL,
                'CREATED_BY' => $CREATED_BY,
                'APPROVER_NAME' => $APPROVER_NAME,
                'ACTIVITY' => $ACTIVITY,
                'REASON' => $REASON,
            ];

            $CI->DataHandle->insert($table, $data_log);

        }
    }
}

if (!function_exists('log_bc25')) {
    function log_bc25($NO_INV = null, $ACTIVITY=null, $APPROVAL = null, $REASON = null){
        if($ACTIVITY && $NO_INV){
            $CI = &get_instance();
            $APPROVER_NAME = $CI->session->userdata('nama_lengkap');
            $CREATED_BY = $CI->session->userdata('username');
            $data_log = [
                'NO_INV' => $NO_INV,
                'APPROVAL' => $APPROVAL,
                'CREATED_BY' => $CREATED_BY,
                'APPROVER_NAME' => $APPROVER_NAME,
                'ACTIVITY' => $ACTIVITY,
                'REASON' => $REASON,
            ];

            $CI->DataHandle->insert('bc25_tr_log', $data_log);

        }
    }
}

if (!function_exists('get_pembuat_ap')) {
    function get_pembuat_ap($id){
        $result = '';
        if($id){
            $CI = &get_instance();
            $cek_pembuat = $CI->DataHandle->getAllWhere('tr_log_ap', 'APPROVER_NAME as pembuat', ['UNIQ_NO' => $id, 'ACTIVITY' => 'Pengajuan Item AP Baru'], 'ID DESC');  
            if($cek_pembuat->num_rows() > 0){
                $data_pembuat = $cek_pembuat->row_array()['pembuat'];
                $result = strtoupper($data_pembuat);
            } 

        }

        return $result;
    }
}

if (!function_exists('get_pembuat_icl')) {
    function get_pembuat_icl($icl_number){
        $result = '';
        if($icl_number){
            $CI = &get_instance();
            $cek_pembuat = $CI->DataHandle->getAllWhere('tr_log_icl', 'APPROVER_NAME as pembuat', ['ICL_NUMBER' => $icl_number, 'ACTIVITY' => 'Membuat ICL'], 'ID DESC');  
            if($cek_pembuat->num_rows() > 0){
                $data_pembuat = $cek_pembuat->row_array()['pembuat'];
                $result = strtoupper($data_pembuat);
            } 

        }

        return $result;
    }
}

if (!function_exists('upload_config_png')) {
	function upload_config_png($path, $newname) {
		if (!is_dir($path)) 
			mkdir($path, 0777, TRUE);	
        $CI = &get_instance();
		$config['file_name'] = $newname;	
		$config['upload_path'] 		= './'.$path;		
		$config['allowed_types'] 	= 'png|PNG';
		$config['max_filename']	 	= '255';
		$config['max_size'] 		= 4096; 
		$CI->load->library('upload', $config);
	}
}

if (!function_exists('get_no_invoice_bc25')) {
    function get_no_invoice_bc25()
    {
        $CI = &get_instance();
        $cek_last = $CI->DataHandle->getAllWhereLim('bc25_t_dokumen', 'no_inv', ['status' => 1, "created_at like '%".date('Y')."%'" => null, 'tgl_daftar != ' => null], 'id desc', 1);

        $last_inv = '0001';
        if($cek_last->num_rows() > 0){
            $data = $cek_last->row_array();
            $last_inv = 0;
            if($data['no_inv'] != null){
                $last_inv = substr($data['no_inv'], 0, 4);
            }
            $last_inv = sprintf('%04d',$last_inv);
        }
        return $last_inv;
    }
}

if (!function_exists('get_path_ttd_general')) {
    function get_path_ttd_general($UNIQ_NO, $type, $ACTIVITY, $table, $requestPath = false){
        $result = '';
        if($UNIQ_NO){
            $CI = &get_instance();;
            $where['ACTIVITY'] = $ACTIVITY;
            $where['UNIQ_NO'] = $UNIQ_NO;
            if($type == 'approval'){
                unset($where['ACTIVITY']);
                $where["(ACTIVITY LIKE '%Approve ICL - Gudang Supplies%' OR ACTIVITY LIKE '%Approve ICL - PCD%')"] = null;
            }
            else{
            }

            $cek_pembuat = $CI->DataHandle->getAllWhere($table, 'CREATED_BY', $where, 'ID DESC');  
            
            if($cek_pembuat->num_rows() > 0){
                $data_pembuat = $cek_pembuat->row_array()['CREATED_BY'];
                $cek_ttd = $CI->DataHandle->getAllWhere('v_022_dept_section_user', 'PATH, FILENAME', ['username' => $data_pembuat]);
                if($cek_ttd->num_rows() > 0){
                    $path = (($cek_ttd->row_array()['PATH'] == null) || ($cek_ttd->row_array()['PATH'] == '')) ? '' : $cek_ttd->row_array()['PATH'];
                    $filename = (($cek_ttd->row_array()['FILENAME'] == null) || ($cek_ttd->row_array()['FILENAME'] == '')) ? '' : $cek_ttd->row_array()['FILENAME'];
                    $tampung = $path.$filename;
                    if($tampung != ''){                 
                        if(file_exists(FCPATH.$tampung)){
                            $ttd = file_get_contents(FCPATH.$tampung);
                            $result = base64_encode($ttd);           
                            if($requestPath){
                                $result = FCPATH.$tampung;
                            }     
                        }
                    }   
                }
            } 

        }

        return $result;
    }
}

if (!function_exists('get_path_ttd')) {
    function get_path_ttd($icl_number, $type){
        $result = '';
        if($icl_number){
            $CI = &get_instance();
            $ACTIVITY = 'Membuat ICL';
            $where['ACTIVITY'] = $ACTIVITY;
            $where['ICL_NUMBER'] = $icl_number;
            if($type == 'approval'){
                unset($where['ACTIVITY']);
                $where["(ACTIVITY LIKE '%Approve ICL - Gudang Supplies%' OR ACTIVITY LIKE '%Approve ICL - PCD%')"] = null;
            }
            else{
            }

            $cek_pembuat = $CI->DataHandle->getAllWhere('tr_log_icl', 'CREATED_BY', $where, 'ID DESC');  
            if($cek_pembuat->num_rows() > 0){
                $data_pembuat = $cek_pembuat->row_array()['CREATED_BY'];
                $cek_ttd = $CI->DataHandle->getAllWhere('v_022_dept_section_user', 'PATH, FILENAME', ['username' => $data_pembuat]);
                if($cek_ttd->num_rows() > 0){
                    $path = (($cek_ttd->row_array()['PATH'] == null) || ($cek_ttd->row_array()['PATH'] == '')) ? '' : $cek_ttd->row_array()['PATH'];
                    $filename = (($cek_ttd->row_array()['FILENAME'] == null) || ($cek_ttd->row_array()['FILENAME'] == '')) ? '' : $cek_ttd->row_array()['FILENAME'];
                    $tampung = $path.$filename;
                    if($tampung != ''){                 
                        if(file_exists(FCPATH.$tampung)){
                            $ttd = file_get_contents(FCPATH.$tampung);        
                            $result = base64_encode($ttd);                
                        }
                    }   
                }
            } 

        }

        return $result;
    }
}

if (!function_exists('get_approval_icl')) {
    function get_approval_icl($icl_number){
        $result = '';
        if($icl_number){
            $CI = &get_instance();
            $cek_approval = $CI->DataHandle->getAllWhere('tr_log_icl', 'APPROVER_NAME as approval', ['ICL_NUMBER' => $icl_number, "(ACTIVITY LIKE '%Approve ICL - Gudang Supplies%' OR  ACTIVITY LIKE '%Approve ICL - PCD%')" => null], 'ID DESC');  
            if($cek_approval->num_rows() > 0){
                $data_approval = $cek_approval->row_array()['approval'];
                $result = strtoupper($data_approval);
            } 

        }

        return $result;
    }
}

if (!function_exists('get_last_submission')) {
    function get_last_submission(){
        $CI = &get_instance();
        $sql = "SELECT max(SUBMISSION_NO) as jml FROM `tr_master_item_ap_temp`";
        $query = $CI->db->query($sql);
        $total_row = intval(substr($query->row_array()['jml'],-5));
        $total_row = $total_row+1; 
        return $total_row;
    }

}

if (!function_exists('get_last_separation_non_oem_code')) {
    function get_last_separation_non_oem_code(){
        $CI = &get_instance();
        $sql = "SELECT COUNT(1) jml FROM `tr_separation_non_oem` WHERE created_at LIKE '%".date('Y')."%'";
        $query = $CI->db->query($sql);
        $total_row = intval($query->row_array()['jml']);
        $total_row = $total_row+1; 
        return $total_row;
    }

}

if (!function_exists('get_last_separation_today')) {
    function get_last_separation_today(){
        $CI = &get_instance();
        $sql = "SELECT COUNT(1) jml FROM `tr_separation_merge` WHERE tanggal_proses = '".date('Y-m-d')."'";
        $query = $CI->db->query($sql);
        $total_row = intval($query->row_array()['jml']);
        $total_row = $total_row+1; 
        return $total_row;
    }

}
if (!function_exists('make_qr')) {
    function make_qr($kode, $kode_khusus = null, $image_dir = null)
    {
        $kode_teks = $kode;
        if($kode_khusus != null){
            $kode_teks = $kode_khusus;
        }
        $CI = &get_instance();
        $config['cacheable']    = true;
        $config['cachedir']     = FCPATH . 'application/cache/';
        $config['errorlog']     = FCPATH . 'application/logs/';
        $config['imagedir']     = FCPATH . 'generate/qr/';
        if($image_dir != null){
            $config['imagedir']     = FCPATH . $image_dir;
        }
        $config['quality']      = true;
        $config['size']         = '1024';
        $config['black']        = array(224, 255, 255);
        $config['white']        = array(70, 130, 180);
        $CI->ciqrcode->initialize($config);

        $params['data'] = $kode;
        $params['level'] = 'H';
        $params['size'] = 10;
        $params['savename'] = $config['imagedir'] . $kode_teks . '.png';
        $CI->ciqrcode->generate($params);
    }
}

if (!function_exists('countWorkingDays')) {
    function countWorkingDays($start, $end, $holidays = [])
    {
        $startDate = new DateTime($start);
        $endDate   = new DateTime($end);
        $endDate->modify('+1 day'); // supaya end date ikut dihitung

        $interval = new DateInterval('P1D');
        $period = new DatePeriod($startDate, $interval, $endDate);

        $workDays = 0;

        foreach ($period as $date) {
            $day = $date->format('N'); // 6 = Sabtu, 7 = Minggu
            $formatted = $date->format('Y-m-d');

            if ($day >= 6) continue;               // Skip weekend
            if (in_array($formatted, $holidays)) continue; // Skip libur nasional

            $workDays++;
        }

        return $workDays;
    }
}


if (!function_exists('get_gr_date_separation')) {
    function get_gr_date_separation($date = null){
        if($date != null){
            $y = substr($date,3,1);
            $m = substr($date,5,2);
            $d = substr($date,8,2);
            $hurufs = ['A','B','C','D','E','F','G','H','I','J'];
            $tahun_konversi = $hurufs[($y - 1)];
            $output = $tahun_konversi.$m.$d;
        }
        else{
            $hurufs = ['A','B','C','D','E','F','G','H','I','J'];
            $tahun_konversi = $hurufs[(substr(date('Y'),3,1) - 1)];
            $output = $tahun_konversi.date('m').date('d');
        }
        return $output;
    }
}
if (!function_exists('get_count_day')) {
    function get_count_day($tanggal_awal, $tanggal_akhir)
    {         
        $tanggal_awal = strtotime($tanggal_awal);
        $tanggal_akhir = strtotime($tanggal_akhir);

        $CI = &get_instance();
        $sql = "SELECT * FROM t_holiday where STATUS = '1'";
        $query = $CI->db->query($sql);
        $holiday = [];
        $changeday = [];
        if (!empty($query)) {
            foreach($query->result() as $row){
                if($row->TYPE_DAY == 'HOLIDAY'){
                    $holiday[] = strtotime($row->TANGGAL);
                }
                else if($row->TYPE_DAY == 'CHANGEDAY'){
                    $changeday[] = strtotime($row->TANGGAL);                    
                }
            }
        }
        
        $work_day = array();
        $sabtuminggu = array();
        $hari_ke = 0; 
        for ($i=$tanggal_awal; $i <= $tanggal_akhir; $i += (60 * 60 * 24)) {
            if (date('w', $i) !== '0' && date('w', $i) !== '6') {
                if(!in_array($i, $holiday)){
                    $hari_ke++;
                }
            } else {
                if(in_array($i, $changeday)){
                    $hari_ke++;
                }
                else{
                    $sabtuminggu[] = $i;
                }
            }
         
        }

        return $hari_ke;
    }
}

if (!function_exists('format_hari_tanggal')) {
    function format_hari_tanggal($tanggal)
    {
        // Array nama hari
        $hari = array(
            'Sunday'    => 'Minggu',
            'Monday'    => 'Senin',
            'Tuesday'   => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday'  => 'Kamis',
            'Friday'    => 'Jumat',
            'Saturday'  => 'Sabtu'
        );

        // Array nama bulan
        $bulan = array(
            1  => 'Januari',
            2  => 'Februari',
            3  => 'Maret',
            4  => 'April',
            5  => 'Mei',
            6  => 'Juni',
            7  => 'Juli',
            8  => 'Agustus',
            9  => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        );

        // Ubah ke timestamp
        $timestamp = strtotime($tanggal);

        // Ambil hari dan tanggal
        $nama_hari  = $hari[date('l', $timestamp)];
        $tgl        = date('j', $timestamp);
        $nama_bulan = $bulan[(int)date('n', $timestamp)];
        $tahun      = date('Y', $timestamp);

        return "$nama_hari, $tgl $nama_bulan $tahun";
    }
}

if (!function_exists('get_holiday')) {
    function get_holiday($BULAN=null, $TAHUN = null)
    {
        $result = 0;
        if($TAHUN && $BULAN){
            $CI = &get_instance();
            $sql = "SELECT * FROM t_holiday where TANGGAL LIKE '%".$TAHUN."-".$BULAN."%' ORDER BY ID";

            $holiday = 0;
            $query = $CI->db->query($sql);
            if (!empty($query)) {
                $result = $query->num_rows();
                
                if($result > 0){
                    $tanggal_awal = '01-'.$BULAN.'-'.$TAHUN;
                    $tanggal_akhir = null;
                    foreach($query->result() as $row){
                        $cek_tanggal = strtotime($row->TANGGAL);
                        if (date('w', $cek_tanggal) !== '0' && date('w', $cek_tanggal) !== '6') {
                            $holiday++;
                        }
                        if($row->TYPE_DAY == 'CHANGEDAY'){
                            $holiday--;
                        }
                    }

                    $result = $holiday;

                }

            }

            return $result;
            
        }
        else{
            return $result;
        }
    }
}
if (!function_exists('get_work_day')) {
    function get_work_day($BULAN, $TAHUN)
    {
        $tanggal_awal = '01-'.$BULAN.'-'.$TAHUN;
        $total_hari = cal_days_in_month(CAL_GREGORIAN, $BULAN, $TAHUN);
        
        $tanggal_akhir = $total_hari.'-'.$BULAN.'-'.$TAHUN;
         
        // tanggalnya diubah formatnya ke Y-m-d 
        $tanggal_awal = date_create_from_format('d-m-Y', $tanggal_awal);
        $tanggal_awal = date_format($tanggal_awal, 'Y-m-d');
        $tanggal_awal = strtotime($tanggal_awal);
         
        $tanggal_akhir = date_create_from_format('d-m-Y', $tanggal_akhir);
        $tanggal_akhir = date_format($tanggal_akhir, 'Y-m-d');
        $tanggal_akhir = strtotime($tanggal_akhir);
         
        $work_day = array();
        $sabtuminggu = array();
         
        for ($i=$tanggal_awal; $i <= $tanggal_akhir; $i += (60 * 60 * 24)) {
            if (date('w', $i) !== '0' && date('w', $i) !== '6') {
                $work_day[] = $i;
            } else {
                $sabtuminggu[] = $i;
            }
         
        }
        $jumlah_work_day = count($work_day);
        return $jumlah_work_day;
        // $jumlah_sabtuminggu = count($sabtuminggu);
        // $abtotal = $jumlah_work_day + $jumlah_sabtuminggu;

        // echo "<pre>";
        // echo "<h1>Sistem Cuti Online</h1>";
        // echo "<hr>";
        // echo "Mulai Cuti : " . date('d-m-Y', $tanggal_awal) . "<br>";
        // echo "Terakhir Cuti : " . date('d-m-Y', $tanggal_akhir) . "<br>";
        // echo "Jumlah Hari Cuti : " . $jumlah_work_day ."<br>";
        // echo "Jumlah Sabtu/Minggu : " . $jumlah_sabtuminggu ."<br>";
        // echo "Total Hari : " . $abtotal ."<br>";
    }
}

if (!function_exists('get_t_process')) {
    function get_t_process()
    {
        $CI = &get_instance();
        $sql = "SELECT * FROM t_process where  STATUS = '1' ORDER BY ID";

        $query = $CI->db->query($sql);
        if (!empty($query)) {
            $result = $query->result();
        } else {
            $result = 0;
        }
        return $result;
    }
}

if (!function_exists('get_all')) {
    function get_all($table,$where)
    {
        $CI = &get_instance();
        $sql = "SELECT * FROM ".$table." ".$where."";

        $query = $CI->db->query($sql);
        if (!empty($query)) {
            $result = $query->result();
        } else {
            $result = 0;
        }
        return $result;
    }
}

if (!function_exists('get_t_section')) {
    function get_t_section($where = null)
    {
        $CI = &get_instance();

        $kondisi = "STATUS = '1' ";
        if($where){
            $kondisi .= $where;

        }
        $sql = "SELECT * FROM t_section where  ".$kondisi." ORDER BY CODE";

        $query = $CI->db->query($sql);
        if (!empty($query)) {
            $result = $query->result();
        } else {
            $result = 0;
        }
        return $result;
    }
}

if (!function_exists('get_t_user')) {
    function get_t_user($where = null)
    {
        $CI = &get_instance();

        $kondisi = "status = '1' ";
        if($where){
            $kondisi .= $where;
        }
        $sql = "SELECT username, nama_lengkap  FROM t_user where  ".$kondisi." ORDER BY username";

        $query = $CI->db->query($sql);
        if (!empty($query)) {
            $result = $query->result();
        } else {
            $result = 0;
        }
        return $result;
    }
}

if (!function_exists('get_t_tipe_user')) {
    function get_t_tipe_user($where = null)
    {
        $CI = &get_instance();

        $kondisi = "status = '1' ";
        if($where){
            $kondisi .= $where;

        }
        $sql = "SELECT * FROM t_tipe_user where  ".$kondisi." ORDER BY tipe";

        $query = $CI->db->query($sql);
        if (!empty($query)) {
            $result = $query->result();
        } else {
            $result = 0;
        }
        return $result;
    }
}

if (!function_exists('get_t_dept')) {
    function get_t_dept()
    {
        $CI = &get_instance();
        $sql = "SELECT * FROM t_dept where  STATUS = '1' ORDER BY CODE";

        $query = $CI->db->query($sql);
        if (!empty($query)) {
            $result = $query->result();
        } else {
            $result = 0;
        }
        return $result;
    }
}

if (!function_exists('get_t_unit_to_bc_unit')) {
    function get_t_unit_to_bc_unit($where = null)
    {
        $kondisi = '';
        if($where != null){
            $kondisi = $where;
        }
        $CI = &get_instance();
        $sql = "SELECT * FROM t_unit_to_bc_unit where  STATUS = '1' ".$kondisi." ORDER BY UNIT";

        $query = $CI->db->query($sql);
        if (!empty($query)) {
            $result = $query->result();
        } else {
            $result = 0;
        }
        return $result;
    }
}

if (!function_exists('get_t_gl_account')) {
    function get_t_gl_account()
    {
        $CI = &get_instance();
        $sql = "SELECT * FROM t_group_item_ap where  STATUS = '1' GROUP BY GL_ACC_CODE ORDER BY GL_ACC_CODE";

        $query = $CI->db->query($sql);
        if (!empty($query)) {
            $result = $query->result();
        } else {
            $result = 0;
        }
        return $result;
    }
}

if (!function_exists('get_t_group_item_ap')) {
    function get_t_group_item_ap()
    {
        $CI = &get_instance();
        $sql = "SELECT * FROM t_group_item_ap where  STATUS = '1' ORDER BY GROUP_ID";

        $query = $CI->db->query($sql);
        if (!empty($query)) {
            $result = $query->result();
        } else {
            $result = 0;
        }
        return $result;
    }
}

if (!function_exists('get_t_template_label')) {
    function get_t_template_label()
    {
        $CI = &get_instance();
        $sql = "SELECT * FROM t_template_label where  STATUS = '1' ORDER BY CODE";

        $query = $CI->db->query($sql);
        if (!empty($query)) {
            $result = $query->result();
        } else {
            $result = 0;
        }
        return $result;
    }
}

if (!function_exists('get_t_jabatan')) {
    function get_t_jabatan()
    {
        $CI = &get_instance();
        $sql = "SELECT * FROM t_jabatan where  STATUS = '1' ORDER BY GOLONGAN DESC";

        $query = $CI->db->query($sql);
        if (!empty($query)) {
            $result = $query->result();
        } else {
            $result = 0;
        }
        return $result;
    }
}

if (!function_exists('get_t_group_process')) {
    function get_t_group_process()
    {
        $CI = &get_instance();
        $sql = "SELECT * FROM t_group_process where  STATUS = '1' ORDER BY DL_CODE, SEQ";

        $query = $CI->db->query($sql);
        if (!empty($query)) {
            $result = $query->result();
        } else {
            $result = 0;
        }
        return $result;
    }
}

if (!function_exists('get_t_group_item')) {
    function get_t_group_item()
    {
        $CI = &get_instance();
        $sql = "SELECT * FROM t_group_item where  STATUS = '1' ORDER BY GROUP_1";

        $query = $CI->db->query($sql);
        if (!empty($query)) {
            $result = $query->result();
        } else {
            $result = 0;
        }
        return $result;
    }
}

if (!function_exists('csvToJson')) {
    function csvToJson(string $fname): array
    {
        if (!($fp = fopen($fname, 'r'))) {
            die("Can't open file...");
        }

        //read csv headers
        $key = fgetcsv($fp, 1024, ",");

        // parse csv rows into array
        $json = array();
        while ($row = fgetcsv($fp, 1024, ",")) {
            $json[] = array_combine($key, $row);
        }

        // release file handle
        fclose($fp);

        // encode array to json
        return $json;
    }
}

if (!function_exists('clean_html_inject')) {
    function clean_html_inject($string = null)
    {
        $balikan = str_replace("'", "", htmlspecialchars($string, ENT_QUOTES));
        return $balikan;
    }
}


if (!function_exists('hash_b')) {
    function hash_b($password = null)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }
}

if (!function_exists('en_crypt')) {
    function en_crypt(string $string): string
    {
        /*
        * read security.ini file & get encryption_key | iv | encryption_mechanism value for generating encryption code
         Develop by : Fazri Ramadhan
        Email : fazri.rramadhanh@gmail.com
        */
        $security       = parse_ini_file("security.ini");
        $secret_key     = $security["encryption_key"];
        $secret_iv      = $security["iv"];
        $encrypt_method = $security["encryption_mechanism"];

        // hash
        $key    = hash("sha256", $secret_key);

        // iv – encrypt method AES-256-CBC expects 16 bytes – else you will get a warning
        $iv     = substr(hash("sha256", $secret_iv), 0, 16);

        //do the encryption given text/string/number
        $result = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        return base64_encode($result);
    }
}


if (!function_exists('de_crypt')) {
    function de_crypt(string $string)
    {

        $output = false;
        /*
        * read security.ini file & get encryption_key | iv | encryption_mechanism value for generating encryption code
         Develop by : Fazri Ramadhan
        Email : fazri.rramadhanh@gmail.com
        */

        $security       = parse_ini_file("security.ini");
        $secret_key     = $security["encryption_key"];
        $secret_iv      = $security["iv"];
        $encrypt_method = $security["encryption_mechanism"];

        // hash
        $key    = hash("sha256", $secret_key);

        // iv – encrypt method AES-256-CBC expects 16 bytes – else you will get a warning
        $iv = substr(hash("sha256", $secret_iv), 0, 16);

        //do the decryption given text/string/number

        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        return $output;
    }
}

if (!function_exists('parseDecimal')) {
    function parseDecimal($string = null){
        $result = null;
        if($string){
            $result = floatval(str_replace(',','.',$string));
        }

        return $result;
    }
}

if (!function_exists('decimal')) {
    function decimal(float $value, int $many): string {
        return number_format($value, $many);
    }
}

function searchForId($id, $array, $name_field, $return_field) {
    foreach ($array as $key => $val) {
        if ($val[$name_field] === $id) {
            return $val[$return_field];
        }
    }
    return null;
 }
 
if (!function_exists('arr_to_string')) {
    function arr_to_string($arr = null)
    {
        $balikan = '';
        if($arr){
            for ($i=0; $i < count($arr); $i++) { 
                $balikan .= "'".$arr[$i]."'";
                if($i < count($arr) -1){
                    $balikan .= ', ';                
                }
            }
        }

        return $balikan;
    }

}

if (!function_exists('arr_to_string_decrypt')) {
    function arr_to_string_decrypt($arr = null)
    {
        $balikan = '';
        if($arr){
            for ($i=0; $i < count($arr); $i++) { 
                $balikan .= "'".de_crypt($arr[$i])."'";
                if($i < count($arr) -1){
                    $balikan .= ', ';                
                }
            }
        }

        return $balikan;
    }

}

if (!function_exists('arr_to_string_not_petik')) {
    function arr_to_string_not_petik($arr = null, $tanda_baca = null)
    {
        $tanda = ', ';
        if($tanda_baca != null){
            $tanda = $tanda_baca;
        }
        $balikan = '';
        if($arr){
            for ($i=0; $i < count($arr); $i++) { 
                $balikan .= "".$arr[$i]."";
                if($i < count($arr) -1){
                    $balikan .= $tanda.'';                
                }
            }
        }

        return $balikan;
    }

}


if (!function_exists('encrypt_ecs')) {
    function encrypt_ecs($param = null)
    {
        $encrypted_data = null;
        if ($param) {
            $randInt = rand(100, 999);

            $length = 7;
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }

            //setiap aplikasi mempunya passphrase masing-masing
            $passphrase = '9e7be75bf21b706c15f6bb8cd24d78a1';

            $data_api      = [
                'nip' => $param['nip'],
                'pass'  => $param['pass'],
                'nomor_dokumen' => $param['nomor_dokumen'],
                'jenis_dokumen' => $param['jenis_dokumen'],

                // invisible dan visible
                'tampilan' => 'visible',

                // case visible penambahan parameter
                'hastag_sign' => '#',
                'linkQR' => $param['linkQR'],
            ];

            //proses bundel data menjadi encrypt
            $json_encode = json_encode(($data_api), true);
            $data = $json_encode;

            $secret_key = $passphrase;

            $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
            $encrypted_64 = openssl_encrypt($data, 'aes-256-cbc', $secret_key, 0, $iv);

            $iv_64 = base64_encode($iv);

            $json = new stdClass();
            $json->iv = $iv_64;
            $json->data = $encrypted_64;

            $data_code = base64_encode(json_encode($json));
            //end proses bundel data menjadi encrypt

            //data encrypt ditambah random 3 digit integer
            $encrypted_data = $randInt . $randomString . $data_code;
        }
        return $encrypted_data;
    }
}

/**
 * Output JSON and terminate script.
 * @param mixed $param Data to be JSON encoded
 */
function jco($param)
{
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($param);
    exit;
}



function parse_day_english_to_indo($day)
{
    $day = strtolower($day);
	switch ($day) {
		case "mon":
			$day = "SENIN";
			break;
		case "tue":
			$day = "SELASA";
			break;
		case "wed":
			$day = "RABU";
			break;
		case "thu":
			$day = "KAMIS";
			break;
		case "fri":
			$day = "JUMAT";
			break;
		case "sat":
			$day = "SABTU";
			break;
		case "sun":
			$day = "AHAD";
			break;
		default:
			$day = null;
			break;
	}
	return $day;
}



function parse_month($bulan)
{
	switch ($bulan) {
		case 1:
			$bulan = "01";
			break;
		case 2:
			$bulan = "02";
			break;
		case 3:
			$bulan = "03";
			break;
		case 4:
			$bulan = "04";
			break;
		case 5:
			$bulan = "05";
			break;
		case 6:
			$bulan = "06";
			break;
		case 7:
			$bulan = "07";
			break;
		case 8:
			$bulan = "08";
			break;
		case 9:
			$bulan = "09";
			break;
		case 10:
			$bulan = "10";
			break;
		case 11:
			$bulan = "11";
			break;
		case 12:
			$bulan = "12";
			break;
		default:
			$bulan = '0';
			break;
	}
	return $bulan;
}

function parse_month_to_roman($bulan)
{
	switch ($bulan) {
		case 1:
			$bulan = "I";
			break;
		case 2:
			$bulan = "II";
			break;
		case 3:
			$bulan = "III";
			break;
		case 4:
			$bulan = "IV";
			break;
		case 5:
			$bulan = "V";
			break;
		case 6:
			$bulan = "VI";
			break;
		case 7:
			$bulan = "VII";
			break;
		case 8:
			$bulan = "VIII";
			break;
		case 9:
			$bulan = "IX";
			break;
		case 10:
			$bulan = "X";
			break;
		case 11:
			$bulan = "XI";
			break;
		case 12:
			$bulan = "XII";
			break;
		default:
			$bulan = '0';
			break;
	}
	return $bulan;
}

if (!function_exists('cek_valid_pdf')) {
    function cek_valid_pdf($params_file)
    {
        $dir_file = $params_file;
        $file = file($dir_file);
        $endfile = trim($file[count($file) - 1]);
    
        $n = "%%EOF";
    
        if ($endfile === $n) {
            return true;
        } else {
            return false;
        }
    }
}

//FUNGSI FORMAT TANGGAL 1 Januari 2020
//output tanggal_lengkap(dd/MM/yyy hh:mm:ss ATAU dd/MM/yyy) 
if (!function_exists('tanggal')) {
    function tanggal($tanggal)
    {
        $a = explode('-', $tanggal);
        $tanggal = (int)$a['2'] . " " . bulan($a['1']) . " " . $a['0'];
        return $tanggal;
    }
}

//FUNGSI FORMAT TANGGAL 1 Januari 2020 22-10-59
//output tanggal_lengkap(dd/MM/yyy hh:mm:ss)
if (!function_exists('tanggal_lengkap')) {
    function tanggal_lengkap($tanggal)
    {
        $tgl = str_replace(' ', '-', str_replace(':', '-', str_replace(':', '-', $tanggal)));
        $a = explode('-', $tgl);
        $fix_tgl = (int)$a['2'] . " " . bulan($a['1']) . ", " . $a['0'] . " " . $a['3'] . ":" . $a['4'] . ":" . $a['5'] . " WIB";
        return $fix_tgl;
    }
}
if (!function_exists('namaBulan')) {
    function namaBulan($bulan) {
        // Array yang berisi nama bulan

        $bulan = (int) $bulan;
        $bulanArray = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];

        // Cek apakah inputan bulan valid
        if ($bulan >= 1 && $bulan <= 12) {
            return $bulanArray[$bulan];
        } else {
            return 'Bulan tidak valid';  // Jika inputan tidak valid
        }
    }
}

if (!function_exists('angkaBulan')) {
    function angkaBulan($namaBulan) {
        // Normalisasi input (hilangkan kapitalisasi, spasi, dll.)
        $namaBulan = strtolower(trim($namaBulan));

        // Array mapping nama bulan ke angka
        $bulanArray = [
            'januari' => '01',
            'februari' => '02',
            'maret' => '03',
            'april' => '04',
            'mei' => '05',
            'juni' => '06',
            'juli' => '07',
            'agustus' => '08',
            'september' => '09',
            'oktober' => '10',
            'november' => '11',
            'desember' => '12'
        ];

        // Cek apakah nama bulan valid
        if (array_key_exists($namaBulan, $bulanArray)) {
            return $bulanArray[$namaBulan];
        } else {
            return '00'; // Atau bisa juga `null` atau `false` tergantung kebutuhan
        }
    }
}

if (!function_exists('convertion_between_date')) {
    function convertion_between_date($date, $column_name){
        $return = null;
        if($date != null){
            $date = explode('-', $date);
            $awal = str_replace(' ', '', $date[0]);
            $akhir = str_replace(' ', '', $date[1]);
    
            $awal = explode("/", $awal);
            $awal = $awal[2]."-".$awal[0]."-".$awal[1];
    
            $akhir = explode("/", $akhir);
            $akhir = $akhir[2]."-".$akhir[0]."-".$akhir[1];
    
            $return = "($column_name BETWEEN '$awal' AND '$akhir')";
        }

        return $return;
    }
}

if (!function_exists('greetings')) {
    function greetings(){
        date_default_timezone_set("Asia/Jakarta");  
        $h = date('G');

        $greet = "Welcome.";
        if($h>=5 && $h<11)
        {
            $greet = "Selamat Pagi.";
        }
        else if($h>=11 && $h<=15)
        {
            $greet = "Selamat Siang.";
        }
        else if($h>=16 && $h<=19){
            $greet = "Selamat Sore.";
        }
        else if($h>=20 && $h<=23){
            $greet = "Selamat Malam.";
        }

        // $greet = 'Selamat Datang Kembali, ';

        return $greet;
        
    }
}


// CSRF GET ================ BEGIN
function get_csrf()
{	
	$CI = &get_instance();
	$csrf = array(
		'name' => $CI->security->get_csrf_token_name(),
		'hash' => $CI->security->get_csrf_hash()
	);
	return $csrf;
}

function csrf_hash()
{
	$CI = &get_instance();
    $csrf = $CI->security->get_csrf_hash();

    return $csrf;
}
function csrf_token()
{
	$CI = &get_instance();
    $csrf = $CI->security->get_csrf_token_name();

    return $csrf;

}

function recursiveCopy($src, $dst) {
    // Membuat folder tujuan jika belum ada
    if (!is_dir($dst)) {
        mkdir($dst);
    }

    // Membuka folder sumber
    $dir = opendir($src);

    // Meloopi isi folder sumber
    while (false !== ($file = readdir($dir))) {
        echo "-Copy file ...\n";
        if (($file != '.') && ($file != '..')) {
            if (is_dir($src . '/' . $file)) {
                // Jika isi adalah folder, panggil fungsi rekursif
                recursiveCopy($src . '/' . $file, $dst . '/' . $file);
            } else {
                // Jika isi adalah file, copy file
                copy($src . '/' . $file, $dst . '/' . $file);
            }
        }
    }

    // Menutup folder sumber
    closedir($dir);
}

function deleteFolder($folderPath) {
    if (!file_exists($folderPath)) {
        return true; // Folder tidak ada, tidak ada yang harus dihapus
    }
    
    // Bersihkan isi folder
    $files = array_diff(scandir($folderPath), array('.', '..'));
    foreach ($files as $file) {
        $filePath = $folderPath . DIRECTORY_SEPARATOR . $file;
        if (is_dir($filePath)) {
            // Jika itu adalah subfolder, hapus rekursif
            deleteFolder($filePath);
        } else {
            // Jika itu adalah file, hapus file
            unlink($filePath);
        }
    }
    
    // Hapus folder itu sendiri
    return rmdir($folderPath);
}

function normalize_emails($emails)
{
    if (empty($emails)) return [];

    if (!is_array($emails)) {
        $emails = preg_split('/[,;]/', $emails);
    }

    $emails = array_map('trim', $emails);

    // filter valid email
    $emails = array_filter($emails, function($email){
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    });

    return $emails;
}

function generate_html_send_email($alias_from = null, $to = null, $from=null, $subject = null, $message = null, $link = null, $attachments = [], $other_apps = null, $alias_sender = null, $versi_apps = null, $cc = null, $bcc = null)
{
    $versi_apps_text = VERSI_APPS;
    if($versi_apps != null){
        $versi_apps_text = $versi_apps;
    }
    $text_link = '';
    if($link != null) {
        $text_link .= '<p style="margin: 0 0 25px;">Klik tautan dibawah ini untuk melihat detailnya : </p>';
        $text_link .= '<div style="text-align: center; margin: 30px 0;">';
        $text_link .= '<a href="'.$link.'" style="display: inline-block; padding: 14px 32px; background-color: #D72C2C; color: white; text-decoration: none; border-radius: 8px; font-size: 16px; font-weight: 600; transition: all 0.3s ease;">&nbsp;&nbsp;🔗 Lihat Detail&nbsp;&nbsp;</a>';
        $text_link .= '<p style="margin-top: 12px; font-size: 14px; color: #666;">Atau salin tautan ini: <br><span style="word-break: break-all;">'.$link.'</span></p>';
        $text_link .= '</div>';
    }

    $default_sender = 'IT Section';
    if($alias_sender != null){
        $default_sender = $alias_sender;
    }

    $apps = APP_TITLE;

    if($other_apps != null){
        $apps = $other_apps;
    }
    
    // <p style="margin: 0 0 15px;">Butuh bantuan lebih lanjut?</p>
    // <a href="mailto:support@perusahaan.com" style="color: #D72C2C; text-decoration: none; font-weight: 500;">📩 Hubungi Tim Support</a>
    
    $html_mail = '<!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Notifikasi Sistem</title>
        <style>
            @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap");
            body { font-family: "Poppins", Tahoma, Geneva, Verdana, sans-serif; background-color: #f8fafc; margin: 0; padding: 0; color: #334155; }
            .button:hover { background-color: #b91c1c !important; transform: translateY(-2px); box-shadow: 0 6px 12px rgba(215, 44, 44, 0.2); }
        </style>
    </head>
    <body style="font-family: "Poppins", Tahoma, Geneva, Verdana, sans-serif; background-color: #f8fafc; margin: 0; padding: 0; color: #334155;">
        <div style="max-width: 600px; margin: 40px auto; background-color: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);">
            <!-- Header -->
            <div style="background: linear-gradient(135deg, #D72C2C 0%, #b91c1c 100%); text-align: center; padding: 40px 0;">
                <h1 style="margin: 0; font-size: 24px; font-weight: 600; color: white;">'.$apps.' Notification</h1>
                <p style="margin: 8px 0 0; font-size: 14px; color: rgba(255,255,255,0.8);">'.$apps.' NOTIFICATION</p>
            </div>
            
            <!-- Content -->
            <div style="padding: 40px;">
                <div style="font-size: 16px; line-height: 1.7;">
                    <br>
                    <p style="margin: 0 0 25px;">Halo, '.greetings().' 👋</p>
                    
                    <div style="background-color: #f8fafc; padding: 20px; border-radius: 8px; border-left: 4px solid #D72C2C; margin-bottom: 30px;">
                        <p style="margin: 0; font-size: 15px; color: #475569;">'.$message.'</p>
                    </div>
                    
                    '.$text_link.'
                    
                    <div style="margin-top: 40px; padding-top: 25px; border-top: 1px solid #e2e8f0;">
                        <p style="margin: 25px 0 0; font-size: 14px; color: #64748b;">Salam hangat,<br><strong>'.$default_sender.'</strong></p>
                    </div>
                </div>
            </div>
            <br>
            <br>
            
            <!-- Footer -->
            <div style="background-color: #f1f5f9; padding: 20px; text-align: center; font-size: 12px; color: #64748b;">
                <p style="margin: 0 0 10px;"><i>Pesan ini dikirim secara otomatis oleh sistem. Mohon tidak membalas langsung ke email ini.</i></p>
                <p style="margin: 0;">&copy; '.YEAR_CREATED.' - '.date('Y').' '.$apps.' | '.APP_OWNER.' ('.$versi_apps_text.')</p>
            </div>
        </div>
    </body>
    </html>';
    // GENERATE HTML MAIL
    
    // FUNGSI SEND EMAIL
    $CI = &get_instance();
    $CI->load->library('email');
    $CI->load->helper(array('url', 'file'));

    $from_default = 'admin@nt-pistonring.co.id';
    if($from!=null){
        $from_default = $from;
    }

    // Mengonfigurasi email
    $config = [
        'protocol'    => 'smtp',
        'smtp_host'   => SMTP_HOST, // IP MDaemon kamu
        'smtp_port'   => 587, // atau 25 jika tidak menggunakan TLS
        'smtp_user'   => $from_default,
        'smtp_pass'   => SMTP_PASS, // Ganti dengan password asli
        'smtp_crypto' => '',
        'mailtype'    => 'html',
        'charset'     => 'utf-8',
        'wordwrap'    => true,
        'newline'     => "\r\n",
        'validate'    => true,
        'crlf'        => "\r\n",
        'encoding'    => "base64",
    ];
    
    $CI->email->initialize($config);
    $CI->email->from($from_default, $alias_from);

    $to  = normalize_emails($to);
    $cc  = normalize_emails($cc);
    $bcc = normalize_emails($bcc);

    $CI->email->to($to);

    if (!empty($cc)) {
        $CI->email->cc($cc);
    }

    if (!empty($bcc)) {
        $CI->email->bcc($bcc);
    }
    $CI->email->subject($subject);
    $CI->email->message($html_mail);


    // Advanced attachment processing
    if (!empty($attachments)) {
        foreach ($attachments as $attachment) {
            try {
                // 1. Validate input
                if (empty($attachment['path']) || empty($attachment['name'])) {
                    throw new Exception("Missing attachment path or name");
                }

                // 2. Resolve file path
                $file_path = $attachment['path'];
                if (!file_exists($file_path) && strpos($file_path, 'uploads/') === 0) {
                    $file_path = FCPATH . $file_path;
                }

                // 3. Verify file
                if (!is_readable($file_path)) {
                    throw new Exception("File not readable: {$file_path}");
                }

                // 4. Get accurate MIME type
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                $mime_type = finfo_file($finfo, $file_path);
                finfo_close($finfo);

                // 5. Validate file headers
                $file_ext = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
                $header = bin2hex(file_get_contents($file_path, false, null, 0, 4));
                
                $valid_signatures = [
                    'pdf'  => '25504446',
                    'doc'  => 'd0cf11e0',
                    'docx' => '504b0304',
                    'xls'  => 'd0cf11e0',
                    'xlsx' => '504b0304',
                    'jpg'  => 'ffd8ffe0',
                    'jpeg' => 'ffd8ffe0',
                    'png'  => '89504e47'
                ];

                if (!isset($valid_signatures[$file_ext]) || strpos($header, $valid_signatures[$file_ext]) !== 0) {
                    throw new Exception("Invalid file signature for .{$file_ext}");
                }

                // 6. Force correct MIME type for Office documents
                $mime_overrides = [
                    'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                    'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                ];
                
                $final_mime = $mime_overrides[$file_ext] ?? $mime_type;

                // 7. Add attachment with proper encoding
                $CI->email->attach(
                    $file_path,
                    [
                        'disposition' => 'attachment',
                        'file_name'   => $attachment['name'],
                        'mime'        => $final_mime,
                        'encoding'    => 'base64',
                        'newline'     => "\r\n"
                    ]
                );

            } catch (Exception $e) {
                log_message('error', "Attachment failed: {$e->getMessage()}");
                continue;
            }
        }
    }

    if(@$CI->email->send()){
    
        $CI->email->clear(true);
        return true;
    }
    else{
    
        if ($debug = $CI->email->print_debugger(['headers', 'subject', 'body'])) {
            log_message('error', "Email debug: {$debug}");
            
            // Additional attachment debug
            if (!empty($attachments)) {
                $att_debug = "Attachment Status:\n";
                foreach ($attachments as $att) {
                    $path = strpos($att['path'], 'uploads/') === 0 ? FCPATH . $att['path'] : $att['path'];
                    $exists = file_exists($path) ? 'Exists' : 'Missing';
                    $readable = is_readable($path) ? 'Readable' : 'Unreadable';
                    $att_debug .= "- {$att['name']}: {$exists}, {$readable}\n";
                }
                log_message('debug', $att_debug);
            }
            
            $CI->email->clear(true);
            return false;
        }
    }
}

function auto_generate_code($table_name = null, $where = null, $code = null, $other_code = null)
    {
        $return = '';
        $CI = &get_instance();
        if($table_name != null && $where != null){
            $sql = $CI->DataHandle->getAllWhere($table_name, 'id', $where);
            $total_row = $sql->num_rows()+1; 

            // $no = sprintf('%03d',$total_row)."/".$report_type."/".date('m/Y');

            $other = '';
            if($other_code != null){
                $other = $other_code.'-';
            }
            $no = $code.'-'.$other.''.date('Y-m-').sprintf('%03d',$total_row);
            return $no;
        }

        return $return;
    }
    
    function auto_generate_code_ntrigb($table_name = null, $where = null, $code = null, $other_code = null)
    {
        $return = '';
        $CI = &get_instance();
        if($table_name != null && $where != null){
            $sql = $CI->DataHandle_ntrigb->getAllWhere($table_name, 'id', $where);
            $total_row = $sql->num_rows()+1; 

            // $no = sprintf('%03d',$total_row)."/".$report_type."/".date('m/Y');

            $other = '';
            if($other_code != null){
                $other = $other_code.'-';
            }
            $no = $code.'-'.$other.''.date('Y-m-').sprintf('%03d',$total_row);
            return $no;
        }

        return $return;
    }
    
    function diffMinutes($start, $end)
    {
        if (empty($start) || empty($end)) {
            return 0;
        }

        try {
            $startDT = new DateTime($start);
            $endDT   = new DateTime($end);
        } catch (Exception $e) {
            return 0;
        }

        $diff = $startDT->diff($endDT);
        $seconds = ($diff->days * 86400) + ($diff->h * 3600) + ($diff->i * 60) + $diff->s;

        return $seconds / 60;
    }

// CSRF GET ================ END


