<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id =$_POST['teacherid'];

    $sql="SELECT Teacher_ID FROM Teachers";
    $result=$conn->query($sql);
    
    if($result->num_rows>0){
        while($atid= $result->fetch_assoc()){
            if($atid==$id){

                $sql = "DELETE FROM Teacher WHERE Teacher_ID='$id'";

                if ($conn->query($sql) === TRUE) {
                    echo "Teacher removed successfully!";
                }       
                else {
                    echo "Error: " . $conn->error;
                }
                break;
            }
        if($atid!=$id){
            echo "There is no teacher havind id ".$id;
        }
        }
    }
    else{
        echo "No Teachers in the list."
    }

    $conn->close();
}

?>