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

    const notify_btn = document.getElementById('notify-btn');
    const notify_label = document.getElementById('show-notif');
    const notify_container = document.getElementById('notify-menu');
    
    if (notify_btn && notify_label && notify_container) {
        let xhr = new XMLHttpRequest();
    
        function notification() {
            xhr.open('GET', '/checkMessage', true);
            xhr.send();
            xhr.onload = () => {
                if (xhr.status == 200) {
                    let get_data = JSON.parse(xhr.responseText);
                    console.log(get_data);
                    if(get_data == get_data) {
                        notify_label.innerHTML = get_data;
                    } else {
                        notify_btn.innerHTML += get_data;
                    }
                }
            }
        }
    
        window.onload = () => {
            notification();

            setInterval(() => {
                notification();
            }, 2000);  
        }  
        
    
    
        notify_btn.addEventListener('click', (e) => {
            e.preventDefault();
    
            notify_container.classList.toggle('show');
            
            xhr.open('GET', '/getMessage', true);
            xhr.send();
            
            notify_container.innerHTML = '';
            
            xhr.onload = function() {
                if (xhr.status == 200) {
                    let data = JSON.parse(xhr.responseText);
                    console.log(data);
                    if (data.length == 0) {
                        notify_container.innerHTML = '<li class="dropdown-item">No notifications</li>';
                    } else {
                        data.forEach(message => {
                            let li = `<li class="dropdown-item"><i class="bi bi-archive-fill p-1"></i>${message.description}</li>`;
                            notify_container.innerHTML += li;
                        });
                    }
                }
            }
        });
    }
});

