import React, { Component } from 'react';
import '../App.css';
import {Link} from "react-router-dom";
import anuncio1 from '../anuncio1.png';
import db from '../FirestoreConfig';
import anuncio2 from '../anuncio2.png';
import "bootstrap/dist/css/bootstrap.min.css";

export default class index extends Component{
  constructor(props){
    super(props);

    this.state = {
      noticias : []
    };
  }

  getNoticias(){
    db.collection("noticias").orderBy("Fecha","desc").get().then((snapShots)=> {
      this.setState({ noticias: snapShots.docs.map( doc=>{return{ id: doc.id,data: doc.data()}})})
    }).catch(function(error){
      console.log(error);
    })
  }

  mostrar(){
    var tmp = [];
    this.state.noticias.map((object,i)=>{
        if(i<3){
          tmp.push(object);
        }
        i=i+1;
      }
    )
    return tmp.map((object)=>
          <div className="card mb-4">
          <img className="card-img-top" src={object.data.Url} alt="Cinque Terre"/>
          <div className="card-body" >
            <h2 className="card-title">{object.data.Titulo}</h2>
            <p className="card-text">{object.data.Descripcion}</p>
            <Link to={"/noticia/"+object.id} className="btn btn-primary" >Mostrar más &rarr;</Link>
          </div>
          <div className="card-footer text-muted">
            <p>{object.data.Fecha} by {object.data.Autor}</p>
          </div>
        </div>);
  }

  mostrar1(){
    var tmp = [];
    this.state.noticias.map((object,i)=>{
        if(i<6){
          tmp.push(object);
        }
        i=i+1;
      }
    )
    return tmp.map((object)=>
      <div className="card my-4">
        <h6 className="card-header">{object.data.Fecha}</h6>
        <div className="card-body">
          <Link to={"/noticia/"+object.id} className="font-italic">{object.data.Titulo}</Link>
        </div>
      </div>
      );
  }

  componentDidMount(){
    this.getNoticias();
  }
  render(){
    return (
      <div className="secciones">
        <div className="container">
          <div className="row">
              <div className="col-md-8">
                <h1 className="my-4">Noticias<br/>
                    <small>Las mas recientes del día</small>
                </h1>
                {this.mostrar()}    
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
                      <img src={anuncio2} className="img-rounded" alt="Cinque Terre" width="304" height="236"/>
                    </div>
                </div>

                <div className="card my-4">
                    <div className="card-body">
                      <img src={anuncio1} className="img-rounded" alt="Cinque Terre" width="304" height="236"/>
                    </div>
                </div>
            </div>
          </div>
        </div>

        <footer className="py-5 bg-dark" width="100%">
          <div className="container">
              <p className="m-0 text-center text-white">Copyright &copy; NEWS Noticias 2019</p>
          </div>
        </footer>
      </div>
    );
  }
}

