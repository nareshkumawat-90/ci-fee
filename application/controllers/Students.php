<?php

class Students extends CI_Controller {
    public function __construct() {
        /*call CodeIgniter's default Constructor*/
		parent::__construct();

		/*load database libray manually*/
                // $this->load->database();

		/*load Model*/
		$this->load->model('Student_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('pagination');
		$this->load->library('form_validation');
		$this->load->library('ajax_pagination');
		$this->perPage = 4; 

	}

    /*
	*-------------------------------------------
	* Display Dashboard
	*-------------------------------------------
	*/
    public function index()
	{
        $totalStudent=$this->Student_model->countTotalStudent();
        $totalActive=$this->Student_model->countTotalActive();
        $totalPassout=$this->Student_model->countTotalPassout();
        $totalHold=$this->Student_model->countTotalHold();
        $this->load->view('dashboard',['totalStudent'=>$totalStudent,'totalActive'=>$totalActive,'totalPassout'=>$totalPassout,'totalHold'=>$totalHold]);
    }

    
    /*
	*-------------------------------------------
	* Insert student data
	*-------------------------------------------
	*/
	public function savedata()
	{

		/*Check submit button */
		if($this->input->post('save'))
		{
			$data['fname']=$this->input->post('fname');
			$data['lname']=$this->input->post('lname');
			$data['email']=$this->input->post('email');
			$data['dob']=$this->input->post('dob');
			$data['gender']=$this->input->post('gender');
			$data['contactno']=$this->input->post('contactno');
			$data['class']=$this->input->post('class');
			$data['subject']=$this->input->post('subject');
			$data['total_fee']=$this->input->post('total_fee');
			$data['address']=$this->input->post('address');


                        /*validation*/
			$this->form_validation->set_rules('fname','First name ','required');
			$this->form_validation->set_rules('lname','last name','required');			
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[students.email]');

			if($this->form_validation->run()==false){
                                 // $this->load->view('index');

                                // redirect(base_url('students/savedata'));
                                // echo "validation error";
			}
			else
			{
				$response =$this->Student_model->saverecords($data);

				if($response==true)
				{
                                        // $this->load->view('index');
					redirect('Students/displaydata');
					echo "Records Saved Successfully";
				}
				else
				{
					echo "Insert error !";
				}
			}
		}$this->load->view('student_form');
	}

    /*
	*-------------------------------------------
	* delete student data
	*-------------------------------------------
	*/
	public function delStudent($id)
	{

		if($this->Student_model->removeStudent($id))
		{
			return redirect("Students/displaydata");
		}
	}

	/*
	*-------------------------------------------
	* insert fee data
	*-------------------------------------------
	*/
	public function paydata($id)
	{
               
               /*Check submit button */
		if($this->input->post('save'))
		{
			$data['student_id']=$id;
			$data['amount']=$this->input->post('amount');
			$data['paid_date']=$this->input->post('paid_date');
			$data['description']=$this->input->post('description');
			$response =$this->Student_model->payrecords($data);

			if($response==true)
			{
                                // $this->load->view('index');
				redirect('Students/displaydata');
				echo "Records Saved Successfully";
			}
			else
			{
				echo "Insert error !";
			}

		}$this->load->view('pay');
	}

	/*
	*-------------------------------------------
	* delete fee data
	*-------------------------------------------
	*/
	public function delFee($id)
	{

		if($this->Student_model->removefee($id))
		{
			return redirect("Students/displayfee");
		}
	}

	/*
	*-------------------------------------------
	* update student data
	*-------------------------------------------
	*/
	public function editStudent($id)
	{
		$data = $this->Student_model->getStudentRecord($id);
		$this->load->view('editstd',['data'=>$data]);
	}
	
	public function update_record($id)
	{ 
		/*validation*/
		$this->form_validation->set_rules('fname','First name ','required');
		$this->form_validation->set_rules('lname','last name','required');			
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[students.email]');
		

		if($this->form_validation->run())
		{
			$data = $this->input->post();
			if($this->Student_model->updateStudent($data , $id))
			{   
				redirect("Students/displaydata");
			}
			else
			{
				redirect("Students/editStudent");
			}
		}
		else
		{
			$this->editStudent($id);
		}

	
	}

	/*
	*-------------------------------------------
	* update fees data
	*-------------------------------------------
	*/
	public function editFee($id)
	{

		$data = $this->Student_model->getFeeRecord($id);
		$this->load->view('payedit',['data'=>$data]);
	}
	public function update_fee_record($id)
	{ 
		$data = $this->input->post();
		if($this->Student_model->updatefee($data , $id))
		{
			redirect("Students/displayfee");
		} 
		else
		{
			redirect("Students/editFee");
		}
	}
    
    /*
	*-------------------------------------------
	* Display fees data
	*-------------------------------------------
	*/
    public function displayfee(){
    $data = array();

    // Get record count
    $conditions['returnType'] = 'count';
    $totalRec = $this->Student_model->getRowf($conditions);

    // Pagination configuration
    $config['target'] = '#dataList';
    $config['base_url'] = base_url('Students/ajaxPaginationFee');
    $config['total_rows'] = $totalRec;
    $config['per_page'] = $this->perPage;
    $config['link_func'] = 'searchFilter';

    // Initialize pagination library
    $this->ajax_pagination->initialize($config);

    // Get records
    $conditions = array(
    'limit' => $this->perPage
    );
    $data['fees'] = $this->Student_model->getRowf($conditions);

    // Load the list page view
    $this->load->view('fee', $data);
    }

    function ajaxPaginationFee(){
    // Define offset
    $page = $this->input->post('page');
    if(!$page){
    $offset = 0;
    }else{
    $offset = $page;
    }
    // Set conditions for search and filter
    $keywords = $this->input->post('keywords');
    $sortBy = $this->input->post('sortBy');
    if(!empty($keywords)){
    $conditions['search']['keywords'] = $keywords;
    }
    if(!empty($sortBy)){
    $conditions['search']['sortBy'] = $sortBy;
    }

    // Get record count
    $conditions['returnType'] = 'count';
    $totalRec = $this->Student_model->getRowf($conditions);

    // Pagination configuration
    $config['target'] = '#dataList';
    $config['base_url'] = base_url('Students/ajaxPaginationFee');
    $config['total_rows'] = $totalRec;
    $config['per_page'] = $this->perPage;
    $config['link_func'] = 'searchFilter';

    // Initialize pagination library
    $this->ajax_pagination->initialize($config);

    // Get records
    $conditions['start'] = $offset;
    $conditions['limit'] = $this->perPage;
    unset($conditions['returnType']);
    $data['fees'] = $this->Student_model->getRowf($conditions);

    // Load the data list view
    $this->load->view('ajax-fee', $data, false);
    }

    /*
	*-------------------------------------------
	* Display student data
	*-------------------------------------------
	*/
    public function displaydata(){
    $data = array();

    // Get record count
    $conditions['returnType'] = 'count';
    $totalRec = $this->Student_model->getRows($conditions);

    // Pagination configuration
    $config['target'] = '#dataList';
    $config['base_url'] = base_url('Students/ajaxPaginationData');
    $config['total_rows'] = $totalRec;
    $config['per_page'] = $this->perPage;
    $config['link_func'] = 'searchFilter';

    // Initialize pagination library
    $this->ajax_pagination->initialize($config);

    // Get records
    $conditions = array(
    'limit' => $this->perPage
    );
    $data['student'] = $this->Student_model->getRows($conditions);

    // Load the list page view
    $this->load->view('student_details', $data);
    }

    function ajaxPaginationData(){
    // Define offset
    $page = $this->input->post('page');
    if(!$page){
    $offset = 0;
    }else{
    $offset = $page;
    }

    // Set conditions for search and filter
    $keywords = $this->input->post('keywords');
    $sortBy = $this->input->post('sortBy');
    if(!empty($keywords)){
    $conditions['search']['keywords'] = $keywords;
    }
    if(!empty($sortBy)){
    $conditions['search']['sortBy'] = $sortBy;
    }

    // Get record count
    $conditions['returnType'] = 'count';
    $totalRec = $this->Student_model->getRows($conditions);

    // Pagination configuration
    $config['target'] = '#dataList';
    $config['base_url'] = base_url('Students/ajaxPaginationData');
    $config['total_rows'] = $totalRec;
    $config['per_page'] = $this->perPage;
    $config['link_func'] = 'searchFilter';

    // Initialize pagination library
    $this->ajax_pagination->initialize($config);

    // Get records
    $conditions['start'] = $offset;
    $conditions['limit'] = $this->perPage;
    unset($conditions['returnType']);
    $data['student'] = $this->Student_model->getRows($conditions);

    // Load the data list view
    $this->load->view('ajax-data', $data, false );
    }

    public function update_status()
    {
    $id = $this->input->post('id');
    $status = $this->input->post('status');
    print_r('$id');
    print_r($status);
    $this->load->model('Student_model');
    $this->Student_model->update_status_model($id,$status);

    }
}
?>