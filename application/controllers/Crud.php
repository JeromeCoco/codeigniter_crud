<?php
	class Crud extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
		}

		public function index()
		{
			$this->load->view('index');
			$this->load->model('User_model');
      		$this->User_model->view();
      	}

      	public function show()
      	{
      		$this->load->model('User_model');
      		$list = array();
      		$list = $this->User_model->view();
      		echo json_encode($list);
      		exit;
      	}

      	public function returnsEdit()
      	{
      		$this->load->model('User_model');
      		$list = array();
      		$list = $this->User_model->retEdit($_POST);
      		echo json_encode($list);
      		exit;
      	}

      	public function add_view()
      	{
      		$this->load->view('Add');
      	}

      	public function add()
      	{
      		$this->load->model('User_model');
      		$list = array();
      		$list = $this->User_model->insert($_POST);
      		echo json_encode($list);
      		exit;
      	}

      	public function edit()
      	{
      		$this->load->model('User_model');
      		$list = array();
      		$list['success'] = $this->User_model->update($_POST);
      		echo json_encode($list);
      		exit;
      	}

      	public function delete()
      	{
      		$this->load->model('User_model');
      		$list = array();
      		$list['success'] = $this->User_model->delete($_POST);
      		echo json_encode($list);
      		exit;
      	}
   	}
?>