import React, { Component } from 'react';
import '../App.css';
import gmail from '../gmail.png';
import twitter from '../twitter.png';
import db from '../FirestoreConfig';
import facebook from '../facebook.png';
import "bootstrap/dist/css/bootstrap.min.css";

export default class NoticiaC extends Component{
  constructor(props){
    super(props);
    this.onChangeComentario = this.onChangeComentario.bind(this);
    this.onSubmit = this.onSubmit.bind(this);
    this.state = {
      Id: '',
      Categoria: '',
      Titulo: '',
      Descripcion: '',
      Noticia: '',
      Url: '',
      Fecha: '',
      Autor: '',
      like: 0,
      Comentarios: [],
      Comentario: ''
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


  onChangeComentario(e){
    this.setState({Comentario: e.target.value});
  }

  getNoticias(){
    db.collection("noticias").get().then((snapShots)=> {
      snapShots.docs.map( (doc)=>{if(doc.id === this.props.match.params.id){
        this.setState({
          Id: this.props.match.params.id,
          Titulo: doc.data().Titulo,
          Descripcion: doc.data().Descripcion,
          Categoria: doc.data().Categoria,
          Noticia: doc.data().Noticia,
          Url: doc.data().Url,
          Fecha: doc.data().Fecha,
          Autor: doc.data().Autor,
          like: doc.data().Likes,
        })
      }})
    }).catch(function(error){
      console.log(error);
    })
    db.collection("comentarios").orderBy("Fecha","desc").get().then((snapShots)=> {
      this.setState({Comentarios: snapShots.docs.map( doc=>{return{ id: doc.id,data: doc.data()}})})
    }).catch(function(error){
      console.log(error);
    })
  }

  updateComentarios(){
    db.collection("comentarios").orderBy("Fecha","desc").get().then((snapShots)=> {
      this.setState({Comentarios: snapShots.docs.map( doc=>{return{ id: doc.id,data: doc.data()}})})
    }).catch(function(error){
      console.log(error);
    })
    this.render(); 
  }

  btnlike(){
    db.collection("noticias").doc(this.state.Id).set({
      Titulo: this.state.Titulo,
      Categoria: this.state.Categoria,
      Descripcion: this.state.Descripcion,
      Noticia: this.state.Noticia,
      Url: this.state.Url,
      Likes: this.state.like+1,
      Fecha: this.state.Fecha,
      Autor: this.state.Autor,
    }).then((docRef)=>{
      this.setState({
        like: this.state.like+1
      })
    }).catch(function(error){
      console.log(error);
    })
    this.componentDidUpdate();
  }

  mostrarcomentario(){
    var temp = [];
    this.state.Comentarios.map((object,i)=>{
      if(object.data.idnoticia === this.state.Id){
        temp.push(object.data);
      }
    })
    return temp.map((object)=>
      <div class="card my-4">
        <div class="card-body">
          <p class="font-italic">Fecha y Autor del comentario: {object.Fecha} por Anonimo</p>
          <p class="font-italic">Comentario: {object.comentario}</p>
        </div>
      </div>
    )
  }

  onSubmit(e) {
    e.preventDefault(e);
    db.collection("comentarios").add({
      comentario: this.state.Comentario,
      idnoticia: this.state.Id,
      Fecha: this.fecha(),
    }).catch(function(error){
      console.log(error)
    })
    this.setState({
      comentario: '',
    })
  }

  componentDidUpdate(){
    this.updateComentarios();
  }

  componentDidMount(){
    this.getNoticias();
  }
  render(){
    return (
      <div class="body">
        <div class="container">
          <div class="card mb-3">
            <h1 class="card-title">{this.state.Titulo}</h1>
            <img class="card-img-top" src={this.state.Url} alt="Cinque Terre"/>
            <div class="card-body">
              <h5 class="card-title">{this.state.Descripcion}</h5>
              <p class="card-text">{this.state.Noticia}</p>
              <p class="card-text"><small class="text-muted">Fecha y Hora de publicación: {this.state.Fecha}</small></p>
              <p class="card-text"><small class="text-muted">Autor: {this.state.Autor}</small></p>
              <p class="card-text"><small class="text-muted">Likes: {this.state.like}</small></p>
            </div>
          </div>
          <form onSubmit={(e)=>this.onSubmit(e)}>
                  <div class="form-group">
                    <label for="comment">Comentar:</label>
                    <textarea class="form-control" REQUIRED rows="3" id="comment" name="comentario" value={this.state.Comentario} onChange={(e)=>this.onChangeComentario(e)}></textarea>
                    <div class="container">
                        <br/>
                        <input type="submit" class="btn btn-primary" value="Escribir"/>
                        <button type="button" class="btn btn-primary" onClick={()=>this.btnlike()}>Me gusta</button>                  
                      </div>
                  </div>
          </form>
      </div>
      <div class="container">
        {this.mostrarcomentario()}
      </div>

      <footer class="py-5 bg-dark">

        <div class="row">

            <div class="col-md-8">
              <div class="container">
                <center><p class="m-0 text-center text-white">Copyright &copy; NEWS Noticias 2019</p></center>   
              </div>
            </div>



            <div class="col-md-.5">
                <div class="container">
                  <img src={facebook} class="img-responsive center-block" alt="Cinque Terre"/>
                </div>
            </div>

            <div class="col-md-.5">
                <div class="container">
                  <img src={gmail} class="img-responsive center-block" alt="Cinque Terre"/>
                </div>
            </div>

            <div class="col-md-.5">
                <div class="container">
                  <img src={twitter} class="img-responsive center-block" alt="Cinque Terre" />
                </div>
            </div>
        
        </div>
      </footer>
    </div>
    );
  }
}

