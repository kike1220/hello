import React, { Component } from 'react';
import logo from '../logo.png';
import "bootstrap/dist/css/bootstrap.min.css";
import db from '../FirestoreConfig';
import {Link} from "react-router-dom";

export default class Mostrar extends Component{
	constructor(props){
	    super(props);

	    this.state = {
	      noticias : [],
	    };
	}
	getNoticias(){
	    db.collection("noticias").get().then((snapShots)=> {
	      this.setState({ noticias: snapShots.docs.map( doc=>{return{ id: doc.id,data: doc.data()}})})
	    }).catch(function(error){
	      console.log(error);
	    })
	}
	mostrar(){
		return this.state.noticias.map((object,i)=>
			<tr>
			<td>{object.id}</td>
			<td>{object.data.Categoria}</td>
		    <td>{object.data.Titulo}</td>
			<td>{object.data.Descripcion}</td>
			<td><img src={object.data.Url} height="100px" width="100px" alt="Cinque Terre"/></td>
			<td>{object.data.Autor}</td>
			<td>{object.data.Fecha}</td>
			<td>{object.data.Likes}</td>
			</tr>
		)
	}
	componentDidMount(){
	    this.getNoticias();
	}
	render(){
		return(
		<div className="body">
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
				  	<div class="col-md-4">
				  		<div class="container">
				  			<img src={logo} alt="Cinque Terre"/>
				  			<Link to="/" class="navbar-brand">NEWS Noticias</Link>
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
		  	<h2>Mostrar Noticias</h2><br/><br/>
				<table border="2">
					<thead class="thead-dark">  
						<tr>
							<th>Id</th>
							<th>Categoria</th>
							<th>Titulo</th>
							<th>Descripción</th>
							<th>Imagen</th>
							<th>Autor</th>
							<th>Fecha</th>
							<th>Likes</th>
						</tr>
					</thead>
					<tbody>
						{this.mostrar()}
					</tbody>
				</table>
				<center><Link to="/menu">Regresar al menu</Link></center>
		</div>
		);
	}
}