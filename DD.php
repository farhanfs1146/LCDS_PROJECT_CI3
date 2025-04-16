<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DD extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('DD_Model', 'DD');
	}
	public function S1() {

		$data['Lfb_Forming'] = $this->DD->get_Lfb_Forming();
		$data['Competition_Forming'] = $this->DD->get_Competition_Forming();
		$data['Finale_Forming'] = $this->DD->get_Finale_Forming();
		$data['Urban_Forming'] = $this->DD->get_Urban_Forming();
		$data['Monthly_Volumes'] = $this->DD->get_monthly_Confirmed_Volumes();
		$data['Monthly_Shipped_Volumes'] = $this->DD->get_monthly_Shipped_Volumes();
		$data['monthly_Shipped_VolumesBy_TMB'] = $this->DD->get_monthly_Shipped_VolumesBy_TMB();
		$data['monthly_Shipped_VolumesBy_LFB'] = $this->DD->get_monthly_Shipped_VolumesBy_LFB();
		$data['monthly_Shipped_VolumesBy_OMB'] = $this->DD->get_monthly_Shipped_VolumesBy_OMB();
		$data['Lfb_Forming_monthly_data'] = $this->DD->get_Lfb_Forming_monthly_data();
		$data['Competition_Forming_monthly_data'] = $this->DD->get_Competition_Forming_monthly_data();
		$data['Finale_Forming_monthly_data'] = $this->DD->get_Finale_Forming_monthly_data();
		$data['Urban_Forming_monthly_data'] = $this->DD->get_Urban_Forming_monthly_data();
		
		$data['title'] = 'Slide.1';
		$this->load->view('DD/Header', $data); // it is neccessary to load the content according to their turn/Arrangenet like first load header then desired file..
		$this->load->view('DD/S1', $data);
	}

	public function S2()
	{

		$data['Lfb_Forming'] = $this->DD->get_Lfb_Forming();
		$data['Competition_Forming'] = $this->DD->get_Competition_Forming();
		$data['Finale_Forming'] = $this->DD->get_Finale_Forming();
		$data['Urban_Forming'] = $this->DD->get_Urban_Forming();

		$data['title'] = 'Slide.2';
		$this->load->view('DD/Header', $data);
		$this->load->view('DD/S2', $data);	
	}

	public function S3()
	{

		$data['Lfb_Forming'] = $this->DD->get_Lfb_Forming();
		$data['Competition_Forming'] = $this->DD->get_Competition_Forming();
		$data['Finale_Forming'] = $this->DD->get_Finale_Forming();
		$data['Urban_Forming'] = $this->DD->get_Urban_Forming();

		$data['title'] = 'Slide.3';
		$this->load->view('DD/Header', $data);
		$this->load->view('DD/S3', $data);
	}


	public function S4()
{
    // Get the data for LFB, Competition, Finale and Urban factories
	$data['Lfb_Forming'] = $this->DD->get_Lfb_Forming();
	$data['Competition_Forming'] = $this->DD->get_Competition_Forming();
	$data['Finale_Forming'] = $this->DD->get_Finale_Forming();
	$data['Urban_Forming'] = $this->DD->get_Urban_Forming();

	// Get the day by day LFB weekly forming data
	// (This is an example for LFB factory)
	$productionData = $this->DD->get_day_by_day_lfb_weekly_forming_data();

	// Organize the data by line
	// We'll create an associative array with keys 'Line-1', 'Line-2', 'Line-3'
	// and values will be arrays of data points for each line
	$weeklyData = [
		'Line-1' => [],
		'Line-2' => [],
		'Line-3' => []
	];

	// Loop through each data point
	foreach ($productionData as $row) {
		// Get the line for this data point
		$line = $row['ProductionLine'];

		// Add this data point to the array for this line
		$weeklyData[$line][] = $row;
	}

	// Save the organized data to the $data array
	$data['weeklyData'] = $weeklyData;

    // Set the page title
    $data['title'] = 'Slide.4';

    // Load the header view
    $this->load->view('DD/Header', $data);

    // Load the S4 view (which will use the $data array)
    $this->load->view('DD/S4', $data);
}

	public function S5()
	{
		$data['Lfb_Forming'] = $this->DD->get_Lfb_Forming();
		$data['Competition_Forming'] = $this->DD->get_Competition_Forming();
		$data['Finale_Forming'] = $this->DD->get_Finale_Forming();
		$data['Urban_Forming'] = $this->DD->get_Urban_Forming();
		$data['Competition_Forming_Weekly'] = $this->DD->get_Competition_Forming_Weekly();
		$data['Urban_Forming_Weekly'] = $this->DD->get_Urban_Forming_Weekly();

		$day_by_day_OMB_forming = $this->DD->get_day_by_day_Urban_Forming_Weekly();
		$data['weeklyData_OMB'] = $day_by_day_OMB_forming;

		$day_by_day_TMB_forming = $this->DD->get_day_by_day_Competition_Forming_Weekly();
		$data['weeklyData_TMB'] = $day_by_day_TMB_forming;
		$data['title'] = 'Slide.5';
		$this->load->view('DD/Header', $data);
		$this->load->view('DD/S5', $data);
	}

	public function S6()
	{
		$year = date('Y');
		$month = date('m');
		$day = date('d');
		//$data1['Monthly_Volumes'] = $this->DD->get_monthly_Confirmed_Volumes();
		$data['Lfb_Forming'] = $this->DD->get_Lfb_Forming();
		$data['Lfb_Forming_Hourly'] = $this->DD->Get_LFB_Hourly_Data($year, $month, $day);

		$data['title'] = 'Slide.6';
		$this->load->view('DD/Header', $data);
		$this->load->view('DD/Header');
		$this->load->view('DD/S6', $data);
	}

	public function S7(){

		$data['title'] = 'Slide.7';
		$this->load->view('DD/Header', $data);
		$data['raw_material_available_balanace'] = $this->DD->raw_material_available_balanace_or_quantity();
		// print_r($data['raw_material_available_balanace']['Category']);
		$this->load->view('DD/S7', $data);
	}

	public function S8() // this method is just for testing
	{
		$day_by_day_OMB_forming = $this->DD->get_day_by_day_Urban_Forming_Weekly();
		// Pass Data to View
		$data['weeklyData_OMB'] = $day_by_day_OMB_forming;
		$this->load->view('DD/Footer', $data);
	}

} // End class of DD which is our controller...