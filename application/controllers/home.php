<?php

class Home extends MY_Controller{
    function index(){
    	// Load home view with five random shows and people as parameter
        $this->load->model('display_handler');
    	$shows = $this->display_handler->get_five_shows();
    	$persons = $this->display_handler->get_five_persons();
    	$data['shows'] = $shows;
    	$data['persons'] = $persons;
       	$this->load->view('general/home', $data);
    	$this->load->view('includes/footer');
    }
}
/* End of file home.php */
/* Location: ./application/controllers/home.php */