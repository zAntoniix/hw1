function controllaCampi(event) {
  if((user.value.length === 0) || (password.value.length === 0)) {
    event.preventDefault();
    document.querySelector('#error').innerHTML = "Inserisci tutti i campi";
    document.querySelector('#error').classList.add('log_error');
  }
}

const user = document.querySelector('.username input');
const pass = document.querySelector('.password input');

const form = document.querySelector('form').addEventListener('submit', controllaCampi);