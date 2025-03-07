var optionalTeammates = [];
window.onload = function() {
    optionalTeammates = Array.from(document.getElementsByClassName('optionalTeammate'));
};

function displayStatus(){
    $.ajax({
        type: 'POST',
        url: './scripts/checkStatus.php',
        data: {
            admNo: document.getElementById('student').value
        },
        success: function(response){
            res = JSON.parse(response);
            if(res.status == 'success'){
                let rows = '', status = '';
                if(res.data.status == 'Pending'){
                    status = '<i class="fa-solid fa-hourglass-half"></i> Pending';
                } else if(res.data.status == 'Approved'){
                    status = '<i class="fa-solid fa-check"></i> Approved';
                } else if(res.data.status == 'Rejected'){
                    status = '<i class="fa-solid fa-times"></i> Rejected';
                }
                res.data.team.map(member => {rows += '<tr><td>'+member.admissionNo+'</td><td>'+member.name+'</td></tr>'});
                document.getElementById('projectSection').innerHTML = '<div class="project">'
                                        +'<div id="topic">'+res.data.topic+'</div>'
                                        +'<div id="status">'+status +'</div>'
                                        +'<table>'
                                        +rows
                                        +'</table>'
                                    +'</div>';
            } else if(res.status == 'error'){
                document.getElementById('status').innerText = res.message;
            }
        }
    });
}

function addTeammate() {
    if (optionalTeammates.length === 0) {
        alert('No more teammates can be added!');
        return;
    }
    let newTeammate = optionalTeammates.shift();
    newTeammate.style.display = 'block';
}

function removeTeammate() {
    let displayedTeammates = document.querySelectorAll('.optionalTeammate[style="display: block;"]');
    lastTeammate = displayedTeammates[displayedTeammates.length - 1];
    lastTeammate.getElementsByTagName('input')[0].value = '';
    lastTeammate.style.display = 'none';
    optionalTeammates.unshift(lastTeammate);
}

function findName(ele){
    let admNo = ele.value;
    if(admNo.length == 7){
        $.ajax({
            url: './scripts/findName.php',
            method: 'POST',
            data: {
                admNo: admNo
            },
            success: function(response){
                if(JSON.parse(response).status == 'success'){
                    ele.nextElementSibling.innerText = JSON.parse(response).data;
                } else if(JSON.parse(response).status == 'error'){
                    ele.value = '';
                    ele.nextElementSibling.innerText = JSON.parse(response).message;
                }
            }
        });
    }else{
        ele.nextElementSibling.innerText = '';
    }
}


$("#projectForm").submit(function(event) {
    event.preventDefault(); 

    var formData = $(this).serialize();

    $.ajax({
        type: "POST",
        url: "./scripts/submitProject.php",
        data: formData,
        success: function(response) {
            if(JSON.parse(response).status == 'error'){
                $('#modalType').removeClass().addClass('error');
                $('#modalType h2').text('Error');
            } else if(JSON.parse(response).status == 'success'){
                $('#modalType').removeClass().addClass('success');
                $('#modalType h2').text('Success');
                $(".displayName").empty();
                document.getElementById("projectForm").reset();
            }
            $('#modalType p').text(JSON.parse(response).message);
            document.getElementsByClassName('modal')[0].style.display = 'flex';
        }
    });
});

function closeModal(){
    document.getElementsByClassName('modal')[0].style.display = 'none';
}

