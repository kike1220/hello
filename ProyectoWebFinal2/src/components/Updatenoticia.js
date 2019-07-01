import React, { Component } from 'react';
import logo from '../logo.png';
import {Link} from "react-router-dom";
import "bootstrap/dist/css/bootstrap.min.css";
import db from '../FirestoreConfig';

export default class Updatenoticia extends Component{
	constructor(props){
		super(props);
		this.onChangeCategoria = this.onChangeCategoria.bind(this);
		this.onChangeTitulo = this.onChangeTitulo.bind(this);
		this.onChangeDescripcion = this.onChangeDescripcion.bind(this);
		this.onChangeNoticia = this.onChangeNoticia.bind(this);
		this.onChangeUrl = this.onChangeUrl.bind(this);
		this.onChangeAutor = this.onChangeAutor.bind(this);
		this.onSubmit = this.onSubmit.bind(this);

		this.state = {
			Id: '',
			Categoria: '',
			Titulo: '',
			Descripcion: '',
			Noticia: '',
			Url: '',
			Autor: '',
			Like: 0
		};
	}

    getNoticia(){
    	db.collection("noticias").get().then((snapShots)=> {
	      snapShots.docs.map( (doc)=>{if(doc.id === this.props.match.params.id){
	      	this.setState({
	      		Id: this.props.match.params.id,
	                Titulo: doc.data().Titulo,
	                Descripcion: doc.data().Descripcion,
	                Categoria: doc.data().Categoria,
	                Noticia: doc.data().Noticia,
	                Url: doc.data().Url,
	                Autor: doc.data().Autor,
	                Likes: doc.data().Likes,
	                Fecha: doc.data().Fecha
	      	})
	      }})
	    }).catch(function(error){
	      console.log(error);
	    })
	  }

	  componentDidMount(){
	    this.getNoticia();
	  }

	onChangeTitulo(e){
		this.setState({Titulo: e.target.value});
	}
	onChangeDescripcion(e){
		this.setState({Descripcion: e.target.value});
	}
	onChangeCategoria(e){
		this.setState({Categoria: e.target.value});
	}
	onChangeNoticia(e){
		this.setState({Noticia: e.target.value});
	}
	onChangeUrl(e){
		this.setState({Url: e.target.value});
	}
	onChangeAutor(e){
		this.setState({Autor: e.target.value});
	}
		
	onSubmit(e){
		e.preventDefault(e);

		db.collection("noticias").doc(this.state.Id).set({
			Titulo: this.state.Titulo,
			Categoria: this.state.Categoria,
			Descripcion: this.state.Descripcion,
			Noticia: this.state.Noticia,
			Url: this.state.Url,
			Autor: this.state.Autor,
			Likes: this.state.Like,
			Fecha: this.state.Fecha,
		}).then((docRef) =>{
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
		  	<h2>Actualizar Noticia</h2><br/><br/>
		  	<form enctype="multipart/form-data" onSubmit={(e) =>this.onSubmit(e)}>
		    	<div className="form-group">
			      	<label for="inputCategoria">Categoria</label>
			      	<select id="inputCategoria" REQUIRED className="form-control" name="Categoria" onChange={(e)=>this.onChangeCategoria(e)}>
			        	<option selected>{this.state.Categoria}</option>
			        	<option>Politica</option>
			        	<option>Espectaculos</option>
			        	<option>Deportes</option>
			      	</select>
			    </div>
			    <div className="form-group">
				    <label for="inputTitulo">Titulo: </label>
				    <input type="text" REQUIRED className="form-control" id="inputTitulo" name="titulo" value={this.state.Titulo} onChange={(e)=>this.onChangeTitulo(e)}/>
			  	</div>
			  	<div className="form-group">
				    <label for="Descripcion">Descripcion: </label>
				    <textarea className="form-control" REQUIRED id="Descripcion" rows="5" name="descripcion" value={this.state.Descripcion} onChange={(e)=>this.onChangeDescripcion(e)}></textarea>
			  	</div>
			  	<div className="form-group">
				    <label for="Noticia">Noticia: </label>
				    <textarea className="form-control" REQUIRED id="Noticia" rows="30" name="noticia" value={this.state.Noticia} onChange={(e)=>this.onChangeNoticia(e)}></textarea>
			  	</div>
		    	<div className="form-group">
				    <label for="Imagen">Insertar Url de la Imagen: </label>
				    <input type="text" className="form-control" id="Imagen" name="imagen" value={this.state.Url} onChange={(e)=>this.onChangeUrl(e)}/>
			  	</div>
			  	<div className="form-group">
				    <label for="inputAutor">Autor: </label>
				    <input type="text" REQUIRED className="form-control" id="inputAutor" name="autor" value={this.state.Autor} onChange={(e)=>this.onChangeAutor(e)}/>
			  	</div>
			  	<div className="container">
			    	<p><input type="submit" name="boton" value="Actualizar Noticia" className="btn btn-primary"/></p>
			    	<Link className="btn btn-primary" to="/menu"><p class="text-black">Regresar al Menu</p></Link>
			    </div>
		  	</form>
		</div>
		);
	}
}