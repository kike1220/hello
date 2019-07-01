import React, { Component } from 'react';
import logo from '../logo.png';
import {Link} from "react-router-dom";
import "bootstrap/dist/css/bootstrap.min.css";

export default class Actualizarnoticia extends Component{
	constructor(props){
		super(props);
		this.onChangeId = this.onChangeId.bind(this);
		this.onSubmit1 = this.onSubmit1.bind(this);
		this.state = {
			Id: '',
		};
	}

    onChangeId(e){
		this.setState({Id: e.target.value});
	}

	onSubmit1(e) {
		e.preventDefault(e);
      	this.props.history.push('/update/'+this.state.Id);
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
				  		<center><p class="text-white">Actualizar Noticia</p></center>
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
			 <h2>Buscar Noticia</h2><br/><br/>
		  	<form enctype="multipart/form-data" onSubmit={(e) =>this.onSubmit1(e)}>
		    	<div class="form-group">
				        <center><label for="inputId">Id de la Noticia </label></center>
				        <input type="text" REQUIRED class="form-control" id="inputId" name="id" value={this.state.Id} onChange={(e)=>this.onChangeId(e)}/>
			  	 </div>
			  	<div className="container">
			    	<p><input type="submit" name="boton" value="Buscar Noticia" className="btn btn-primary"/></p>
			    	<Link className="btn btn-primary" to="/menu"><p class="text-black">Regresar al Menu</p></Link>
			    </div>
		  	</form>
		</div>
		);
	}
}