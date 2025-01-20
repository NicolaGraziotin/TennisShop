document.addEventListener('DOMContentLoaded', () => {
    const editButton = document.getElementById('editButton');

    if (editButton) {
        editButton.addEventListener('click', () => {
            const inputs = document.querySelectorAll('.form-control');
            inputs.forEach(input => {
                input.disabled = !input.disabled;
            })
            document.querySelector('#saveButton').hidden = !document.querySelector('#saveButton').hidden;
        })
    }

    //ajax interval for checking new messages
    setInterval(checkMsg,10000);

})

function checkMsg(){
    fetch('ajax/ajax.php?user_id=<?php echo Session::GetUserId(); ?>')
        .then(response => response.text())
        .then(data => {
            document.querySelector('.msg-box').innerHTML = data;
        })
        .catch(error => console.error('Error:', error)
    );
};