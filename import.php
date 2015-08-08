<?php

//some pseudo code for an import

//get paramters from post or get?
$usertoken = get_parameter('token');
$courseid = get_parameter('courseid');
$fetchurl = get_parameter('fetchurl');//should be uri encoded

//check token to make sure user has privelages
// function will need to be created to check token
if(!$DATABASE->check_token($usertoken)){
    echo 'Invalid token supplied';
    die;
}

// get the data from supplied url
/* should be of form:
{
  "evaluating-expressions-3": {//The grade item id
       "grademax":100,
       "studentgrades":[
          { //student info object related to gradeitem
            "studentid":"student1",
            "studentemail":"student1@email.com",
            "studentgrade":100,
          },
          {
            "studentid":"student2",
            "studentemail":"student2@email.com",
            "studentgrade":85,
          },...
      ],
  },
  "square_roots_2":{...},
  ...
}
*/
$json_raw = file_get_contents($fetchurl);
$grade_items = json_decode($json_raw);

//update grade_items in database;
// need to create update_grade_items function
$DATABASE->update_grade_items($grade_items,$courseid);


?>

