import React, { Component } from 'react';
import '../App.css';
import { Link } from "react-router-dom";
import "bootstrap/dist/css/bootstrap.min.css";
import db from '../FirestoreConfig';
import anuncio1 from '../anuncio2.png';
import anuncio2 from '../anuncio4.png';
import anuncio5 from '../anuncio1.png';

export default class Politica extends Component{
	constructor(props){
	    super(props);
	    this.orden = 0;
	    this.state = {
	      noticias : [],
	      Politica: []
	    };
	  }

	getNoticias(){
		var tmpnoticias = [];
	    db.collection("noticias").orderBy("Fecha","desc").get().then((snapShots)=> {
	      snapShots.docs.map( (doc)=>{if(doc.data().Categoria === "Politica"){
	      	tmpnoticias.push(doc);
	      }})
	      this.setState({Politica: tmpnoticias})
	    }).catch(function(error){
	      console.log(error);
	    })
	    var tmpnPolitica = [];
	    db.collection("noticias").orderBy("Likes","desc").get().then((snapShots)=> {
	      snapShots.docs.map( (doc)=>{if(doc.data().Categoria === "Politica"){
	      	tmpnPolitica.push(doc);
	      }})
	      this.setState({noticias: tmpnPolitica})
	    }).catch(function(error){
	      console.log(error);
	    })
	}

	mostrar1(){
	    var tmp = [];
	    this.state.Politica.map((object,i)=>{
	    	if(i<6){
	    		tmp.push(object);
	    	}
	    })
	    return tmp.map((object)=>
	        <div className="card my-4">
				<h6 className="card-header">{object.data().Fecha}</h6>
			    <div className="card-body">
				   	<Link to={"/noticia/"+object.id} className="font-italic">{object.data().Titulo}</Link>
				</div>  
	        </div>
	    )
	}

	mostrar(){
	    var tmp = [];
	    this.state.noticias.map((object,i)=>{
	    	if(i<3){
	    		tmp.push(object);
	    	}
	    })
	    return tmp.map((object,i)=>
			<div className= "card" >
			    <img className= "img-thumbnail" height="200px" width="220px" src={object.data().Url} alt="Cinque Terre"/> 
			    <div className= "card-body" > 
			        <h5 className="card-title">{object.data().Titulo}</h5>
			        <p className="card-text">{object.data().Descripcion}</p>
			        <Link to={"/noticia/"+object.id} className="btn btn-secondary"> Leer mas... </Link>
			    </div> 
			    <div className= "card-footer" >
			       	<small className="text-muted">{object.data().Autor}</small> 
			    </div> 
			</div>
		);
	}

	mostrarcarrusel(){
	    var tmp = [];
	    this.state.noticias.map((object,i)=>{
	    	if(i===0){
	    		tmp.push(object);
	    	}
	    })
	    return tmp.map((object,i)=>
			<div className= "carousel-item active" > 
				<img className="d-block w-100" src={object.data().Url} alt="First slide"/> 
				<div className= "carousel-caption d-none d-md-block" > 
				    <h5>{object.data().Titulo}</h5>
				</div>
		   	</div> 
		);
	}

	mostrar2(){
	    var tmp = [];
	    this.state.noticias.map((object,i)=>{
	    	if(i>=3 && i<6){
	    		tmp.push(object);
	    	}
	    })
	    return tmp.map((object,i)=>
			<div className= "card" >
			    <img className= "img-thumbnail" height="200px" width="220px" src={object.data().Url} alt="Cinque Terre"/> 
			    <div className= "card-body" > 
			        <h5 className="card-title">{object.data().Titulo}</h5>
			        <p className="card-text">{object.data().Descripcion}</p>
			        <Link to={"/noticia/"+object.id} className="btn btn-secondary"> Leer mas... </Link>
			    </div> 
			    <div className= "card-footer" >
			       	<small className="text-muted">{object.data().Autor}</small> 
			    </div> 
			</div>
		);
	}

	mostrar3(){
	    var tmp = [];
	    this.state.noticias.map((object,i)=>{
	    	if(i>=6 && i<8){
	    		tmp.push(object);
	    	}
	    })
	    return tmp.map((object,i)=>
			<div className= "card" >
			    <img className= "img-thumbnail" height="200px" width="100%" src={object.data().Url} alt="Cinque Terre"/> 
			    <div className= "card-body" > 
			        <h5 className="card-title">{object.data().Titulo}</h5>
			        <p className="card-text">{object.data().Descripcion}</p>
			        <Link to={"/noticia/"+object.id} className="btn btn-secondary"> Leer mas... </Link>
			    </div> 
			    <div className= "card-footer" >
			       	<small className="text-muted">{object.data().Autor}</small> 
			    </div> 
			</div>
		);
	}

	componentDidMount(){
	    this.getNoticias();
	}
	render(){
		return(
		<div className="secciones">
			<div className="container">
				<div className="row">
				    <div className="col-md-8">
				        <h1 className="my-4">Politica</h1>
				        <h3 className="my-4">Noticia más destacada</h3>
				        <div id= "carouselExampleIndicators" className= "carousel slide" data-ride= "carousel"> 
				           	<div className= "carousel-inner" > 
					            {this.mostrarcarrusel()}
				        	</div>  
				        </div>

				       

				        <div className="card mb-4">
				            <div className= "card-deck" >
				            	{this.mostrar()} 
				        	</div>
				        </div>

				        <div className="card mb-4">
				            <div className= "card-deck" >
				            	{this.mostrar2()} 
				        	</div>
				        </div>

				        <div className="card mb-4">
				            <div className= "card-deck" >
				            	{this.mostrar3()} 
				        	</div>
				        </div>

				    </div>
				    <div className="col-md-4">
			            <div className="card my-4">
							<h5 className="card-header">Últimas</h5>
			                <div className="card-body">
				                <div className="input-group">
		    		                <p>ÚLTIMAS</p>
						        </div>
				            </div>
				        </div>
						{this.mostrar1()}            
						<div className="card my-4">
						    <div className="card-body">
						        <img src={anuncio5} className="img-rounded" alt="Cinque Terre" width="304" height="236"/>
						    </div>
				        </div>
				        <div className="card my-4">
						    <div className="card-body">
						        <img src={anuncio1} className="img-rounded" alt="Cinque Terre" width="304" height="236"/>
						    </div>
				        </div>
				        <div className="card my-4">
						    <div className="card-body">
						        <img src={anuncio2} className="img-rounded" alt="Cinque Terre" width="304" height="236"/>
						    </div>
				        </div>               
					</div>
				</div>
			</div>
	  
		<footer className="py-5 bg-dark">
		    <div className="container">
		      <p className="m-0 text-center text-white">Copyright &copy; NEWS Noticias 2019</p>
		    </div>
		</footer>
	</div>
		);
	}
}