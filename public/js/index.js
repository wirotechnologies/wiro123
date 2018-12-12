import React from 'react';
import ReactDOM from 'react-dom';
import Media from './playlist/components/media.js';

const app = document.getElementById('app');
//ReactDOM.render(que voy a renderizar, donde lo haré);
//const holaMundo = <h1>Hola Mundo!</h1>;
ReactDOM.render(<Media type="video" title="¿Que es responsive Design?" author="Yeison" image="/img/images/bitcoin_.png"/>, app);