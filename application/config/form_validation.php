<?php
$config = array(
	  'person' => array(
	                  array(
	                          'field' => FIRSTNAME,
	                          'label' => 'first name',
	                          'rules' => 'trim|required'
	                       ),
	                  array(
	                          'field' => LASTNAME,
	                          'label' => 'last name',
	                          'rules' => 'trim|required'
	                       ),
	                  array(
	                          'field' => DESCRIPTION,
	                          'label' => 'description',
	                          'rules' => 'trim|required'
	                       )
	                  ),
	'show' => array(
	                  array(
	                          'field' => NAME,
	                          'label' => 'name',
	                          'rules' => 'trim|required'
	                       ),
	                  array(
	                          'field' => START_YEAR,
	                          'label' => 'start year',
	                          'rules' => 'trim|required|min_length[4]'
	                       ),
	                  array(
	                          'field' => END_YEAR,
	                          'label' => 'end year',
	                          'rules' => 'trim|min_length[4]'
	                       ),
	                  array(
	                          'field' => DESCRIPTION,
	                          'label' => 'description',
	                          'rules' => 'trim|required'
	                       )
	                  ),
	'cast_member' => array(
	                  array(
	                          'field' => CHARACTER_NAME,
	                          'label' => 'character name',
	                          'rules' => 'trim|required'
	                       )
	                  ),
	 'registration' => array(
	 						array(
	 							'field' => FIRSTNAME,
	 							'label' => 'first name',
	 							'rules' => 'trim|required'
	 						),
	 						array(
	 							 'field' => LASTNAME,
	                 	         'label' => 'last name',
	                 	         'rules' => 'trim|required'
	 						),
	 						array(
	 							'field' => EMAIL,
	                 	         'label' => 'email',
	                 	         'rules' => 'trim|required|valid_email'
	 						),
	 						array(
	 							 'field' => USERNAME,
	                 	         'label' => 'username',
	                 	         'rules' => 'trim|required|min_length[6]'
	 						),
	 						array(
	 							'field' => PASSWORD,
	 							'label' => 'password',
	 							'rules' => 'trim|required|min_length[6]'
	 						),
	 						array(
	 							'field' => PASSWORD_CONFIRMATION,
	 							'label' => 'password confirmation',
	 							'rules' => 'trim|required|matches[password]'
	 						)
	 					),
	 'login' => array(
	 						array(
	 							'field' => USERNAME,
	 							'label' => 'username',
	 							'rules' => 'trim|required|min_length[6]'
	 						),
	 						array(
	 							'field' => PASSWORD,
	 							'label' => 'password',
	 							'rules' => 'trim|required|min_length[6]'
	 						)
	 )     
);