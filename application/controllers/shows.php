<?php
class Shows extends MY_Controller{
    function show(){
        // If ID is set, show single show
        if($this->uri->segment(3)){
            // If user is logged in, add admin panel
            $data['edit_type'] = $this->uri->segment(1);
            $data['editID'] = $this->uri->segment(3);
            $this->load->view('general/admin_panel', $data);
            // Get showID from URI
            $showID = $this->uri->segment(3);
            $this->load->model('display_handler');
            // Get show and it's cast from database
            $data['show'] = $this->display_handler->get_show_by_ID($showID);
            $data['cast'] = $this->display_handler->get_cast_by_showID($showID);
            // Load view with data as parameter
            $this->load->view('display/single_show', $data);
        }
        // Else show all shows
        else{
            // Get all shows and load array of show-objects into view
            $this->load->model('display_handler');
            $shows = $this->display_handler->get_all_shows();
            $data['shows'] = $shows;
            $this->load->view('display/shows', $data);
        }
        $this->load->view('includes/footer');
    }
    function add(){
        if($this->is_logged_in() == TRUE){
            // If user is logged in, show add show form
            $this->load->view('forms/add_show');
        }
        else{
            // If user is not logged in, show no access page
            $this->load->view('general/no_access');
        }
        $this->load->view('includes/footer');
    }
    function confirm_delete(){
        if($this->is_logged_in() == TRUE){
            // If user is logged in, get show object and load delete form with object as parameteter
            $showID = $this->uri->segment(3);
            $this->load->model('display_handler');
            $data['show'] = $this->display_handler->get_show_by_ID($showID);
            $this->load->view('forms/delete', $data);
        }
        else{
            // If user is not logged in, show no access page
            $this->load->view('general/no_access');
        }
        $this->load->view('includes/footer');
    }
    function edit(){
        if($this->is_logged_in() == TRUE){
            // If user is logged in, get showID from URI or POST and load edit form.
            $showID = $this->uri->segment(3);
            if($showID == NULL){
                $showID = $this->input->POST(ID);
            }
            $this->load->model('display_handler');
            $data['show'] = $this->display_handler->get_show_by_ID($showID);
            $this->load->view('forms/edit_show', $data);
        }
        else{
            // If user is not logged in, show no access page
            $this->load->view('general/no_access');
        }
        $this->load->view('includes/footer');
    }
    function save(){
        $this->load->library('form_validation');
        // Run show validation rules
        if($this->form_validation->run('show') == FALSE){
            // If input is not valid, reload to display errormessages
            $this->add();
        }
        else{
            // If input is valid, create show object and try to save it to database
            $this->load->model('show_handler');
            $params = array(
                ID => NULL,
                NAME => $this->input->POST(NAME),
                START_YEAR => $this->input->POST(START_YEAR),
                END_YEAR => $this->input->POST(END_YEAR),
                DESCRIPTION => $this->input->POST(DESCRIPTION)
            );
            $show = new Show($params);
            if($query = $this->show_handler->add_show($show)){
                // If saving is a success redirect to success-page and add successmessages
                $this->load->model('show_dal');
                $showID = $this->show_dal->get_showID($show->get_name());
                $data['success_action'] = $show->get_name() . ' was successfully added to database.';
                $data['success_redirect_link'] = "shows/show/$showID";
                $data['success_redirect_text'] = 'Go to show.';
                $this->load->view('general/success', $data);
                $this->load->view('includes/footer');
            }
            else{
                // If saving was not a success, reload to display errormessages
                $this->add();
            }
        }
    }
    function update(){
        $this->load->library('form_validation');
        // Run show validation rules
        if($this->form_validation->run('show') == FALSE){
            // If input is not valid, reload to display errormessages
            $this->show();
        }
        else{
            // If input is valid, create show object and try to save to database
            $this->load->model('show_handler');
            $params = array(
                ID => $this->input->POST(ID),
                NAME => $this->input->POST(NAME),
                START_YEAR => $this->input->POST(START_YEAR),
                END_YEAR => $this->input->POST(END_YEAR),
                DESCRIPTION => $this->input->POST(DESCRIPTION)
            );
            $show = new Show($params);
            if($query = $this->show_handler->update_show($show)){
                // If saving is a success redirect to success-page and add successmessages
                $this->load->model('show_dal');
                $showID = $this->show_dal->get_showID($show->get_name());
                $data['success_action'] = $show->get_name() . ' was successfully updated.';
                $data['success_redirect_link'] = "shows/show/$showID";
                $data['success_redirect_text'] = 'Go to show.';
                $this->load->view('general/success', $data);
                $this->load->view('includes/footer');
            }
            else{
                // If saving was not a success, reload showform
                $this->edit();
            }
        }
    }
    function delete(){
        // Get show object and delete it
        $showID = $this->input->POST(ID);
        $this->load->model('display_handler');
        $show = $this->display_handler->get_show_by_ID($showID);
        $this->load->model('show_handler');
        if($this->show_handler->delete_show($show)){
            // If deleting was successful, redirect to successpage 
            $data['success_action'] = $show->get_name() . ' was successfully deleted.';
            $data['success_redirect_link'] = "/";
            $data['success_redirect_text'] = 'Go to first page.';
            $this->load->view('general/success', $data);
            $this->load->view('includes/footer');
        }
        else{
            // If deleting was not successful, reload to display errormessages
            $this->show();
        }
    }
}

/* End of file show.php */
/* Location: ./application/controllers/show.php */