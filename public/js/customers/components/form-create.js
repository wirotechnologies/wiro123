import React, { Component } from 'react';
  
function FormCreate (props){
	return (
		<div className="smart-form">
			<form name="customers" id="create-customer-form"  onFocus={props.handleFocus} onKeyUp={props.handleKeyUp}  onChange={props.HandleBlur} onClick={props.handleClickContract}>
				<header>
					Por Favor Introduzca la Información del Cliente  
				</header>
				<fieldset>
					<div className="row">
						<section className="col col-6">
							<label className="input"> <i className="icon-append fa fa-info"></i>
								<input type="text" id="customers_docid" name="docid" maxLength="58" placeholder="Introduzca la cedula" onBlur={(e) => { props.getCustomer(e)}}/>
								<b className="tooltip tooltip-bottom-right">La cedula del cliente [*]</b></label>
						</section>
						<section className="col col-6">
							<label className="select">
								<select id="customers_idDocidTypes" name="idDocidTypes">
									<option value="">Seleeciona el Tipo de Documento</option>
								</select> <i></i> </label>
						</section>		
					</div>
					<div className="row">
						<section className="col col-6">
							<label className="input">
								<i className="icon-append fa fa-user"></i>
								<input type="text" id="customers_firstName" name="firstName" maxLength="258" placeholder="Introduzca el nombre"/>
								<b className="tooltip tooltip-bottom-right">El nombre del cliente [*]</b>
							</label>
						</section>
						<section className="col col-6">
							<label className="input">
								<i className="icon-append fa fa-user"></i>
								<input type="text" id="customers_lastName" name="lastName" maxLength="258" placeholder="Introduzca el apellidos"/>
								<b className="tooltip tooltip-bottom-right">El apellido del cliente [*]</b>
							</label>
						</section>
					</div>
					<div className="row">
						<section className="col col-6">
							<label className="input">
								<i className="icon-append fa fa-phone"></i>
								<input type="text" id="customers_phone" name="phone" maxLength="50" placeholder="Introduzca el número telefónico"/>
								<b className="tooltip tooltip-bottom-right">El numero telefonico del cliente [*]</b>
							</label>
						</section>
						<section className="col col-6">
							<label className="input">
								<i className="icon-append fa fa-envelope-o"></i>
								<input type="text" id="customers_email" name="email" required="required" maxLength="128" placeholder="Introduzca el email"/>
								<b className="tooltip tooltip-bottom-right">El correo electronico del cliente [*]</b>
							</label>
						</section>
					</div>
					<div className="row">
						<section className="col col-6">
							<label className="input">
								<i className="icon-append fa fa-user"></i>
								<input type="text" id="customers_reference1" name="reference1" maxLength="58" placeholder="Introduzca una referencia"/>
								<b className="tooltip tooltip-bottom-right">El nombre de una referencia del cliente [*]</b>
							</label>
						</section>
						<section className="col col-6">
							<label className="input">
								<i className="icon-append fa fa-phone"></i>
								<input type="text" id="customers_phoneReference1" name="phoneReference1" maxLength="58" placeholder="Introduzca el número telefónico de la referecia"/>
								<b className="tooltip tooltip-bottom-right">El telefono de la referencia del cliente [*]</b>
							</label>
						</section>				
					</div>
				</fieldset>
				<header>
					Por Favor Introduzca la Información de la ubicación del cliente
				</header>
				<fieldset>
					<div className="row">
						<section className="col col-4">
							<label className="select">
								<select id="addresses_idSyCountries"
								className="ubication"
								onChange={(e) => { props.getStates(e)}}>
									<option value="">Seleeciona el Pais</option>
								</select> <i></i>
							</label>
						</section>
						<section className="col col-4">
							<label className="select">
								<select id="addresses_idSyStates" className="ubication" onChange={(e) => { props.getCities(e)}}>
									<option value="">Seleeciona el Departamento</option>
								</select> <i></i>
							</label>
						</section>
						<section className="col col-4">
							<label className="select">
								<select id="addresses_idSyCities" className="ubication" onChange={(e) => { props.getNeighborhoods(e)}}>
									<option value="">Seleeciona la Ciudad</option>
								</select> <i></i>
							</label>
						</section>
					</div>
					<div className="row">
						<section className="col col-4">
							<label className="select">
								<select id="addresses_idSyNeighborhoods" className="ubication" name="customerIdSyNeighborhoods">
									<option value="">Seleeciona el Barrio</option>
								</select> <i></i>
							</label>
						</section>
						<section className="col col-4">
							<label className="select">
								 <select id="addresses_idSocioeconomicLevels" className="ubication" name="customerIdSocioeconomicLevels">
									<option value="">Seleeciona el Nivel Socioeconomico</option>
								</select> <i></i> </label>
						</section>
						<section className="col col-4">
							<label className="input">
								<i className="icon-append fa fa-map-marker"></i>
								<input type="text" id="addresses_zipcode" name="customerZipcode" className="ubication" placeholder="Introduzca el numero zip"/>
								<b className="tooltip tooltip-bottom-right">El zip del cliente [*]</b>
							</label>
						</section>	
					</div>
					<div className="row">
						<section className="col col-6">
							<label className="input"> <i className="icon-append fa fa-map-marker"></i>
								<input type="text" id="addresses_address1" className="ubication" name="customerAddress1" maxLength="512" placeholder="Introduzca la dirección 1"/>
								<b className="tooltip tooltip-bottom-right">La dirección del cliente [*]</b></label>
						</section>
						<section className="col col-6">
							<label className="input"> <i className="icon-append fa fa-map-marker"></i>
								<input type="text" id="addresses_address2" className="ubication" name="customerAddress2" maxLength="512" placeholder="Introduzca la dirección 2"/>
								<b className="tooltip tooltip-bottom-right">La dirección del cliente [*]</b></label>
						</section>													
					</div>
				</fieldset>
				<header>
					Información del Contrato
				</header>
				<fieldset>
					<div className="row">
						<section className="col col-4">
							<label className="input">
								<i className="icon-append fa fa-calendar"></i>
								<input type="text" id="contract_start_date" name="start" placeholder="La fecha de inicio" maxLength="200" className="datepicker"/>
								<b className="tooltip tooltip-bottom-right">La fecha de inicio [*]</b>
							</label>
						</section>
						<section className="col col-4">
							<label className="input">
								<i className="icon-append fa fa-slack"></i>
								<input type="number" id="contract_number" placeholder="El numero de Contrato"/>
								<b className="tooltip tooltip-bottom-right">El numero de Contrato [*]</b>
							</label>
						</section>
						<section className="col col-4">
							<label className="checkbox">
								<input type="checkbox" id="contract_same_address"  onClick={(e) => { props.HandleClickCB(e)}}/>
								<i></i>Misma dirección del Cliente y el Contrato</label>
						</section>
					</div>
					<div className="row">
						<section className="col col-4">
							<label className="select">
								<select id="contract_idContractTypes" name="idContractTypes">
									<option value="">Seleeciona el Tipo de Contrato</option>
								</select> <i></i>
							</label>
						</section>
						<section className="col col-4">
							<label className="select">
								<select id="contract_idRecurrences" name="idRecurrence">
									<option value="">Seleeciona la Recurrencia</option>
								</select> <i></i>
							</label>
						</section>
						<section className="col col-4">
							<label className="select">
								<select id="contract_idContractStatuses"  name="idStatusCauses">
									<option value="">Seleeciona el estado del Contrato</option>
								</select> <i></i>
							</label>
						</section>
					</div>
					<div className="row">
						<section className="col col-4">
							<label className="select">
								<select id="contract_idSyCountries" onChange={(e) => { props.getStates(e)}}>
									<option value="">Seleeciona el Pais</option>
								</select> <i></i>
							</label>
						</section>
						<section className="col col-4">
							<label className="select">
								<select id="contract_idSyStates" onChange={(e) => { props.getCities(e)}}>
									<option value="">Seleeciona el Departamento</option>
								</select> <i></i>
							</label>
						</section>
						<section className="col col-4">
							<label className="select">
								<select id="contract_idSyCities" onChange={(e) => { props.getNeighborhoods(e)}}>
									<option value="">Seleeciona la Ciudad</option>
								</select> <i></i>
							</label>
						</section>
					</div>
					<div className="row">
						<section className="col col-4">
							<label className="select">
								<select id="contract_idSyNeighborhoods" name="contractIdSyNeighborhoods">
									<option value="">Seleeciona el Barrio</option>
								</select> <i></i>
							</label>
						</section>
						<section className="col col-4">
							<label className="select">
								 <select id="contract_idSocioeconomicLevels" name="contractIdSocioeconomicLevels">
									<option value="">Seleeciona el Nivel Socioeconomico</option>
								</select> <i></i> </label>
						</section>
						<section className="col col-4">
							<label className="input">
								<i className="icon-append fa fa-map-marker"></i>
								<input type="text" id="contract_zipcode" name="contractZipcode" placeholder="Introduzca el numero zip"/>
								<b className="tooltip tooltip-bottom-right">El zip del cliente [*]</b>
							</label>
						</section>	
					</div>
					<div className="row">
						<section className="col col-6">
							<label className="input"> <i className="icon-append fa fa-map-marker"></i>
								<input type="text" id="contract_address1" name="contractAddress1" maxLength="512" placeholder="Introduzca la dirección 1"/>
								<b className="tooltip tooltip-bottom-right">La dirección del cliente [*]</b></label>
						</section>
						<section className="col col-6">
							<label className="input"> <i className="icon-append fa fa-map-marker"></i>
								<input type="text" id="contract_address2" name="contractAddress2" maxLength="512" placeholder="Introduzca la dirección 2"/>
								<b className="tooltip tooltip-bottom-right">La dirección del cliente [*]</b></label>
						</section>			
					</div>
					<div className="row">
						<section className="col col-3">
							<button type="button" className="btn btn-success btn-sm" onClick={props.addProduct}>
					      		Productos <i className="fa fa-plus"></i>
					    	</button>
					    	<label>O presiona "enter" para agregar</label>
						</section>
					</div>
					<div id="div-service" hidden>
						<div className="row cs-service" id="div-serv">
							<section className="col col-4">
								<label className="label">Producto</label>
								<label className="select">
									<select id="contract_idProducts" className="js-select-basic">
										<option value="">Seleeciona el Producto</option>
									</select> <i></i>
								</label>
							</section>
							<section className="col col-1" onClick={props.removeProduct}>
								<label className="label"><font color="white">Quitar</font></label>
								<button type="button" id="btn-remove" className="btn btn-danger btn-sm">
				      				<i className="fa fa-remove"></i>
				    			</button>
								
							</section>
						</div>
					</div>
					<div id="div-services"></div>
				</fieldset>
				<footer>
					<button type="button" className="btn btn-primary" id="btn-register" onClick={props.send}>
						Registrar
					</button>
					<button type="button" className="btn btn-default" onClick={props.clearForm}>
						Limpiar
					</button>
				</footer>	
			</form>
		</div>
	)
}

export default FormCreate;

