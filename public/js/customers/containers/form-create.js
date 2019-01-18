import React, { Component } from 'react';
import FormCreate from './../components/form-create.js';
import AlertSuccess from './../../page/components/alert-success.js';
import AlertDanger from './../../page/components/alert-danger.js';


class Form extends Component{
	state = {
    	token: '',
    	successDiv: false,
    	errorDiv: false,
    	customerID: 0,
    	addressId: 0
    }
	constructor(props) {
        super(props);
        this.validateCustomers = this.validateCustomers.bind(this);
        this.getToken();
        this.init();
    }
    init(){
    	$.ajax({
	        type: "POST",
	        url: "/customers/getinit",
	        data: '',
	        success: function(response) {
	        	console.log(response);
	        	this.disableForm();
	            var docidTypes = response[0];
	            var countries = response[1];
	            var levels = response[2];
	            var neighborhoods = response[3];
	            if(docidTypes){
		            var x = this._('customers1_idDocidTypes');
  					for (var i = 0; i < docidTypes.length; i++){
  						var option = document.createElement('option');
  						option.text = docidTypes[i].name;
		            	option.value = docidTypes[i].id;
  						x.add(option);
	                }
	            }
	            if(countries){
		            var x = this._('addresses_idSyCountries');
  					for (var i = 0; i < countries.length; i++){
  						var option = document.createElement('option');
  						option.text = countries[i].name;
		            	option.value = countries[i].id;
  						x.add(option);
	                }
	            }
	            if(neighborhoods){
		            var x = this._('addresses_idSyNeighborhoods');
  					for (var i = 0; i < neighborhoods.length; i++){
  						var option = document.createElement('option');
  						option.text = neighborhoods[i].name;
		            	option.value = neighborhoods[i].id;
  						x.add(option);
	                }
	            }
	            if(levels){
		            var x = this._('addresses_idSocioeconomicLevels');
  					for (var i = 0; i < levels.length; i++){
  						var option = document.createElement('option');
  						option.text = levels[i].name;
		            	option.value = levels[i].id;
  						x.add(option);
	                }
	            }
	        }.bind(this),
		    error: function (XMLHttpRequest, textStatus, errorThrown) {
		        console.log('Error : ' + errorThrown);
		    }
	    });

    }
    getStates = (event) =>{
    	var countryId = event.target.value;
    	$.ajax({
	        type: "POST",
	        url: "/sy/states/getstates",
	        data: {
		           countryId: countryId,
		        },
	        success: function(response) {
	        	console.log(response);
	            var states = response;
	            var x = this._('addresses_idSyStates');
	            this.cleanSelect('addresses_idSyStates', 'Seleeciona el Departamento');
	            this.cleanSelect('addresses_idSyCities', 'Seleeciona el Ciudad');
	            this.cleanSelect('addresses_idSyNeighborhoods', 'Seleeciona el Barrio');
	            if(states){
  					for (var i = 0; i < states.length; i++){
  						var option = document.createElement('option');
  						option.text = states[i].name;
		            	option.value = states[i].id;
  						x.add(option);
	                }
	            }
	        }.bind(this),
		    error: function (XMLHttpRequest, textStatus, errorThrown) {
		        console.log('Error : ' + errorThrown);
		    }
	    });

    }
    getCities = (event) =>{
    	var stateId = event.target.value;
    	$.ajax({
	        type: "POST",
	        url: "/sy/cities/getcities",
	        data: {
		        stateId: stateId,
		    },
	        success: function(response) {
	        	console.log(response);
	            var cities = response;
	            var x = this._('addresses_idSyCities');
	            this.cleanSelect('addresses_idSyCities', 'Seleeciona el Ciudad');
	            this.cleanSelect('addresses_idSyNeighborhoods', 'Seleeciona el Barrio');
	            if(cities){
  					for (var i = 0; i < cities.length; i++){
  						var option = document.createElement('option');
  						option.text = cities[i].name;
		            	option.value = cities[i].id;
  						x.add(option);
	                }
	            }
	        }.bind(this),
		    error: function (XMLHttpRequest, textStatus, errorThrown) {
		        console.log('Error : ' + errorThrown);
		    }
	    });

    }
    getNeighborhoods = (event) =>{
    	var cityId = event.target.value;
    	$.ajax({
	        type: "POST",
	        url: "/sy/neighborhoods/getneighborhoods",
	        data: {
		        cityId: cityId,
		    },
	        success: function(response) {
	        	console.log(response);
	            var neighborhoods = response;
	            var x = this._('addresses_idSyNeighborhoods');
	            this.cleanSelect('addresses_idSyNeighborhoods', 'Seleeciona el Barrio');
	            if(neighborhoods){
  					for (var i = 0; i < neighborhoods.length; i++){
  						var option = document.createElement('option');
  						option.text = neighborhoods[i].name;
		            	option.value = neighborhoods[i].id;
  						x.add(option);
	                }
	            }
	        }.bind(this),
		    error: function (XMLHttpRequest, textStatus, errorThrown) {
		        console.log('Error : ' + errorThrown);
		    }
	    });

    }
    cleanSelect(pId, pText){
    	var x = this._(pId);
        x.innerHTML = '';
        var option = document.createElement('option');
        option.text = pText;
        option.value = '';
        x.add(option);
    }
    clearForm(){
    	document.getElementById("create-customer-form").reset();
    }
    validateCustomers(){
    	var fields = ['customers1_docid', 'customers1_firstName' , 'customers1_lastName', 'customers1_phone', 'customers1_email', 'customers1_reference1', 'customers1_phoneReference1', 'customers1_coordinates'];
    	for (var i = 0; i < fields.length; i++) {
            if(this.sringIsEmpty(this._(fields[i]).value) && this._(fields[i]).parentElement.getElementsByTagName('em').length == 0){
                this._(fields[i]).parentElement.innerHTML += '<em class="invalid">Este campo es necesario.</em>' 
                this._(fields[i]).parentElement.classList.add('state-error');
            }
        }
    }
    sringIsEmpty(str) {
        str = str.trim();
        if(str == null)
            return true;
        else if(str.length === 0)
            return true;
        else if(str.length > 0 )
            return false;
    }
    v(p_id){
    	return document.getElementById(p_id).value;
    }
    _v(p_id, p_value){
    	document.getElementById(p_id).value = p_value;
    }
    _(p_id){
    	return document.getElementById(p_id);
    }
    disableForm(){
    	var form = document.getElementById("create-customer-form");
		var elements = form.elements;
		for (var i = 0, len = elements.length; i < len; ++i) {
			if (elements[i].id) {	
				elements[i].id != 'customers1_docid' ? elements[i].disabled = true : elements[i].disabled = false;
			}    
		}
    }
    enableForm(){
    	var form = document.getElementById("create-customer-form");
		var elements = form.elements;
		for (var i = 0, len = elements.length; i < len; ++i) {
			if (elements[i].id) {	
					elements[i].disabled = false;
			}
		    
		}
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
	            	this.setState({token: token});
	            }
	        }.bind(this),
		    error: function (XMLHttpRequest, textStatus, errorThrown) {
		        console.log('Error : ' + errorThrown);
		    }
	    });
	    //document.getElementById("customers1_email").reset();
	}
	handleFocus = (event) =>{
		var x = event.target;
		if (x.parentElement.getElementsByTagName('em').length > 0) {
			var parent = x.parentElement;
			parent.classList.remove('state-error');
			parent.removeChild(parent.childNodes[parent.childNodes.length-1]); 
		}
	}
	handleKeyUp = (event) =>{
		var x = event.target;
		if(event.which == 13){
         	if (x.id == "customers1_docid") {
         		this._('customers1_docid').blur();
         		this._('customers1_idDocidTypes').focus();
         	}   
		}
	}
	getCustomer = (event) =>{
    	var docid = event.target.value;
    	event.target.value = docid;
    	this.clearForm();
    	console.log(docid);
    	if (docid != '') {
    		this.enableForm();
    		$.ajax({
		        type: "POST",
		        url: "/customers/getcustomer",
		        data: {
		           docid: docid,
		        },
		        success: function(response) {
		        	console.log(response);
		        	var customer = response;
		        	if (customer) {
		        		this._v('customers1_idDocidTypes' , customer.idDocidTypes);
		        		this._v('customers1_firstName' , customer.firstName);
		        		this._v('customers1_lastName' , customer.lastName);
		        		this._v('customers1_phone' , customer.phone);
		        		this._v('customers1_email' , customer.email);
		        		this._v('customers1_reference1' , customer.reference1);
		        		this._v('customers1_phoneReference1' , customer.phoneReference1);
		        		this._v('customers1_coordinates' , customer.coordinates);
		        		this.setState({customerID: customer.id});
		        		console.log(this.state.customerID);
		        	}
		        	else{
		        		this.setState({customerID: ''});
		        	}
		        }.bind(this),
			    error: function (XMLHttpRequest, textStatus, errorThrown) {
			        console.log('Error : ' + errorThrown);
			    }
		    });
    	}
    	else{
    		this.disableForm();
    	}
	    	

    }
	send = () => {
		var form = $('#create-customer-form').serialize();
		var fields = ['customers1_idDocidTypes', 'customers1_docid', 'customers1_firstName' , 'customers1_lastName', 'customers1_phone', 'customers1_email', 'addresses_idSyNeighborhoods', 'addresses_idSocioeconomicLevels', 'addresses_address1'];
		form += '&customerID=' + this.state.customerID;
		var text = this.state.customerID ? 'Editado' : 'Creado';
		console.log(form);
    	for (var i = 0; i < fields.length; i++) {
            if(this.sringIsEmpty(this._(fields[i]).value) && this._(fields[i]).parentElement.getElementsByTagName('em').length == 0){
                this._(fields[i]).parentElement.innerHTML += '<em class="invalid">Este campo es necesario.</em>' 
                this._(fields[i]).parentElement.classList.add('state-error');
            }
        }

		if(this._('create-customer-form').getElementsByTagName('em').length == 0){
			console.log('entre');
			$.ajax({
		        type: "POST",
		        url: "/customers/post",
		        data: form,
		        async: true,
		        success: function(response) {
		        	console.log(response);
		        	var result = response[0];
		            if(result == 'yes' && response[1] > 0){
		            	this.setState({successDiv: true, title: "Cliente " + text +" Correctamente!", text: "El cliente fue creado Correctamente"});
		            	var x = this._('div-alert-success').focus();
		            	this.setState({customerID: response[1]});
		            	setTimeout(function(){
	                        this.setState({successDiv: false});
	                    }.bind(this), 8000);
	                    console.log(this.state.customerID);
		            }
		            else if(result.indexOf('unique_customer_docid') !== -1){
		            	this.setState({errorDiv: true, title: "Cliente No Fue " + text +"!", text: "El cliente no fue creado, ya existe un cliente con el mismo correo."});
		            	var x = this._('div-alert-error').focus();
		            	setTimeout(function(){
	                        this.setState({errorDiv: false});
	                    }.bind(this), 8000);
		            }
		            else{
		            	this.setState({errorDiv: true, title: "Cliente No Fue " + text +"!", text: "El cliente no fue creado, por favor revise la informacion y vuelvalo a intentar"});
		            	var x = this._('div-alert-error').focus();
		            	setTimeout(function(){
	                        this.setState({errorDiv: false});
	                    }.bind(this), 8000);
		            }
		            
		        }.bind(this),
			    error: function (XMLHttpRequest, textStatus, errorThrown) {
			        console.log('Error3 : ' + errorThrown);
			    }
		    });
		}
	}
	render()  {
		return (
			<div>
			{this.state.successDiv ? <AlertSuccess title={this.state.title} text={this.state.text}/> : null}
			{this.state.errorDiv ? <AlertDanger title={this.state.title} text={this.state.text}/> : null}
			<FormCreate 
				send={this.send}
				token={this.state.token}
				clearForm={this.clearForm}
				getCustomer={this.getCustomer}
				handleFocus={this.handleFocus} 
				handleKeyUp={this.handleKeyUp} 
				getStates={this.getStates}
				getCities={this.getCities}
				getNeighborhoods={this.getNeighborhoods}
			/>
			</div>
		)
		
	}
}

export default Form;
