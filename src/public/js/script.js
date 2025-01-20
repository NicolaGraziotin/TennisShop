document.addEventListener('DOMContentLoaded', () => {
    const editButton = document.getElementById('editButton');
    if (editButton)
        editButton.addEventListener('click', () => {
        const inputs = document.querySelectorAll('.form-control');
        inputs.forEach(input => {
            input.disabled = !input.disabled;
        })
        document.querySelector('#saveButton').hidden = !document.querySelector('#saveButton').hidden;
    })
})