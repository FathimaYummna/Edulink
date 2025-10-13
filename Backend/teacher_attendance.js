
function addRow(id,sName)
{
    document.getElementById("stuAttTable").innerHTML += "<tr><td>"+id+"</td><td>"+sName+"</td><td><input type='checkbox' name='status[]' value='"+id+"'></td></tr>";
}

