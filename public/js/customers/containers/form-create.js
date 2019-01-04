import React, { Component } from 'react';
import FormCreate from './../components/form-create.js';


class Form extends Component{
	constructor(props) {
        super(props);
        this.state = {
        	token: ''
        }
        this.getToken();
    }
    clearForm(){
    	document.getElementById("create-customer-form").reset();
    }
    getToken() {
		$.ajax({
	        type: "POST",
	        url: "/customers/gettoken",
	        data: '',
	        success: function(response) {
	            if (response) {
	            	var array = response.split('[_token]" value="');
	            	var array = array[1].split('"');
	            	var token = array[0];
	            	this.setState({token: token})
	            }
	        }.bind(this),
		    error: function (XMLHttpRequest, textStatus, errorThrown) {
		        console.log('Error : ' + errorThrown);
		    }
	    });
	}
	send = () => {
		//console.log(this.state.token);
		var form = $('#create-customer-form').serialize();
		console.log(form);
		$.ajax({
	        type: "POST",
	        url: "/customers/post",
	        data: form,
	        async: true,
	        success: function(response) {
	            if(response == 'yes'){
	            	alert('Se creo correctamente');
	            }
	            else{
	            	alert('No se creo correctamente');	
	            }
	            
	        },
		    error: function (XMLHttpRequest, textStatus, errorThrown) {
		        console.log('Error3 : ' + errorThrown);
		    }
	    });
	}
	render()  {
		return (
			<FormCreate send={this.send} token={this.state.token} clearForm={this.clearForm} />
		)
		
	}
}

export default Form;
