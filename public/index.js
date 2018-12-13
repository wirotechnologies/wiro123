import React from 'react';
import ReactDOM from 'react-dom';
import Playlist from './js/playlist/components/playlist.js';
import data from './js/api.json';

const app = document.getElementById('app');
//ReactDOM.render(que voy a renderizar, donde lo haré);
//const holaMundo = <h1>Hola Mundo!</h1>;
ReactDOM.render(<Playlist data={data}/>, app);
//ReactDOM.render(<Media type="video" title="¿Que es responsive Design?" author="Yeison" image="/img/images/bitcoin_.png"/>, app);