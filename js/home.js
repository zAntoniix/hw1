function onContentJson(json) {
  console.log("JSON ricevuto, carico contenuti..");
  const space = document.querySelector('#dettagli');

  for(let i in json) {
    const tit = json[i].titolo;
    const img_link = json[i].img;
    const desc = json[i].descrizione;
    const content = document.createElement('div');
    const img = document.createElement('img');
    img.src = img_link;
    const titolo = document.createElement('h1');
    titolo.innerText = tit;
    const descrizione = document.createElement('p');
    descrizione.innerText  = desc;
    content.appendChild(img);
    content.appendChild(titolo);
    content.appendChild(descrizione);
    space.appendChild(content); 
  }
}

function onContentResponse(response) {
  return response.json();
}

function carica_contents() {
  fetch("carica_contents.php").then(onContentResponse).then(onContentJson);
}

function mobileMenu(menu) {
  menu.classList.toggle('open');
}


carica_contents();