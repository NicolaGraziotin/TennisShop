document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('editButton').addEventListener('click', function() {
        const inputs = document.querySelectorAll('.form-control');
        inputs.forEach(input => {
            input.disabled = !input.disabled;
        })
        document.querySelector('#saveButton').hidden = !document.querySelector('#saveButton').hidden;
    })
})