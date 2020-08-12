import { hot } from 'react-hot-loader/root';
import React from 'react';
import ReactDOM from 'react-dom';
import App from './App';

const Main = hot(App);

document.addEventListener('DOMContentLoaded', ()=>{
  document.querySelectorAll('[data-js-info]').forEach(el=>{
    let config = {};

    ReactDOM.render(
      <Main config={ config } />,
      el
    );
  });
});
