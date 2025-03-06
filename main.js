var optionalTeammates = [];
window.onload = function() {
    optionalTeammates = Array.from(document.getElementsByClassName('optionalTeammate'));
};

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