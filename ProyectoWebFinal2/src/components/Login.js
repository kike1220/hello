import React, { Component } from 'react';
import "bootstrap/dist/css/bootstrap.min.css";
import db from '../FirestoreConfig';
import { Link } from "react-router-dom";

export default class Login extends Component{
	constructor(props){
		super(props);
		this.onChangeCorreo = this.onChangeCorreo.bind(this);
		this.onChangePassword = this.onChangePassword.bind(this);
		this.onSubmit = this.onSubmit.bind(this);

		this.state = {
			admins : [],
			correo: '',
			password: '',

		};
	}

	getAdmin(){
		db.collection("administrador").get().then((snapShots)=> {
			this.setState({ admins: snapShots.docs.map( doc=>{return{ id: doc.id,data: doc.data()}})})
		}).catch(function(error){
			console.log(error);
		})
	}

	componentDidMount(){
		this.getAdmin();
	}

	onChangeCorreo(e){
		this.setState({correo: e.target.value});
	}

	onChangePassword(e){
		this.setState({password: e.target.value});
	}

	onSubmit(e){
		const email = this.state.correo;
		const pass = this.state.password;
		var band = 0;
		e.preventDefault(e);
		this.state.admins.map((object,i)=>{
			if(object.data.email === email && object.data.contraseña === pass){
				band=1;
			}
		})
		if(band === 1){
			this.props.history.push('/Menu');
		}
	}
	render(){
		return(
			<div className="body">
		    	<center><h2>LOGIN</h2><br/><br/></center>
		    	<div className="container">
				  	<form onSubmit={(e)=>this.onSubmit(e)}>
				  	    <div className="input-group">
			                <span className="input-group-addon"><i className="glyphicon glyphicon-user"></i></span>
			                <input type="email" className="form-control" id="email" placeholder="Enter email" name="email" value={this.state.correo} onChange={(e) => this.onChangeCorreo(e)}/>
			            </div>
			            <div className="input-group">
			                <span className="input-group-addon"><i className="glyphicon glyphicon-lock"></i></span>
			                <input type="password" className="form-control" id="pwd" placeholder="Password" name="password" value={this.state.password} onChange={(e) => this.onChangePassword(e)}/>
			            </div><br/><br/>
				        <center><input type="submit" className="btn btn-primary" value="Iniciar sesión"/>
				        <Link to="/" className="btn btn-primary" >REGRESAR AL MENU</Link></center>
				  	</form>
				</div>
			</div>
		);
	}
}