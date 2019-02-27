import React, { Component } from 'react';
import FormCreate from './../components/form-create.js';
import AlertSuccess from './../../page/components/alert-success.js';
import AlertDanger from './../../page/components/alert-danger.js';


class Form extends Component{
	customers_fields = () => {
	    return ['customers_idDocidTypes', 'customers_docid', 'customers_firstName' , 'customers_lastName', 'customers_phone', 'customers_email'];
	}
	addresses_fields = () => {
	    return ['addresses_idSyNeighborhoods', 'addresses_idSocioeconomicLevels', 'addresses_address1'];
	}
	contracts_fields = () => {
	    return ['contract_start_date', 'contract_number', 'contract_idContractTypes', 'contract_idRecurrences', 'contract_idContractStatuses', 'contract_idSyNeighborhoods', 'contract_idSocioeconomicLevels', 'contract_address1'];
	}
	fields = () => {
	    return this.customers_fields().concat(this.addresses_fields().concat(this.contracts_fields()));
	}
	state = {
    	token: '',
    	successDiv: false,
    	errorDiv: false,
    	customerID: 0,
    	addressId: 0
    }
    componentWillMount(){
    	this.fillSelect(['customers_idDocidTypes'] , 'docid_types');
        this.fillSelect(['addresses_idSyCountries' , 'contract_idSyCountries'] , 'sy_countries');
        this.fillSelect(['addresses_idSocioeconomicLevels', 'contract_idSocioeconomicLevels'] , 'socioeconomic_levels');
        this.fillSelect(['addresses_idSyNeighborhoods', 'contract_idSyNeighborhoods'] , 'sy_neighborhoods');
        this.fillSelect(['contract_idContractTypes'] , 'contract_types');
        this.fillSelect(['contract_idRecurrences'] , 'recurrences');
        this.fillSelect(['contract_idContractStatuses'] , 'contract_statuses');
        this.fillSelect(['contract_idProducts'] , 'products');
    }
    componentDidMount(){
    	this.disableForm();
    	$( function() {
	        $( ".datepicker" ).datepicker();
	        $( ".datepicker" ).datepicker( "option", "changeMonth", true );
	        $( ".datepicker" ).datepicker( "option", "dateFormat", "dd-mm-yy" );
	        $( '.datepicker' ).datepicker('option', 'minDate', 0);
	    });
    }
    init = () =>{
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
   	fillSelect = (pIds, pUrl) => {
    	$.ajax({
	        type: "GET",
	        url: "/api/" + pUrl,
	        data: '',
	        success: function(response) {
	        	var items = response['hydra:member'];
	            if(items){
	            	for (var i = 0; i < pIds.length; i++){
	            		var x = this._(pIds[i]);
	  					for (var j = 0; j < items.length; j++){
	  						var option = document.createElement('option');
	  						option.text = items[j].name;
			            	option.value = items[j].id;
	  						x.add(option);
		                }
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
    getCities = (event) => {
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
    getNeighborhoods = (event) => {
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
    cleanSelect = (pId, pText) => {
    	var x = this._(pId);
        x.innerHTML = '';
        var option = document.createElement('option');
        option.text = pText;
        option.value = '';
        x.add(option);
    }
    clearForm = () => {
    	document.getElementById("create-customer-form").reset();
    }
    sringIsEmpty = (str) => {
        str = str.trim();
        if(str == null)
            return true;
        else if(str.length === 0)
            return true;
        else if(str.length > 0 )
            return false;
    }
    v = (p_id) => {
    	return document.getElementById(p_id).value;
    }
    _ = (p_id) => {
    	return document.getElementById(p_id);
    }
    _v = (p_id, p_value) => {
    	document.getElementById(p_id).value = p_value;
    }
    disableForm = () => {
    	var ids = this.customers_fields().concat(["customers_reference1", "customers_phoneReference1"]);
    	console.log(ids);
    	for (var i = 0; i < ids.length; ++i) {
    		var x = this._(ids[i]);	
    		if(ids[i] != 'customers_docid'){
    			console.log(ids[i]);
    			x.disabled = true;
    		}
    	}
    }
    enableForm = () => {
    	var form = document.getElementById("create-customer-form");
		var elements = form.elements;
		for (var i = 0, len = elements.length; i < len; ++i) {
			if (elements[i].id) {	
				console.log(elements[i].id);
				elements[i].disabled = false;
			}
		    
		}
    }
	handleFocus = (event) => {
		var x = event.target;
		if (x.parentElement.getElementsByTagName('em').length > 0) {
			var parent = x.parentElement;
			parent.classList.remove('state-error');
			parent.removeChild(parent.childNodes[parent.childNodes.length-1]); 
		}
	}
	handleKeyUp = (event) => {
		var x = event.target;
		if(event.which == 13){
         	if (x.id == "customers_docid") {
         		this._('customers_docid').blur();
         		this._('customers_idDocidTypes').focus();
         	}   
		}
	}
	handleClickContract = event => {
		var x = event.target;
		if(x.id == 'btn-remove'){
			x.parentNode.parentNode.remove();
		}
	}
	HandleClickCB = event => {
		var x = event.target;
		var check = x.checked;
		if(this.validate_fields(this.addresses_fields())){
			this._v('contract_idSyCountries', check ? this.v('addresses_idSyCountries') : '');
			this._v('contract_idSyStates', check ? this.v('addresses_idSyStates') : '');
			this._v('contract_idSyCities', check ? this.v('addresses_idSyCities') : '');
			this._v('contract_idSyNeighborhoods', check ? this.v('addresses_idSyNeighborhoods') : '');
			this._v('contract_idSocioeconomicLevels', check ? this.v('addresses_idSocioeconomicLevels') : '');
			this._v('contract_zipcode', check ? this.v('addresses_zipcode') : '');
			this._v('contract_address1', check ? this.v('addresses_address1') : '');
			this._v('contract_address2', check ? this.v('addresses_address2') : '');
		}
		else{
			x.checked = false;
		}
	}
	HandleBlur = event => {
		var x = event.target;
		console.log('entre');
		if (x.classList.contains('ubication') && this._('contract_same_address').checked) {
			console.log(x.id.replace('addresses_', 'contract_'));
			console.log(x.id);
		    this._v(x.id.replace('addresses_', 'contract_'), this.v(x.id));
		}
	}
	addProduct = () => {
		var element = this._('div-service').childNodes[0];
		this._('div-services').innerHTML += element.outerHTML;
		

	}
	getCustomer = (event) => {
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
		       o[this.name].push(this.value || null);
		   } else {
		       o[this.name] = this.value || null;
		   }
		});
		return o;
    }
    validate_fields = (p_fields) => {
    	var answer = true;
    	for (var i = 0; i < p_fields.length; i++) {
			console.log(p_fields[i])
            if(this.sringIsEmpty(this._(p_fields[i]).value) && this._(p_fields[i]).parentElement.getElementsByTagName('em').length == 0){
                this._(p_fields[i]).parentElement.innerHTML += '<em class="invalid">Este campo es necesario.</em>' 
                this._(p_fields[i]).parentElement.classList.add('state-error');
                answer = false;
            }
        }
        return answer;
    }
	send = () => {
		if(this._('customers_docid').value){
			var text = this.state.customerID ? 'Editado' : 'Creado';
			var cust_id = this.htmlToJson('create-customer-form');
			//this.validate_fields(this.fields());
			cust_id['createdDate'] = "2019-02-14T17:08:47.733Z";
			cust_id['same'] = this._('contract_same_address').checked;
			console.log(cust_id);
			if(this._('create-customer-form').getElementsByTagName('em').length == 0){
				console.log('entre');
				$.ajax({
			        type: "POST",
			        url: "/api/supercustomers",
			        data: JSON.stringify(cust_id),
			        headers: { 'Content-Type': "application/json" },
			        success: function(response) {
			        	console.log(response);
			        	var result = response;
			        	return false;
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
				    	console.log(JSON.parse(XMLHttpRequest.responseText));
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
				addProduct={this.addProduct}
				removeProduct={this.removeProduct}
				HandleClickCB={this.HandleClickCB}
				HandleBlur={this.HandleBlur}
				handleClickContract={this.handleClickContract}
			/>
			</div>
		)
		
	}
}

export default Form;
