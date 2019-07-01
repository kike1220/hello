import React, { Component } from 'react';
import logo from '../logo.png';
import {Link} from "react-router-dom";
import "bootstrap/dist/css/bootstrap.min.css";

export default class Login extends Component{
	render(){
		return(
			<div className="body">
		    	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
				  	<div class="col-md-4">
				  		<div class="container">
				  			<img src={logo} alt="Cinque Terre"/>
				  			<a class="navbar-brand" href="http://localhost:3000">NEWS Noticias</a>
				  		</div>
				  	</div>

				  		<div class="col-md-4">
				  		<div class="container">
				  		<center><p class="text-white">Actualizacion de noticias</p></center>
				  		</div>
				  	</div>


				  	<div class="col-md-4">
				    	<div class="container">
				      		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				        		<span class="navbar-toggler-icon"></span>
				      		</button>
				      		
				    	</div>
				    </div>
			 	</nav>

			    <div class="container">
				    <br/><br/><br/><br/>
				    <br/><br/><br/>
				    
				    <Link className="btn btn-primary btn-lg btn-block" to="/crearnoticia"><p class="text-black">Agregar noticia</p></Link>
				    <Link className="btn btn-primary btn-lg btn-block" to="/actualizarnoticia"><p class="text-black">Modificar noticia</p></Link>
				    <Link className="btn btn-primary btn-lg btn-block"  to="/eliminar"><p class="text-black">Eliminar noticia</p></Link>
				    <Link className="btn btn-primary btn-lg btn-block"  to="/mostrar"><p class="text-black">Mostrar Noticias</p></Link>
				    <Link className="btn btn-primary btn-lg btn-block" to="/Login"><p class="text-black">Salir</p></Link>
				</div>
			</div>
		);
	}
}