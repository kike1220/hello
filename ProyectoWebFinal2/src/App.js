import React, { Component } from 'react';
import logo from './logo.png';
import './App.css';
import { BrowserRouter as Router, Route, Link, Switch } from "react-router-dom";
import index from './components/index';
import Deportes from './components/Deportes';
import Politica from './components/Politica';
import Espectaculos from './components/Espectaculos';
import Login from './components/Login';
import Menu from './components/Menu';
import Crear from './components/Crearnoticia';
import Actualizar from './components/Actualizarnoticia';
import Mostrar from './components/Mostrarnoticia';
import Eliminar from './components/Eliminarnoticia';
import Update from './components/Updatenoticia';
import NoticiaC from './components/NoticiaC';
import "bootstrap/dist/css/bootstrap.min.css";

export default class App extends Component{
    addZero(i){
      var day=i;
      if(i<10){
        day = '0'+i;
      }
      return day;
    }
    fecha(){
      var hoy = new Date();
      var dd = hoy.getDate();
      var mm = hoy.getMonth();
      var yy = hoy.getFullYear();
      switch(mm){
        case 0: mm='Enero';break;
        case 1: mm='Febrero';break;
        case 2: mm='Marzo';break;
        case 3: mm='Abril';break;
        case 4: mm='Mayo';break;
        case 5: mm='Junio';break;
        case 6: mm='Julio';break;
        case 7: mm='Agosto';break;
        case 8: mm='Septiembre';break;
        case 9: mm='Octubre';break;
        case 10: mm='Noviembre';break;
        case 11: mm='Diciembre';break;
        default: mm='';break;
      }
      var dia = 'Fecha: '+this.addZero(dd)+' de '+mm+' del '+yy;
      return dia
    }
  render(){
    return (
      <Router>
        <div className="body1">
          <nav className="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div className="col-md-4">
              <div className="container">
                <img src={logo} alt="Cinque Terre"/>
                <Link to="/" className="navbar-brand">NEWS Noticias</Link>
              </div>
            </div>
            <div className="col-md-4">
              <div className="container">
                <center><p className="text-white">{this.fecha()}</p> </center>
              </div>
            </div>
            <div className="col-md-4">
              <div className="container">
                <button className="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                  <span className="navbar-toggler-icon"></span>
                </button>
                <div className="collapse navbar-collapse" id="navbarResponsive">
                  <ul className="navbar-nav ml-auto">
                    <li className="nav-item active">
                      <Link to="/" className="nav-link">INICIO
                        <span className="sr-only">(current)</span>
                      </Link>
                    </li>
                    <li className="nav-item">
                      <Link to="/deportes" className="nav-link">DEPORTES</Link>
                    </li>
                    <li className="nav-item">
                      <Link to="/politica" className="nav-link">POLITICA</Link>
                    </li>
                    <li className="nav-item">
                      <Link to="/espectaculos" className="nav-link">ESPECTACULOS</Link>
                    </li>
                    <li className="nav-item">
                      <Link to="/login" className="nav-link">LOGIN</Link>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </nav>
          <Switch>
            <Route path="/" exact component={index} />
            <Route path="/deportes" component={Deportes} />
            <Route path="/politica" component={Politica} />
            <Route path="/espectaculos" component={Espectaculos} />
            <Route path="/login" component={Login} />
            <Route path="/menu" component={Menu} />
            <Route path="/crearnoticia" component={Crear} />
            <Route path="/actualizarnoticia" component={Actualizar} />
            <Route path="/mostrar" component={Mostrar} />
            <Route path="/eliminar" component={Eliminar} />
            <Route path="/update/:id" component={Update} />
            <Route path="/noticia/:id" component={NoticiaC} />
          </Switch>
        </div>
      </Router>
    );
  }
}

