function att_status()
{
    fetch('../Backend/parent_attendance.php')
    .then(response=>response.json())
    .then(stat=>{document.getElementById("att_status").innerHTML+=stat;
        if(stat=="Present")
    {
        console.log("YES!!!");
        document.getElementById("stat").innerHTML+="<i class='fa-regular fa-face-smile fa-beat' style='color: #02d472;'></i>";
    }
    else{
        console.log("NO!!!");
        document.getElementById("stat").innerHTML+="<i class='fa-regular fa-face-frown fa-beat-fade' style='color: #d3871d;'></i>";
    }
    });

    
}


    
