<?php

function update_or_create($table,$params){
    // maybe make an abstract function to check if the record exists
    // if it does, update if necessary, otherwise create it
}

// Get and separate data
$students = $_POST['data']['students'];
$sections = $_POST['data']['sections'];

foreach($sections as $key => $section){
    $sql = "SELECT *
              FROM classes as cl 
             WHERE cl.LMS_id = {$section['lms_code']};";
    // check to see if the record exists. If so, update. Otherwise create;
    // assuming the $DATABASE->query method will return null if no record found
    if($record = $DATABASE->query($sql)){
        $update = "UPDATE classes
                      SET name={$section['sectionname']}
                    WHERE LMS_id={$section['lms_code'];";
        $DATABASE->query($update);
    } else{
        $insert = "INSERT INTO classes
                        VALUES ({$section['sectionname'},
                                {$section['lms_code']},
                                any_other_values,...);";
        $DATABASE->query($insert);
    }
    
    // now, let's make sure the teacher exists, if not then create
    // I assume email is a good check?
    $teacher_q = "SELECT *
                    FROM teacher_table
                   WHERE email = {$section['teacher']['email'];";
    if($DATABASE->query($teacher)){
        // check if enrolled in the $section as a teacher, otherwise enroll
    } else{
        //create teacher user and enroll in course
    }
}

foreach($students as $key=>$student){
    //check to see if student exists, probably by email
    //if student does exists, does password, advisor, guardians need updating?
    $sql = "SELECT *
              FROM student_table AS s
             WHERE s.email = $student['email'];";
    if(!$DATABASE->query($sql)){
        //create a user from student info
    } else{
        //update student information as needed
    }
    
    // now that user is updated or created, let's enroll them
    foreach($student['cc'] as $key=>$cc){
        // check if enrolled in course, otherwise enroll
    }
    
}

?>
