function onSpotifyJson(json) {
  const songs = document.querySelector('#result-view');
  songs.innerHTML = '';
  const ricerca = json.tracks.items;

  for(let i in ricerca) {
    const track_data = ricerca[i];
    const track = track_data.name;
    const artist = track_data.artists[0].name;
    const imm_album = track_data.album.images[1].url;
    const song = document.createElement('div');
    song.classList.add('song');
    const img = document.createElement('img');
    img.src = imm_album;
    const titolo = document.createElement('span');
    titolo.classList.add('titolo');
    titolo.textContent = track;
    const artista = document.createElement('span');
    artista.classList.add('artista');
    artista.textContent = artist;
    id = document.createElement('p');
    id.textContent = track_data.id;
    const preferito = document.createElement('a');
    preferito.innerText = "Agg. a preferiti";
    preferito.addEventListener('click', addPreferito);
    song.appendChild(img);
    song.appendChild(titolo);
    song.appendChild(artista);
    song.appendChild(preferito);
    song.appendChild(id);
    songs.appendChild(song);
  }
}

function onJsonPref(json) {
  console.log(json);

}

function onResponse(response) {
  return response.json();
}

function ricerca(event) {
  event.preventDefault();
  
  const song = document.querySelector('#song');
  const song_title = encodeURIComponent(song.value);

  fetch("api_ricerca.php?q="+song_title).then(onResponse).then(onSpotifyJson);
}

function addPreferito(event) {
  const button = event.currentTarget;

  const formData = new FormData();
  formData.append('id', button.parentNode.querySelector('p').textContent);
  formData.append('img', button.parentNode.querySelector('img').src);
  formData.append('title', button.parentNode.querySelector('.titolo').textContent);
  formData.append('artist', button.parentNode.querySelector('.artista').textContent);

  fetch("add_preferiti.php", {method: 'post', body: formData}).then(onResponse).then(onJsonPref);
}

function mobileMenu(menu) {
  menu.classList.toggle('open');
}

const ricSpo = document.querySelector('#spotify');
ricSpo.addEventListener('submit', ricerca);
