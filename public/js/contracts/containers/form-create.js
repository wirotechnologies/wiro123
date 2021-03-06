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
        //this.validateCustomers = this.validateCustomers.bind(this);
        this.init();
    }
    init(){
    	$.ajax({
	        type: "GET",
	        url: "/api/init",
	        data: '',
	        success: function(response) {
	        	console.log(response);
	        	this.disableForm();
	            var docidTypes = response[0];
	            var countries = response[1];
	            var levels = response[2];
	            var neighborhoods = response[3];
	            var token = response[4];
    			
	            if (token) {
	            	console.log(token);
	            	this.setState({token: token});
	            }
	            if(docidTypes){
		            var x = this._('customers_idDocidTypes');
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
	        type: "GET",
	        url: "/api/sy_states",
	        data: {
		           idSyCountries: countryId,
		        },
	        success: function(response) {
	        	console.log(response);
	        	var states = response['hydra:member'];
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
	        type: "GET",
	        url: "/api/sy_cities",
	        data: {
		        idSyStates: stateId,
		    },
	        success: function(response) {
	        	console.log(response);
	            var cities = response['hydra:member'];
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
	        type: "GET",
	        url: "/api/sy_neighborhoods",
	        data: {
		        cityId: cityId,
		    },
	        success: function(response) {
	        	console.log(response);
	            var neighborhoods = response['hydra:member'];
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
    _(p_id){
    	return document.getElementById(p_id);
    }
    _v(p_id, p_value){
    	document.getElementById(p_id).value = p_value;
    }
    disableForm(){
    	var form = document.getElementById("create-customer-form");
		var elements = form.elements;
		for (var i = 0, len = elements.length; i < len; ++i) {
			if (elements[i].id) {	
				elements[i].id != 'customers_docid' ? elements[i].disabled = true : elements[i].disabled = false;
			}    
		}
    }
    enableForm(){
    	var form = document.getElementById("create-customer-form");
		var elements = form.elements;
		for (var i = 0, len = elements.length; i < len; ++i) {
			if (elements[i].id) {	
				console.log(elements[i].id);
				elements[i].disabled = false;
			}
		    
		}
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
         	if (x.id == "customers_docid") {
         		this._('customers_docid').blur();
         		this._('customers_idDocidTypes').focus();
         	}   
		}
	}
	getCustomer = (event) =>{
    	var docid = event.target.value;
    	this.clearForm();
    	event.target.value = docid;
    	console.log(docid);
    	if (docid != '') {
    		this.enableForm();
    		$.ajax({
		        type: "GET",
		        url: "/api/customers",
		        data: {
		           docid: docid,
		        },
		        success: function(response) {
		        	console.log(response);
		        	console.log(response['hydra:member']);
		        	if (response['hydra:totalItems'] == 1) {
		        		var customer = response['hydra:member'][0];
		        		this._v('customers_idDocidTypes' , customer.idDocidTypes);
		        		this._v('customers_firstName' , customer.firstName);
		        		this._v('customers_lastName' , customer.lastName);
		        		this._v('customers_phone' , customer.phone);
		        		this._v('customers_email' , customer.email);
		        		this._v('customers_reference1' , customer.reference1);
		        		this._v('customers_phoneReference1' , customer.phoneReference1);
		        		this._v('customers_coordinates' , customer.coordinates);
		        		this.setState({customerID: customer.id});
		        		console.log(this.state.customerID);
		        		//this._('div-table').style.display = 'inline';
		        	}
		        	else{
		        		this.setState({customerID: ''});
		        		//this._('div-table').style.display = 'none';
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
    htmlToJson = (p_id) => {
    	var o = {};
		var a = $('#' + p_id).serializeArray();
		$.each(a, function() {
		   if (o[this.name]) {
		       if (!o[this.name].push) {
		           o[this.name] = [o[this.name]];
		       }
		       o[this.name].push(this.value || '');
		   } else {
		       o[this.name] = this.value || '';
		   }
		});
		return o;
    }
	send = () => {
		if(this._('customers_docid').value){
			var fields = ['customers_idDocidTypes', 'customers_docid', 'customers_firstName' , 'customers_lastName', 'customers_phone', 'customers_email', 'addresses_idSyNeighborhoods', 'addresses_idSocioeconomicLevels', 'addresses_address1'];
			var text = this.state.customerID ? 'Editado' : 'Creado';
			var cust_id = this.htmlToJson('create-customer-form');
			var adr_id = this.htmlToJson('create-address-form');
			for (var i = 0; i < fields.length; i++) {
				console.log(fields[i])
	            if(this.sringIsEmpty(this._(fields[i]).value) && this._(fields[i]).parentElement.getElementsByTagName('em').length == 0){
	                this._(fields[i]).parentElement.innerHTML += '<em class="invalid">Este campo es necesario.</em>' 
	                this._(fields[i]).parentElement.classList.add('state-error');
	            }
	        }
			cust_id['idDocidTypes'] = '/api/docid_types/' + cust_id['idDocidTypes'];
			adr_id['idSocioeconomicLevels'] = '/api/socioeconomic_levels/' + adr_id['idSocioeconomicLevels'];
			adr_id['idSyNeighborhoods'] = '/api/sy_neighborhoods/' + adr_id['idSyNeighborhoods'];
			adr_id['zipcode'] = adr_id['zipcode'] ?  adr_id['zipcode'] : null;
			var data = {
			    "active": true,
			    "startActive": "2019-02-06T16:36:11.047Z",
			    "endActive": "2019-02-06T16:36:11.048Z",
			    "idCustomers": cust_id,
			    "idAddresses": adr_id
			};
			console.log(data);
			if(this._('create-customer-form').getElementsByTagName('em').length == 0){
				console.log('entre');
				$.ajax({
			        type: "POST",
			        url: "/api/customers_addresses",
			        data: JSON.stringify(data),
			        headers: { 'Content-Type': "application/json" },
			        success: function(response) {
			        	console.log(response);
			        	var result = response;
			        	console.log(result['@context']);
			            if(result['@context'] == '/api/contexts/CustomersAddress'){
			            	this.setState({successDiv: true, title: "Cliente " + text +" Correctamente!", text: "El cliente fue creado Correctamente"});
			            	var x = this._('div-alert-success').focus();
			            	this.setState({customerID: response[1]});
			            	setTimeout(function(){
		                        this.setState({successDiv: false});
		                    }.bind(this), 8000);
		                    console.log(this.state.customerID);
			            }
			        }.bind(this),
				    error: function (XMLHttpRequest, textStatus, errorThrown) {
				    	console.log('Error3 : ' + XMLHttpRequest.responseText);
				        if(XMLHttpRequest.responseText.indexOf('unique_customer_email') !== -1){
			            	this.setState({errorDiv: true, title: "Cliente No Fue " + text +"!", text: "El cliente no fue creado, ya existe un cliente con el mismo correo."});
			            }
			            else if(XMLHttpRequest.responseText.indexOf('unique_customer_docid') !== -1){
			            	this.setState({errorDiv: true, title: "Cliente No Fue " + text +"!", text: "El cliente no fue creado, ya existe un cliente con el mismo numero de docuemnto."});
			            }
			            else{
					        this.setState({errorDiv: true, title: "Cliente No Fue " + text +"!", text: "El cliente no fue creado, por favor revise la informacion y vuelvalo a intentar"});
		                }
		                var x = this._('div-alert-error').focus();
		            	setTimeout(function(){
	                        this.setState({errorDiv: false});
	                    }.bind(this), 8000);
				    }.bind(this)
			    });
			}
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
