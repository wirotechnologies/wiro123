import React, { Component } from 'react';

function FormCreate (props){
	return (
	<div>
		<form name="customers1" id="create-customer-form" className="smart-form" >
			<header>
				Por Favor Introduzca la Información del Cliente  
			</header>
			<fieldset>
				<div className="row">
					<section className="col col-6">
						<label className="select">
							<select id="sel-doc-id" className="js-select-basic no-dis">
								<option value="">Seleeciona el Tipo de Documento</option>
							</select> <i></i> </label>
					</section>
					<section className="col col-6">
						<label className="input"> <i className="icon-append fa fa-info"></i>
							<input type="text" id="customers1_docid" name="customers1[docid]" maxLength="58" placeholder="Introduzca la cedula"/>
							<b className="tooltip tooltip-bottom-right">La cedula del cliente [*]</b></label>
					</section>													
				</div>
				<div className="row">
					<section className="col col-6">
						<label className="input">
							<i className="icon-append fa fa-user"></i>
							<input type="text" id="customers1_firstName" name="customers1[firstName]" maxLength="258" placeholder="Introduzca el nombre"/>
							<b className="tooltip tooltip-bottom-right">El nombre del cliente [*]</b>
						</label>
					</section>
					<section className="col col-6">
						<label className="input">
							<i className="icon-append fa fa-user"></i>
							<input type="text" id="customers1_lastName" name="customers1[lastName]" maxLength="258" placeholder="Introduzca el apellidos"/>
							<b className="tooltip tooltip-bottom-right">El apellido del cliente [*]</b>
						</label>
					</section>
				</div>
				<div className="row">
					<section className="col col-6">
						<label className="input">
							<i className="icon-append fa fa-phone"></i>
							<input type="text" id="customers1_phone" name="customers1[phone]" maxLength="50" placeholder="Introduzca el número telefónico"/>
							<b className="tooltip tooltip-bottom-right">El numero telefonico del cliente [*]</b>
						</label>
					</section>
					<section className="col col-6">
						<label className="input">
							<i className="icon-append fa fa-envelope-o"></i>
							<input type="text" id="customers1_email" name="customers1[email]" required="required" maxLength="128" placeholder="Introduzca el email"/>
							<input type="hidden" id="customers1__token" name="customers1[_token]" value={props.token} placeholder="Introduzca "/>
							<b className="tooltip tooltip-bottom-right">El correo electronico del cliente [*]</b>
						</label>
					</section>
				</div>													
				<div className="row">
					<section className="col col-4">
						<label className="input">
							<i className="icon-append fa fa-user"></i>
							<input type="text" id="customers1_reference1" name="customers1[reference1]" maxLength="58" placeholder="Introduzca una referencia"/>
							<b className="tooltip tooltip-bottom-right">El nombre de una referencia del cliente [*]</b>
						</label>
					</section>
					<section className="col col-4">
						<label className="input">
							<i className="icon-append fa fa-phone"></i>
							<input type="text" id="customers1_phoneReference1" name="customers1[phoneReference1]" maxLength="58" placeholder="Introduzca el número telefónico de la referecia"/>
							<b className="tooltip tooltip-bottom-right">El telefono de la referencia del cliente [*]</b>
						</label>
					</section>
					<section className="col col-4">
						<label className="input">
							<i className="icon-append fa fa-info"></i>
							<input type="text" id="customers1_coordinates" name="customers1[coordinates]" maxLength="58" placeholder="Introduzca las coordenadas"/>
							<b className="tooltip tooltip-bottom-right">Las Coordenadas [*]</b>
						</label>
					</section>				
				</div>
			</fieldset>
		</form>
		<form name="customers1" id="create-customer-form" className="smart-form" >
			<header>
				Por Favor Introduzca la Información de la ubicación  
			</header>
			<fieldset>
				<div className="row">
					<section className="col col-4">
						<label className="select">
							<select id="sel-country" className="js-select-basic">
								<option value="">Seleeciona el Pais</option>
							</select> <i></i>
						</label>
					</section>
					<section className="col col-4">
						<label className="select">
							<select id="sel-state" className="js-select-basic">
								<option value="">Seleeciona el Departamento</option>
							</select> <i></i>
						</label>
					</section>
					<section className="col col-4">
						<label className="select">
							<select id="sel-city" className="js-select-basic">
								<option value="">Seleeciona la Ciudad</option>
							</select> <i></i>
						</label>
					</section>
				</div>
				<div className="row">
					<section className="col col-4">
						<label className="select">
							<select id="sel-neighborhood" className="js-select-basic">
								<option value="">Seleeciona el Barrio</option>
							</select> <i></i>
						</label>
					</section>
					<section className="col col-4">
						<label className="select">
							<select id="sel-sc-level" name="socioeconomic_level_id" className="js-select-basic">
								<option value="">Seleeciona el Nivel Socioeconomico</option>
							</select> <i></i> </label>
					</section>
					<section className="col col-4">
						<label className="input">
							<i className="icon-append fa fa-map-marker"></i>
							<input type="text" id="txt-phone" placeholder="Introduzca zip" maxLength="50" />
							<b className="tooltip tooltip-bottom-right">El zip del cliente [*]</b>
						</label>
					</section>	
				</div>
				<div className="row">
					<section className="col col-6">
						<label className="input"> <i className="icon-append fa fa-map-marker"></i>
							<input type="text" id="customers1_address" maxLength="58" placeholder="Introduzca la dirección 1"/>
							<b className="tooltip tooltip-bottom-right">La dirección del cliente [*]</b></label>
					</section>
					<section className="col col-6">
						<label className="input"> <i className="icon-append fa fa-map-marker"></i>
							<input type="text" id="customers1_docid" maxLength="58" placeholder="Introduzca la dirección 2"/>
							<b className="tooltip tooltip-bottom-right">La dirección del cliente [*]</b></label>
					</section>													
				</div>
			</fieldset>
			<footer>
				<button type="button" className="btn btn-primary" id="btn-register" onClick={props.send} >
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

