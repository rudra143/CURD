<?php



  $config = [
  
      'userform' => [
  
                [
                  'field' => 'name',
                  'label' => 'Name',
                  'rules' => 'required|trim'
                ],
                [
                  'field' => 'email',
                  'label' => 'Email',
                  'rules' => 'required|trim|Valid_email'
                ],
                [
                  'field' => 'contact',
                  'label' => 'Contact',
                  'rules' => 'required|trim|max_length[10]|min_length[10]'
                ]
  
      ],
  
  ];

 ?>
