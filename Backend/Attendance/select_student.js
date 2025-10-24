function sel_stu()
{
    fetch('../../Backend/Attendance/select_student.php')
    .then(response=>response.json())
    .then(student=>{student.forEach(stu=>document.getElementById("stu").innerHTML+=`<option value=${stu}>${stu}</option>`);
    })
}