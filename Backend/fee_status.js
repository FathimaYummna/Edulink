function fee_status()
{
    fetch('../Backend/fee_status.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'month=' + document.getElementById("month").value
    })
    .then(response => response.json())
    .then(stat => {
        document.getElementById("month1").innerHTML = stat.month;
        console.log(stat);
        document.getElementById("status").innerHTML = stat.fee_status;
    });
}
