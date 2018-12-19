import React from 'react';
import ReactDOM from 'react-dom';
import Home from './../pages/containers/home.js';
import data from './../api.json';


const app = document.getElementById('home-container');
ReactDOM.render(<Home data={data} />, app);