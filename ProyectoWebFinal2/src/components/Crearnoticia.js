import React, { Component } from 'react';
import logo from '../logo.png';
import "bootstrap/dist/css/bootstrap.min.css";
import db from '../FirestoreConfig';
import {Link} from "react-router-dom";

export default class Crearnoticia extends Component{
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
			Categoria: '',
			Titulo: '',
			Descripcion: '',
			Noticia: '',
			Url: '',
			Autor: '',
			Like: 0
		};
	}

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
      var hora = hoy.getHours();
      var minutos = hoy.getMinutes();
      var segundos = hoy.getSeconds();
      switch(mm){
        case 0: mm='enero';break;
        case 1: mm='febrero';break;
        case 2: mm='marzo';break;
        case 3: mm='abril';break;
        case 4: mm='mayo';break;
        case 5: mm='junio';break;
        case 6: mm='julio';break;
        case 7: mm='agosto';break;
        case 8: mm='septiembre';break;
        case 9: mm='octubre';break;
        case 10: mm='noviembre';break;
        case 11: mm='diciembre';break;
        default: mm='';break;
      }
      var dia = ''+this.addZero(dd)+' de '+mm+' de '+yy+' '+this.addZero(hora)+':'+this.addZero(minutos)+':'+this.addZero(segundos) ;
      return dia
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

		db.collection("noticias").add({
			Titulo: this.state.Titulo,
			Categoria: this.state.Categoria,
			Descripcion: this.state.Descripcion,
			Noticia: this.state.Noticia,
			Url: this.state.Url,
			Autor: this.state.Autor,
			Likes: this.state.Like,
			Fecha: this.fecha()
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
				  		<center><p class="text-white">Agregar Noticia</p></center>
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
		    	<div className="form-group">
			      	<label for="inputCategoria">Categoria</label>
			      	<select id="inputCategoria" REQUIRED className="form-control" name="Categoria" onChange={(e)=>this.onChangeCategoria(e)}>
			        	<option selected>Choose...</option>
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
		    		<p><input type="submit" name="boton" value="Agregar Noticia" className="btn btn-primary"/></p>
		  			<Link className="btn btn-primary" to="/menu"><p class="text-black">Regresar al Menu</p></Link>
		  		</div>
		  	</form>
		</div>
		);
	}
}