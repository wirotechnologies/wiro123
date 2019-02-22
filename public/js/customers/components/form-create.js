import React, { Component } from 'react';
  
function FormCreate (props){
	return (
		<div className="smart-form">
			<form name="customers" id="create-customer-form"  onFocus={props.handleFocus} onKeyUp={props.handleKeyUp}>
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
			</form>
			<form id="create-payment-form">
				<header>
					Información del Contrato
				</header>
				<fieldset>
					<div className="row">
						<section className="col col-6">
							<label className="input">
								<i className="icon-append fa fa-user"></i>
								<input type="text" id="txt-full-name" placeholder="La fecha de inicio" maxLength="200" readOnly/>
								<b className="tooltip tooltip-bottom-right">La fecha de inicio [*]</b>
							</label>
						</section>
						<section className="col col-6">
							<label className="input">
								<i className="icon-append fa fa-dollar"></i>
								<input type="number" id="num-balance" placeholder="El numero de Contrato" readOnly/>
								<b className="tooltip tooltip-bottom-right">El numero de Contrato [*]</b>
							</label>
						</section>
					</div>
					<div className="row">
						<section className="col col-4">
							<label className="select">
								<select id="addresses_idSyCountries">
									<option value="">Seleeciona el Tipo de Contrato</option>
								</select> <i></i>
							</label>
						</section>
						<section className="col col-4">
							<label className="select">
								<select id="addresses_idSyCountries">
									<option value="">Seleeciona la Recurrencia</option>
								</select> <i></i>
							</label>
						</section>
						<section className="col col-4">
							<label className="select">
								<select id="addresses_idSyCountries">
									<option value="">Seleeciona el estado del Contrato</option>
								</select> <i></i>
							</label>
						</section>
					</div>
					<div className="row">
						<section className="col col-3">
							<button type="button" className="btn btn-success btn-sm" >
					      		Productos <i className="fa fa-plus"></i>
					    	</button>
					    	<label>O presiona "enter" para agregar</label>
						</section>
					</div>
					<div id="div-service">
						<div className="row cs-service">
							<section className="col col-4">
								<label className="label">Producto</label>
								<label className="select">
									<select id="sel-service" className="js-select-basic">
										<option value="">Seleeciona el Servicio</option>
									</select> <i></i>
								</label>
							</section>
							<section className="col col-1">
								<label className="label"><font color="white">Quitar</font></label>
								<label>
									<button type="button" className="btn btn-danger btn-sm" id="btn-remove">
							      		<i className="fa fa-remove"></i>
							    	</button>
								</label>
							</section>
						</div>
					</div>
				</fieldset>			
			</form>
			<form name="addresses" id="create-address-form"  onFocus={props.handleFocus}>
				<header>
					Por Favor Introduzca la Información de la ubicación del servicio
				</header>
				<fieldset>
					<div className="row">
						<section className="col col-4">
							<label className="select">
								<select id="addresses_idSyCountries" onChange={(e) => { props.getStates(e)}}>
									<option value="">Seleeciona el Pais</option>
								</select> <i></i>
							</label>
						</section>
						<section className="col col-4">
							<label className="select">
								<select id="addresses_idSyStates" onChange={(e) => { props.getCities(e)}}>
									<option value="">Seleeciona el Departamento</option>
								</select> <i></i>
							</label>
						</section>
						<section className="col col-4">
							<label className="select">
								<select id="addresses_idSyCities" onChange={(e) => { props.getNeighborhoods(e)}}>
									<option value="">Seleeciona la Ciudad</option>
								</select> <i></i>
							</label>
						</section>
					</div>
					<div className="row">
						<section className="col col-4">
							<label className="select">
								<select id="addresses_idSyNeighborhoods" name="idSyNeighborhoods">
									<option value="">Seleeciona el Barrio</option>
								</select> <i></i>
							</label>
						</section>
						<section className="col col-4">
							<label className="select">
								 <select id="addresses_idSocioeconomicLevels" name="idSocioeconomicLevels">
									<option value="">Seleeciona el Nivel Socioeconomico</option>
								</select> <i></i> </label>
						</section>
						<section className="col col-4">
							<label className="input">
								<i className="icon-append fa fa-map-marker"></i>
								<input type="text" id="addresses_zipcode" name="zipcode" placeholder="Introduzca el numero zip"/>
								<b className="tooltip tooltip-bottom-right">El zip del cliente [*]</b>
							</label>
						</section>	
					</div>
					<div className="row">
						<section className="col col-6">
							<label className="input"> <i className="icon-append fa fa-map-marker"></i>
								<input type="text" id="addresses_address1" name="address1" maxLength="512" placeholder="Introduzca la dirección 1"/>
								<b className="tooltip tooltip-bottom-right">La dirección del cliente [*]</b></label>
						</section>
						<section className="col col-6">
							<label className="input"> <i className="icon-append fa fa-map-marker"></i>
								<input type="text" id="addresses_address2" name="address2" maxLength="512" placeholder="Introduzca la dirección 2"/>
								<b className="tooltip tooltip-bottom-right">La dirección del cliente [*]</b></label>
						</section>													
					</div>
				</fieldset>
				<footer>
					<button type="button" className="btn btn-primary" id="btn-register" >
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

