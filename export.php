<?php

//some pseudo code for an export

//get paramters from post or get?
$usertoken = get_parameter('token')
$courseid = get_parameter('courseid')

//check token to make sure user has privelages
// function will need to be created to check token
if(!$DATABASE->check_token($usertoken)){
    echo 'Invalid token supplied';
    die;
}

//get grade items for course with courseid
// will need get_grades function to be created, should return grade_items object
// or false
if(!$grade_items = $DATABASE->get_grades($courseid)){
    echo "Could not find grade items for course with id $courseid";
    die;
}

/*parse grade items to make json like
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

// need to create json_parser_function
$json = json_parser_function($gradeitems);

echo $json;

?>

