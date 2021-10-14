<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require_once('PHPExcel.php');
class Csv_import extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('csv_import_model');
		$this->load->library('excel');
	}

	function index()
	{
		$this->load->view('csv_import');
	}

	function load_data()
	{
		$result = $this->csv_import_model->select();
		$output = '
		 <h3 align="center">Imported User Details  File Total Data - '.$result->num_rows().'</h3>
        <div class="table-responsive">
        	<table class="table table-bordered table-striped">
        		<tr>
        			<th>Sr. No</th>
        			<th>Phone</th>
        			
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
					<td>'.$count.'</td>
					<td>'.$row->number.'</td>
					
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
		$path = $_FILES["csv_file"]["tmp_name"];
		$object = PHPExcel_IOFactory::load($path);
		foreach($object->getWorksheetIterator() as $worksheet)
		{
		 $highestRow = $worksheet->getHighestRow();
		 $highestColumn = $worksheet->getHighestColumn();
		 for($row=2; $row<=$highestRow; $row++)
		 {
		  $number = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
		  
		  $data[] = array(
		   'number'  => $number,
		   
		  );
		 }
		}
		$this->csv_import_model->insert($data);
	}
	
		
}
