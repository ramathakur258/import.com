<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Csv_import extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(["form","url"]);
		$this->load->model('Data_model');
		$this->load->library('csvimport');
	}
										

	function index()
	{
		$this->load->view('import');
	}

	function load_data()
	{
		$result = $this->Data_model->select();
		$output = '
		 <h3 align="center">Imported User Details from CSV File</h3>
        <div class="table-responsive">
        	<table class="table table-bordered table-striped">
        		<tr>
        		
                    <th>MarketId</th>
        			<th>open_result_digit</th>
        			<th>open_digit_sum</th>
        			<th>open_result_status</th>
        			<th>close_result_digit</th>
					<th>close_digit_sum</th>
        			<th>close_result_status</th>
        			<th>date</th>
                    <th>created_at</th>
        			<th>updated_at</th>
        		</tr>
		';
		$count = 0;
		if($result->num_rows() > 0)
		{
			foreach($result->result() as $row)
			{
				$count = $count + 1;
				$output .= '
				<tr>
                    
                    <td>'.$row->market_id.'</td>
					<td>'.$row->open_result_digit.'</td>
					<td>'.$row->open_digit_sum.'</td>
					<td>'.$row->open_result_status.'</td>
					<td>'.$row->close_result_digit.'</td>
					<td>'.$row->close_digit_sum.'</td>
					<td>'.$row->close_result_status.'</td>
					<td>'.$row->date.'</td>
                    <td>'.$row->created_at.'</td>
                    <td>'.$row->updated_at.'</td>
				</tr>
				';
			}
		}
		else
		{
			$output .= '
			<tr>
	    		<td colspan="5" align="center">Data not Available</td>
	    	</tr>
			';
		}
		$output .= '</table></div>';
		echo $output;
	}

	function import()
	{
        //echo "Hello";die;
        //$filepath = '/var/www/html/kalyan_day_result.csv';
		$file_data = $this->csvimport->get_array($_FILES["csv_file"]["tmp_name"]);
        //echo json_encode( $file_data );
       // echo "<pre>";print_r($file_data);die;
        foreach($file_data as $row)
		{
            //print_r($row);die;
           // $data=[];
			$data= array(
				    'market_id' =>   $row['market_id'] ,
                    'open_result_digit' =>    $row['open_result_digit'] ,
					'open_digit_sum' =>  $row['open_digit_sum'],
					'open_result_status' =>   $row['open_result_status'] ,
					'close_result_digit' =>    $row['close_result_digit'] ,
					'close_digit_sum' =>    $row['close_digit_sum'],
					'close_result_status' =>   	$row['close_result_status'] ,
					'date' =>       $row['date'] ,
                  
			);
		}
        //echo json_encode( $data );
		$this->Data_model->insert($data);
		
	}
	

//     function import()
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
//                 // $insert_csv['created_at'] = $csv_line[8];
// 				// $insert_csv['updated_at'] = $csv_line[9];//remove if you want to have primary key,
               
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

		
}
