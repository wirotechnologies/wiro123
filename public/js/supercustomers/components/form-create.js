import React, { Component } from 'react';

function FormCreate (props){
	var styles = {
	  bar: {
	    width: "100%"
	  },
	}
	return (
		<div className="smart-form">
			<form id="customer-form" onFocus={props.handleFocus} onKeyUp={props.handleKeyUp}>
				<header>
					Información del Cliente
				</header>
				<fieldset>
					<div className="row">
						<section className="col col-6">
							<label className="input"> <i className="icon-append fa fa-info"></i>
								<input id="txt-docid" placeholder="Introduzca la cedula"  className="search" onBlur={(e) => { props.getCustomer(e)}}/>
								<b className="tooltip tooltip-bottom-right">La cedula del cliente [*]</b></label>
						</section>
						<section className="col col-1">
							<label>
								<button type="button" className="btn btn-primary btn-sm" id="btn-edit">
						      		Editar <i className="fa fa-pencil"></i>
						    	</button>
							</label>
						</section>
						<section className="col col-1">
							<label>
								<button type="button" className="btn btn-success btn-sm" id="btn-add" onClick={props.open}>
						      		Crear <i className="fa fa-plus"></i>
						    	</button>
							</label>
						</section>

					</div>
					<div className="row">
						<section className="col col-6">
							<label className="input">
								<i className="icon-append fa fa-user"></i>
								<input type="text" id="txt-first-name" placeholder="El nombre" maxLength="200" readOnly/>
								<b className="tooltip tooltip-bottom-right">El nombre del cliente [*]</b>
							</label>
						</section>
						<section className="col col-6">
							<label className="input">
								<i className="icon-append fa fa-dollar"></i>
								<input type="text" id="txt-last-name" placeholder="Introduzca el apellido del cliente" readOnly/>
								<b className="tooltip tooltip-bottom-right">El apellido del cliente [*]</b>
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
								<input type="text" id="txt-full-name" placeholder="El nombre" maxLength="200" readOnly/>
								<b className="tooltip tooltip-bottom-right">El nombre del cliente [*]</b>
							</label>
						</section>
						<section className="col col-6">
							<label className="input">
								<i className="icon-append fa fa-dollar"></i>
								<input type="number" id="num-balance" placeholder="Introduzca el valor del pago" readOnly/>
								<b className="tooltip tooltip-bottom-right">El valor del Pago [*]</b>
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
									<option value="">Seleeciona los Productos</option>
								</select> <i></i>
							</label>
						</section>
					</div>
				</fieldset>			
			</form>
			<form name="addresses" id="create-address-form"  onFocus={props.handleFocus}>
				<header>
					Información de la Ubicación del Servicio
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
					<button type="button" className="btn btn-primary" id="btn-register">
						Registrar
					</button>
					<button type="button" className="btn btn-default">
						Limpiar
					</button>
				</footer>
			</form>
		</div>
	)
}

export default FormCreate;

