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
    cleanSelect = (pId, pText) => {
    	var x = this._(pId);
        x.innerHTML = '';
        var option = document.createElement('option');
        option.text = pText;
        option.value = '';
        x.add(option);
    }
    copySelect = (pIdOrigin, pIdDetiny, pFieldset) => {
    	var first = document.getElementById(pIdOrigin);
		var options = first.innerHTML;
		console.log(pFieldset, pFieldset.querySelectorAll('#' + pIdDetiny)[0]);
		var second = pFieldset ? pFieldset.querySelectorAll('#' + pIdDetiny)[0] : document.getElementById(pIdDetiny);
		second.innerHTML = options;
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
    v = (pId) => {
    	return document.getElementById(pId).value;
    }
    _ = (pId) => {
    	return document.getElementById(pId);
    }
    _v = (pId, pValue) => {
    	document.getElementById(pId).value = pValue;
    }
    _vf = (pFieldset, pId, pValue) => {
    	pFieldset.querySelectorAll('#' + pId)[0].value = pValue;
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
    	var ids = this.customers_fields().concat(["customers_reference1", "customers_phoneReference1"]);
    	console.log(ids);
    	for (var i = 0; i < ids.length; ++i) {
    		var x = this._(ids[i]);	
			console.log(ids[i]);
			x.disabled = false;
    	}
    }
	handleFocus = (event) => {
		var x = event.target;
		console.log(x);
		console.log(x.parentNode);
		console.log(x.parentNode.getElementsByTagName('em'));
		if (x.parentNode.getElementsByTagName('em').length > 0) {
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
		console.log(event)
		console.log(event.target)

		var x = event.target;
		if(x.id == 'btn-remove'){
			x.parentNode.parentNode.remove();
		}
		if(x.id == 'btn-remove-contract'){
			x.parentNode.parentNode.parentNode.remove();
		}
		else if(x.id == 'btn-add'){
			this.addProduct(event);
		}
		else if(x.id == 'contract_same_address'){
			console.log('entre1323')
			this.sameAddress(event);
		}
	}
	sameAddress = event => {
		var x = event.target;
		var check = x.checked;
		var fieldset = x.parentNode.parentNode.parentNode.parentNode;
		console.log(fieldset);
		this.validate_fields(this.addresses_fields());
		console.log(this._('fiet-addresss').getElementsByTagName('em').length);
		if(this._('fiet-addresss').getElementsByTagName('em').length == 0){
			var addresses = fieldset.querySelectorAll('.address');
			console.log(addresses);
			for (var i = 0; i < addresses.length; i++) {
				if(addresses[i].nodeName == 'SELECT'){
					this._vf(fieldset, addresses[i].id, check ? (this.copySelect(addresses[i].id.replace('contract_', 'addresses_'), addresses[i].id, fieldset), this.v(addresses[i].id.replace('contract_', 'addresses_')) ) : '');
				} else {
					this._vf(fieldset, addresses[i].id, check ? this.v(addresses[i].id.replace('contract_', 'addresses_')) : '');
				}
				
				//addresses[i].disabled = check;
			}
		}
		else{
			console.log('yess')
			x.checked = false;
		}
	}
	HandleChange = event => {
		var x = event.target;
		console.log('entre12')
		if (x.classList.contains('ubication')) {
			var form = this._('div-form');
			var fieldsets = form.querySelectorAll('#fiet-contract');
			for (var i = 0; i < fieldsets.length; i++) {
				var checked = fieldsets[i].querySelectorAll('#contract_same_address')[0].checked;
				var element = fieldsets[i].querySelectorAll('#' + x.id.replace('addresses_', 'contract_'))[0];
				if(checked)
					element.value = this.v(x.id);	
				
			}
		}
		if (x.parentNode.getElementsByTagName('em').length > 0) {
			var parent = x.parentElement;
			parent.classList.remove('state-error');
			parent.removeChild(parent.childNodes[parent.childNodes.length-1]); 
		}


		if(x.id == 'addresses_idSyCountries' || x.id == 'contract_idSyCountries'){
			//this.cleanSelect('addresses_idSyStates', 'Seleeciona el Departamento');
            //this.cleanSelect('addresses_idSyCities', 'Seleeciona el Ciudad');
            //this.cleanSelect('addresses_idSyNeighborhoods', 'Seleeciona el Barrio');
            var array = x.id.split('_');
            this.fillSelectElement(event, [array[0] + '_idSyStates'] , 'sy_states?idSyCountries=' + event.target.value, 'Selecciona el Departamento');
		}
		else if(x.id == 'addresses_idSyStates' || x.id == 'contract_idSyStates'){
            //this.cleanSelect('addresses_idSyCities', 'Seleeciona el Ciudad');
            //this.cleanSelect('addresses_idSyNeighborhoods', 'Seleeciona el Barrio');
            var array = x.id.split('_');
            this.fillSelectElement(event, [array[0] + '_idSyCities'] , 'sy_cities?idSyStates=' + event.target.value, 'Selecciona la Ciudad');
		}
		else if(x.id == 'addresses_idSyCities' || x.id == 'contract_idSyCities'){
            //this.cleanSelect('addresses_idSyNeighborhoods', 'Seleeciona el Barrio');
            var array = x.id.split('_');
            this.fillSelectElement(event, [array[0] + '_idSyNeighborhoods'] , 'sy_neighborhoods?idSyCities=' + event.target.value, 'Selecciona el Barrio');
		}
	}
	fillSelectElement = (event, pIds, pUrl, pText) => {
		var x = event.target;
		var fieldset = x.parentNode.parentNode.parentNode.parentNode;
    	$.ajax({
	        type: "GET",
	        url: "/api/" + pUrl,
	        data: '',
	        success: function(response) {
	        	var items = response['hydra:member'];
	            if(items){
	            	for (var i = 0; i < pIds.length; i++){
	            		var element = fieldset.querySelectorAll('#' + pIds[i])[0];
	            		element.innerHTML = '';
				        var option = document.createElement('option');
				        option.text = pText;
				        option.value = '';
				        element.add(option);
	  					for (var j = 0; j < items.length; j++){
	  						var option = document.createElement('option');
	  						option.text = items[j].name;
			            	option.value = items[j].id;
	  						element.add(option);
		                }
		            }
	            }
	        }.bind(this),
		    error: function (XMLHttpRequest, textStatus, errorThrown) {
		        console.log('Error : ' + errorThrown);
		    }
	    });
   	}
	addProduct = event => {
		var x = event.target;
		var fieldset = x.parentNode.parentNode.parentNode;
		var service = this._('div-service').childNodes[0];
		var element = fieldset.querySelectorAll('#div-services');
		var clone = document.importNode(service, true);
		element[0].appendChild(clone);
	}
	addContract = () => {
		this.validateForm()
		if(this._('div-form').getElementsByTagName('em').length == 0){

			var element = this._('fiet-contract');
			console.log(element);
			var clone = element.cloneNode(true);
			clone.querySelectorAll('#div-services')[0].innerHTML = '';
			clone.querySelectorAll('#contract_same_address')[0].checked = false;
			clone.querySelectorAll('.remove-contract')[0].style.display  = "block";
			var reset = clone.getElementsByTagName('INPUT');
			for (var i = 0; i < reset.length; i++) {
				reset[i].value = '';
			}
		    console.log('v.0.451212')
		    //document.addEventListener('mousewheel', this.handler, {passive: true});
			this._('div-contracts').appendChild(clone);
			clone.onchange = function() { this.HandleChange(event) }.bind(this)
			$( function() {
				$( ".datepicker :first" ).datepicker("destroy");
		    });        
			console.log(document.querySelectorAll('#contract_start_date'));
			$( ".datepicker" ).datepicker();
	        $( ".datepicker" ).datepicker( "option", "changeMonth", true );
	        $( ".datepicker" ).datepicker( "option", "dateFormat", "dd-mm-yy" );
	        $( '.datepicker' ).datepicker('option', 'minDate', 0);
		}
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
            if(this.sringIsEmpty(this._(p_fields[i]).value) && this._(p_fields[i]).parentElement.getElementsByTagName('em').length == 0){
                this._(p_fields[i]).parentElement.innerHTML += '<em class="invalid">Este campo es necesario.</em>' 
                this._(p_fields[i]).parentElement.classList.add('state-error');
                answer = false;
                console.log('answer');
            }
        }
        return answer;
    }
    validateForm = () => {
    	var answer = this.validate_fields(this.customers_fields().concat(this.addresses_fields()));
		var form = this._('div-form');
		var fieldsets = form.querySelectorAll('#fiet-contract');
		var fields = this.contracts_fields();
		console.log(fieldsets);
		for (var i = 0; i < fieldsets.length; i++) {
			for (var j = 0; j < fields.length; j++) {
				var element = fieldsets[i].querySelectorAll('#' + fields[j])[0];
	            if(this.sringIsEmpty(element.value) && element.parentNode.getElementsByTagName('em').length == 0){
	                var x = document.createElement("EM");
	  				var t = document.createTextNode("Este campo es necesario.");
	  				x.appendChild(t);
	  				x.classList.add('invalid');
	  				element.parentNode.appendChild(x);
	                element.parentNode.classList.add('state-error');
	                answer = false;
	            }
	        }		

		}
    	
        return answer;
    }
	send = () => {
		this.validateForm();
		if(this._('customers_docid').value){
			var text = this.state.customerID ? 'Editado' : 'Creado';
			var cust_id = this.htmlToJson('create-customer-form');
			cust_id['createdDate'] = "2019-02-14T17:08:47.733Z";
			cust_id['same'] = this._('contract_same_address').checked;
			console.log(cust_id);
			var products = document.getElementsByClassName("products");
			console.log(products);
			var idProducts = null;
			if (products.length > 1){
				idProducts = new Array();
				for (var i = 0; i < products.length; i++) {
					if(this.sringIsEmpty(products[i].value) && products[i].parentElement.getElementsByTagName('em').length == 0){
		                products[i].parentElement.innerHTML += '<em class="invalid">Este campo es necesario.</em>' 
		                products[i].parentElement.classList.add('state-error');
		            }
		            else{
		            	idProducts.push(products[i].value);
		            }
				}
			}
			console.log(idProducts);
			if(this._('div-form').getElementsByTagName('em').length == 0){
				console.log('send');
				return false;
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
				addContract={this.addContract}
				removeProduct={this.removeProduct}
				HandleChange={this.HandleChange}
				handleClickContract={this.handleClickContract}
			/>
			</div>
		)
		
	}
}

export default Form;
