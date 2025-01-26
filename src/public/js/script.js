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
                    if (get_data == get_data) {
                        notify_label.innerHTML = get_data;
                    } else {
                        notify_btn.innerHTML += get_data;
                    }
                }
            }
            
        }

        window.onload = () => {
            notification();
        }

        notify_btn.addEventListener('click', (e) => {
            e.preventDefault();

            notify_container.classList.toggle('show');

            showMessage();
        });

        function showMessage() {
            xhr.open('GET', '/getMessage', true);
            xhr.send();

            let temp = '';

            xhr.onload = function () {
                if (xhr.status == 200) {
                    let data = JSON.parse(xhr.responseText);
                    console.log(data);
                    if (data.length == 0) {
                        temp += '<li class="dropdown-item">Non ci sono notifiche</li>';
                    } else {
                        data.forEach(message => {
                            if (message.seen == 0) {
                                temp += `<li class="dropdown-item notification" id="${message.idnotification}"><em  class="bi bi-archive-fill p-1"></em>${message.description}</li>`;                 
                                //notify_container.innerHTML += li;
                            } else {
                                temp += `<li class="dropdown-item"><em class="bi bi-archive p-1"></em>${message.description}</li>`;
                                //notify_container.innerHTML += li;
                            }
                        });
                    }
                }

                notify_container.innerHTML = temp;

                const messages = document.querySelectorAll('.notification');
                messages.forEach(message => {
                    message.addEventListener('click', () => {
                        readMessage(message.id);
                        //showMessage();
                    });
                });
            }
        }


        function readMessage($idnotification) {
            let xhr = new XMLHttpRequest();
            xhr.open('GET', `/readMessage?idnotification=${$idnotification}`, true);
            xhr.send();
            notification();
        }
    }

    // Controlla se l'utente ha già accettato i cookie
    if (!localStorage.getItem("cookieConsent")) {
        document.getElementById("cookieBanner").classList.remove("d-none");
    }

    // Funzione per nascondere il banner e salvare la preferenza
    function acceptCookies() {
        localStorage.setItem("cookieConsent", "accepted");
        document.getElementById("cookieBanner").classList.add("d-none");
    }

    document.getElementById("acceptCookies").addEventListener("click", acceptCookies);

});



