import React from 'react';

const App = (props)=>{
  return (
    <form>
      <div className="p">
        <label>
          <span className="ui-label">
            Nombre
          </span>
          <br/>
          <input type="text" className="inputtext full" placeholder="Nombre y apellidos" name="nombre" />
        </label>
      </div>
      <div className="p">
        <label>
          <span className="ui-label">
            Email
          </span>
          <br/>
          <input type="email" className="inputtext full" placeholder="ejemplo@empresa.com" name="email" />
        </label>
      </div>
      <div className="p">
        <label>
          <span className="ui-label">
            Teléfono
          </span>
          <br/>
          <input type="tel" className="inputtext full" placeholder="10 dígitos" name="telefono" />
        </label>
      </div>
      <div className="p">
        <button className="button">Enviar</button>
      </div>
    </form>
  );
}

export default App;
