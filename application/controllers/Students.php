<?php 
class Students extends CI_Controller 
{
	public function __construct()
	{
		/*call CodeIgniter's default Constructor*/
		parent::__construct();

		/*load database libray manually*/
                // $this->load->database();

		/*load Model*/
		$this->load->model('Student_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('pagination');
		$this->load->library('form_validation');

	}

	/*Insert student data*/
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
					redirect('http://localhost/fee/Students/displaydata');
					echo "Records Saved Successfully";
				}
				else
				{
					echo "Insert error !";
				}
			}
		}$this->load->view('admin');
	}


	/*display student data*/ 
	// public function displaydata()
	// {
	// 	$result['data']=$this->Student_model->display_records();
	// 	$this->load->view('show',$result);
	// }
	public function displaydata(){

		$config['base_url'] = base_url().'Students/displaydata';        
		$config['total_rows'] = $this->Student_model->count_all_students();
		$config['per_page'] = 1;
		$config['uri_segment'] = 3;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$this->pagination->initialize($config);
		$data['links'] = $this->pagination->create_links();
		$data['students'] = $this->Student_model->get_students($config["per_page"], $page);
		$this->load->view('show',$data);    

	}

	/*delete student data*/
	public function delStudent($id)
	{

		if($this->Student_model->removeStudent($id))
		{
			return redirect("http://localhost/fee/Students/displaydata");
		}
	}

	

	/*insert fee data*/
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
				redirect('http://localhost/fee/Students/displaydata');
				echo "Records Saved Successfully";
			}
			else
			{
				echo "Insert error !";
			}

		}$this->load->view('pay');
	}

       /*Display fee data*/
       // 	public function displaypay(){
       // // $result['data']=$this->Student_model->pay_records();
       // // $this->load->view('fee',$result);
       // 		$config=[
       // 			'base_url'=>base_url('students/displaypay'),
       // 			'per_page'=>1,
       // 			'total_rows'=>$this->Student_model->get_counts(),
       // 		];
       // 		$this->pagination->initialize($config);
       // 		$data = $this->Student_model->pay_records($config['per_page'],$this->uri->segment(3));
       // 		$this->load->view('fee',['data'=>$data]);
       // 	}



	/*delete fee data*/
	public function delFee($id)
	{

		if($this->Student_model->removefee($id))
		{
			return redirect("http://localhost/fee/Students/index");
		}
	}

	/*test for pagination */
	public function index(){

		$config['base_url'] = base_url().'Students/index';
		$config['total_rows'] = $this->Student_model->count_all_fees();
		$config['per_page'] = 1;
		$config['uri_segment'] = 3;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';



		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$this->pagination->initialize($config);
		$data['links'] = $this->pagination->create_links();
		$data['fees'] = $this->Student_model->get_fees($config["per_page"], $page);
		$this->load->view('fee',$data);    

	}

	/*update student data*/
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

	// public function update_record($id)
	// { 
	      
	// 	$data = $this->input->post();
	// 	if($this->Student_model->updateStudent($data , $id))
	// 	{
	// 		redirect("Students/displaydata");
	// 	} 
	// 	else
	// 	{
	// 		redirect("Students/editStudent/{$id}");
	// 	}
	// }

	/*update student data*/
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
			redirect("Students/index");
		} 
		else
		{
			redirect("Students/editFee");
		}
	}


 }
?>