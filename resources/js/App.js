import React ,{useState} from 'react';
import {useForm} from "react-hook-form";
import axios from 'axios';
import "../css/style.css"

const App = (props)=>{

    const [show,setShow] = useState(false);
    const { register, handleSubmit, errors } = useForm();
     const onSubmit= async (data) => {

        await axios.post('/api/lead',data)
            .then(() => {
                    setShow(true);
            })
            .catch((err) => {console.log(err)});
    }
  return (
      <>
      {!show &&
      <form onSubmit={handleSubmit(onSubmit)}>
          <div className="p">
              <label>
          <span className="ui-label">
              {errors.nombre && errors.nombre.type === 'required' && (<p className="error">Error: El nombre es necesario </p>)}
              {errors.nombre && errors.nombre.type === 'pattern' && (<p className="error">Error: Debes incluir el nombre y apellido </p>)}
              Nombre
          </span>
                  <br/>
                  <input type="text" className="inputtext full" placeholder="Nombre y apellidos" name="nombre" ref={register({required:true,pattern:/(\w.+\s).+/i})} />
              </label>
          </div>
          <div className="p">
              <label>
          <span className="ui-label">
              {errors.email && errors.email.type === 'required' && (<p className="error">Error: El correo es necesario </p>)}
              {errors.email && errors.email.type === 'pattern' && (<p className="error">Error: Debes utilizar un correo valido </p>)}
              Email
          </span>
                  <br/>
                  <input type="email" className="inputtext full" placeholder="ejemplo@empresa.com" name="email" ref={register({required:true,pattern:/^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i})} />
              </label>
          </div>
          <div className="p">
              <label>
          <span className="ui-label">
              {errors.telefono && errors.telefono.type === 'required' && (<p className="error">Error: El Teléfono es necesario </p>)}
              {errors.telefono && errors.telefono.type === 'minLength' && (<p className="error">Error: Debe tener una longitud minima de 10 digitos </p>)}
              {errors.telefono && errors.telefono.type === 'maxLength' && (<p className="error">Error: Debe tener una longitud maxima de 10 digitos </p>)}
              Teléfono
          </span>
                  <br/>
                  <input type="tel" className="inputtext full" placeholder="10 dígitos" name="telefono" ref={register({required:true,minLength:10,maxLength:10})} />
              </label>
          </div>
          <div className="p">
              <button id="enviar" className="button">Enviar</button>
          </div>
      </form> }

      {show && <p>Sus datos se han guardado correctamente</p>}

      </>


  )
}

export default App;
