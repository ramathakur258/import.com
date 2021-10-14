<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->helper(["form","url"]);
		$this->load->model(["Data_model"]);
		$this->load->library('csvimport');
		
    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
         $this->data["open"]=$this->Data_model->Getopen();
		 $this->data["close"]=$this->Data_model->Getclose();
		//echo "<pre>"; print_r( $this->data["open"]);die;
		$this->load->view("index",$this->data);
	}


	public function importFile()
	{
  
		$this->load->view("import");
	}

	// public function import(){

	// 	if (isset($_POST["submit"])) {

             
    //         //$name = $_FILES['file']['name'];
    //     $file = $_FILES['file']['tmp_name'];
	// 	  //echo "<pre>"; print_r( $this->data["open"]);die;
    //         if ($_FILES["file"]["size"] > 0) {
                
	// 			$handle = fopen($file, "r");
          
                
    //             while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
                    
    //                 $market_id = "";
    //                 if (isset($column[0])) {
    //                     $market_id = mysqli_real_escape_string($conn, $column[0]);
    //                 }
    //                 $open_result_digit = "";
    //                 if (isset($column[1])) {
    //                     $userName = mysqli_real_escape_string($conn, $column[1]);
    //                 }
    //                 $open_digit_sum = "";
    //                 if (isset($column[2])) {
    //                     $password = mysqli_real_escape_string($conn, $column[2]);
    //                 }
    //                 $open_result_status = "";
    //                 if (isset($column[3])) {
    //                     $firstName = mysqli_real_escape_string($conn, $column[3]);
    //                 }
    //                 $close_result_digit = "";
    //                 if (isset($column[4])) {
    //                     $lastName = mysqli_real_escape_string($conn, $column[4]);
    //                 }
    //                 $close_digit_sum = "";
    //                 if (isset($column[5])) {
    //                     $lastName = mysqli_real_escape_string($conn, $column[5]);
    //                 }
    //                 $close_result_status = "";
    //                 if (isset($column[6])) {
    //                     $lastName = mysqli_real_escape_string($conn, $column[6]);
    //                 }
    //                 $date = "";
    //                 if (isset($column[7])) {
    //                     $lastName = mysqli_real_escape_string($conn, $column[7]);
    //                 }
    //                 $created_at = "";
    //                 if (isset($column[8])) {
    //                     $lastName = mysqli_real_escape_string($conn, $column[8]);
    //                 }
    //                 $updated_at = "";
    //                 if (isset($column[9])) {
    //                     $lastName = mysqli_real_escape_string($conn, $column[9]);
    //                 }
                    

                    
    //                 $sqlInsert = "INSERT into results (market_id,open_result_digit,open_digit_sum,open_result_status,close_result_digit,close_digit_sum,close_result_status,date,created_at,updated_at)
    //                        values (?,?,?,?,?)";
    //                 $paramType = "issss";
    //                 $paramArray = array(
    //                     $market_id,
    //                     $open_result_digit,
    //                     $open_digit_sum,
    //                     $open_result_status,
    //                     $close_result_digit,
    //                     $close_digit_sum,
    //                     $close_result_status,
    //                     $date,
    //                     $created_at,
    //                     $updated_at



    //                 );
    //                 $insertId = $db->insert($sqlInsert, $paramType, $paramArray);
                    
    //                 if (! empty($insertId)) {
    //                     $type = "success";
    //                     $message = "CSV Data Imported into the Database";
    //                 } else {
    //                     $type = "error";
    //                     $message = "Problem in Importing CSV Data";
    //                 }
    //             }
    //         }
    //     }
       
        
    
	// }


// function uploaddata()
//     {

// 		if (isset($_POST["submit"])) {
//         $count=0;
//         $fp = fopen($_FILES['file']['tmp_name'],'r') or die("can't open file");
//         echo "<pre>"; print_r( $fp );die;
// 		while($csv_line = fgetcsv($fp,1024))
//         {
//             $count++;
//             if($count == 1)
//             {
//                 continue;
//             }//keep this if condition if you want to remove the first row
//             for($i = 0, $j = count($csv_line); $i < $j; $i++)
//             {
//                 $insert_csv = array();
//                 $insert_csv['market_id'] = $csv_line[0];//remove if you want to have primary key,
//                 $insert_csv['open_result_digit'] = $csv_line[1];
//                 $insert_csv['open_digit_sum'] = $csv_line[2];
// 				$insert_csv['open_result_status'] = $csv_line[3];//remove if you want to have primary key,
//                 $insert_csv['close_result_digit'] = $csv_line[4];
//                 $insert_csv['close_digit_sum'] = $csv_line[5];
// 				$insert_csv['close_result_status'] = $csv_line[6];//remove if you want to have primary key,
//                 $insert_csv['date'] = $csv_line[7];
//                 $insert_csv['created_at'] = $csv_line[8];
// 				$insert_csv['updated_at'] = $csv_line[9];//remove if you want to have primary key,
               
//  //                     $market_id,
//     //                     $open_result_digit,
//     //                     $open_digit_sum,
//     //                     $open_result_status,
//     //                     $close_result_digit,
//     //                     $close_digit_sum,
//     //                     $close_result_status,
//     //                     $date,
//     //                     $created_at,
//     //                     $updated_at
//             }
//             $i++;
//             $data = array(
//                 'market_id' =>   $insert_csv['market_id'] ,
//                 'open_result_digit' =>    $insert_csv['open_result_digit'] ,
//                 'open_digit_sum' =>  $insert_csv['open_digit_sum'],
// 				'open_result_status' =>   $insert_csv['open_result_status'] ,
//                 'close_result_digit' =>    $insert_csv['close_result_digit'] ,
//                 'close_digit_sum' =>    $insert_csv['close_digit_sum'],
// 				'close_result_status' =>   	$insert_csv['close_result_status'] ,
//                 'date' =>       $insert_csv['date'] ,
//                 'created_at' =>   $insert_csv['created_at'] ,
// 				'updated_at' =>   	$insert_csv['updated_at'] 
                
//                );
//             $data['crane_features']=$this->db->insert('result', $data);
//         }
// 	}
//         fclose($fp) or die("can't close file");
//         $data['success']="success";
//         return $data;
//     }


function importcsv() {
	//$data['addressbook'] = $this->Data_model->get_addressbook();
	$data['error'] = '';    //initialize image upload error array to empty

	$config['upload_path'] = './uploads/';
	$config['allowed_types'] = 'csv';
	//$config['max_size'] = '1000';

	$this->load->library('upload', $config);


	// If upload failed, display error
	if ($this->upload->do_upload()) {
		$data['error'] = $this->upload->display_errors();
		print_r(1);die;
		$this->load->view('import', $data);
		//print_r(1);die;
	} else {
		//print_r(1);die;
		$file_data = $this->upload->data();
		$file_path =  './uploads/'.$file_data['file_name'];

		if ($this->csvimport->get_array($file_path)) {
			$csv_array = $this->csvimport->get_array($file_path);
			foreach ($csv_array as $insert_csv) {
				$insert_data = array(
				
					'market_id' =>   $insert_csv['market_id'] ,
					'open_result_digit' =>    $insert_csv['open_result_digit'] ,
					'open_digit_sum' =>  $insert_csv['open_digit_sum'],
					'open_result_status' =>   $insert_csv['open_result_status'] ,
					'close_result_digit' =>    $insert_csv['close_result_digit'] ,
					'close_digit_sum' =>    $insert_csv['close_digit_sum'],
					'close_result_status' =>   	$insert_csv['close_result_status'] ,
					'date' =>       $insert_csv['date'] ,
					'created_at' =>   $insert_csv['created_at'] ,
					'updated_at' =>   	$insert_csv['updated_at'] 
);
				$this->Data_model->insert($insert_data);
			}
			$this->session->set_flashdata('success', 'Csv Data Imported Succesfully');
			//redirect(base_url().'csv');
			//echo "<pre>"; print_r($insert_data);
            print_r(2);die;
		} else 
			$data['error'] = "Error occured";
			$this->load->view('import', $data);
		}

	} 
}
