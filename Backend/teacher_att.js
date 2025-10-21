function getStudents() {
    
    document.getElementById("attForm").style.display = "block";

    fetch('../Backend/teacher_attendance.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'class='+document.getElementById("class").value
    })
        .then(response => response.json())
        .then(students => {
            students.forEach(student=>addRow(student.stu_id,student.fullName));
        })
        .catch(err => console.error(err));

}

function addRow(id, sName) {
    document.getElementById("stuAttTable").innerHTML += "<tr><td>" + id + "</td><td>" + sName + "</td><td><input type='checkbox' name='status[]' value='" + id + "'></td></tr>";
}