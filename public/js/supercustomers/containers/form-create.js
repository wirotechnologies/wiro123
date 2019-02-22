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
        //this.init();
        $('#myModal').modal('show');
    }
    init(){
    	document.getElementById("btn-edit").disabled = true;
    	return false;
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
    cleanSelect(pId, pText){
    	var x = this._(pId);
        x.innerHTML = '';
        var option = document.createElement('option');
        option.text = pText;
        option.value = '';
        x.add(option);
    }
    clearForm(){
    	document.getElementById("customer-form").reset();
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
         	if (x.id == "txt-docid") {
         		this._('txt-docid').blur();
         		//this._('customers_idDocidTypes').focus();
         	}   
		}
	}
	open(){
		$('#modal-ingredients').modal('show');
	}
	getCustomer = (event) =>{
    	var docid = event.target.value;
    	this.clearForm();
    	event.target.value = docid;
    	console.log(docid);
    	if (docid != '') {
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
		        		this._v('txt-first-name' , customer.firstName);
		        		this._v('txt-last-name' , customer.lastName);
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
				open={this.open}
				getNeighborhoods={this.getNeighborhoods}
			/>
			</div>
		)
		
	}
}

export default Form;
