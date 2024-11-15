const alertPlaceholder = document.getElementById('liveAlertPlaceholder')
const appendAlert = (message, type) => {
  const wrapper = document.createElement('div')
  wrapper.innerHTML = [
    `<div class="alert alert-${type} alert-dismissible" role="alert">`,
    `   <div>${message}</div>`,
    '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
    '</div>'
  ].join('')

  alertPlaceholder.append(wrapper)

  // Ustawienie timeout, aby usunąć alert po 5 sekundach
  setTimeout(() => {
    wrapper.remove();  // Usuwa alert po 5 sekundach
  }, 10000); // 5000 ms = 5 sekund
}

const alertTrigger = document.getElementById('liveAlertBtn')
if (alertTrigger) {
  alertTrigger.addEventListener('click', () => {
    appendAlert('Zapisano pomyślnie! Jeśli chcesz zobaczyć swoje wnioski kliknij '+'<a href="twoje-wnioski.php">tutaj.</a>', 'success')
  })
}
