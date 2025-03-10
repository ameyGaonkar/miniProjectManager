function updateStatus(ele){
    $.ajax({
        method: 'POST',
        url: './scripts/updateStatus.php',
        data: {
            projectStatus: ele.value,
            projectId: ele.previousElementSibling.value
        },
        success: function(response){
            if(JSON.parse(response).status == 'success'){
                alert('Status updated successfully!');
            } else if(JSON.parse(response).status == 'error'){
                alert(JSON.parse(response).message);
            }
        }
    });
}