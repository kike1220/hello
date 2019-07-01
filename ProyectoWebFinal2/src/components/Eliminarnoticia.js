import React, { Component } from 'react';
import logo from '../logo.png';
import "bootstrap/dist/css/bootstrap.min.css";
import db from '../FirestoreConfig';
import { Link } from "react-router-dom";

export default class Crearnoticia extends Component{
	constructor(props){
		super(props);
		this.onChangeId = this.onChangeId.bind(this);
		this.onSubmit = this.onSubmit.bind(this);

		this.state = {
			Id: ''
		};
	}

	onChangeId(e){
		this.setState({Id: e.target.value});
	}
		
	onSubmit(e){
		e.preventDefault(e);

		db.collection('noticias').doc(this.state.Id).delete().then(() =>{
			this.props.history.push('/Menu');
		}).catch(function(error){
			console.log(error);
		})
		
	}
	render(){
		return(
		<div className="container">
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
				  	<div class="col-md-4">
				  		<div class="container">
				  			<img src={logo} alt="Cinque Terre"/>
				  			<Link to="/" class="navbar-brand">NEWS Noticias</Link>
				  		</div>
				  	</div>

				  	<div class="col-md-4">
				  		<div class="container">
				  		<center><p class="text-white">Eliminar Noticia</p></center>
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
		  	<h2>Nueva Noticia</h2><br/><br/>
		  	<form enctype="multipart/form-data" onSubmit={(e) =>this.onSubmit(e)}>
		    	<div class="form-group">
				        <center><label for="inputId">Id de la Noticia </label></center>
				        <input type="text" REQUIRED class="form-control" id="inputId" name="id" value={this.state.Id} onChange={(e)=>this.onChangeId(e)}/>
			  	 </div>
		    	<p><input type="submit" name="boton" value="Eliminar Noticia" className="btn btn-primary"/></p>
		  	</form>
		</div>
		);
	}
}