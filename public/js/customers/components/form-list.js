import React, { Component } from 'react';

function FormCreate (props){
	return (
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
							<input type="text" id="customers1_docid" name="customers1[docid]" maxLength="58" />
							<b className="tooltip tooltip-bottom-right">La cedula del cliente [*]</b></label>
					</section>													
				</div>
				<div className="row">
					<section className="col col-6">
						<label className="input">
							<i className="icon-append fa fa-user"></i>
							<input type="text" id="customers1_firstName" name="customers1[firstName]" maxLength="258" />
							<b className="tooltip tooltip-bottom-right">El nombre del cliente [*]</b>
						</label>
					</section>
					<section className="col col-6">
						<label className="input">
							<i className="icon-append fa fa-user"></i>
							<input type="text" id="customers1_lastName" name="customers1[lastName]" maxLength="258" />
							<b className="tooltip tooltip-bottom-right">El apellido del cliente [*]</b>
						</label>
					</section>
				</div>
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
						<label className="input">
							<i className="icon-append fa fa-home"></i>
							<input type="text" id="txt-address" placeholder="Introduzca la dirección" maxLength="120" />
							<b className="tooltip tooltip-bottom-right">La dirección del cliente [*]</b>
						</label>
					</section>
					<section className="col col-4">
						<label className="input">
							<i className="icon-append fa fa-phone"></i>
							<input type="text" id="txt-phone" placeholder="Introduzca el numero telefonico" maxLength="50" />
							<b className="tooltip tooltip-bottom-right">El numero telefonico del cliente [*]</b>
						</label>
					</section>	
				</div>
				<div className="row">
					<section className="col col-6">
						<label className="input">
							<i className="icon-append fa fa-envelope-o"></i>
							<input type="text" id="customers1_email" name="customers1[email]" required="required" maxLength="128" />
							<input type="hidden" id="customers1__token" name="customers1[_token]" value={props.token} />
							<b className="tooltip tooltip-bottom-right">El correo electronico del cliente [*]</b>
						</label>
					</section>
					<section className="col col-6">
						<label className="select">
							<select id="sel-sc-level" className="js-select-basic">
								<option value="">Seleeciona el Nivel Socioeconomico</option>
							</select> <i></i> </label>
					</section>
				</div>
				<div className="row">
					<section className="col col-6">
						<label className="toggle">
							<input type="checkbox" id="cb-billable"/>
							<i data-swchon-text="Si" data-swchoff-text="No"></i>Facturable
						</label>
					</section>
					<section className="col col-6">
						<label className="select">
							<select id="sel-discount">
								<option value="">Seleeciona el Descuento</option>
							</select> <i></i>
						</label>
					</section>
				</div>
				<div className="row">
					<section className="col col-6">
						<label className="select">
							<select id="sel-node" className="js-select-basic">
								<option value="">Seleeciona el Nodo</option>
							</select> <i></i> </label>
					</section>
					<section className="col col-6">
						<label className="input">
							<i className="icon-append fa fa-user"></i>
							<input type="text" id="txt-ref-1" placeholder="Introduzca el nombre de una referencia" maxLength="50" />
							<b className="tooltip tooltip-bottom-right">El nombre de una referencia del cliente [*]</b>
						</label>
					</section>												
				</div>														
				<div className="row">
					<section className="col col-6">
						<label className="input">
							<i className="icon-append fa fa-phone"></i>
							<input type="text" id="txt-ref-1-phone" placeholder="Introduzca el telefono de la referencia" maxLength="50" />
							<b className="tooltip tooltip-bottom-right">El telefono de la referencia del cliente [*]</b>
						</label>
					</section>
					<section className="col col-6">
						<label className="input">
							<i className="icon-append fa fa-info"></i>
							<input type="text" id="txt-coordinates" placeholder="Introduzca las coordenadas" maxLength="50" />
							<b className="tooltip tooltip-bottom-right">Las Coordenadas [*]</b>
						</label>
					</section>				
				</div>
				<div id="div-service" hidden>
					<div className="row cs-service">
						<section className="col col-4">
							<label className="label">Servicio</label>
							<label className="select">
								<select id="sel-service" className="js-select-basic">
									<option value="">Seleeciona el Servicio</option>
								</select> <i></i>
							</label>
						</section>
						<section className="col col-4">
							<label className="label">Fecha Activación</label>
							<label className="input">
								<i className="icon-append fa fa-calendar"></i>
								<input type="text" id="txt-date" placeholder="Fecha de Activación" value="<?php echo date('Y-m-d'); ?>" readOnly />
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
				<div className="row">
					<section className="col col-3">
						<button type="button" className="btn btn-success btn-sm">
				      		Servicios <i className="fa fa-plus"></i>
				    	</button>
				    	<label>O presiona "enter" para agregar</label>
					</section>
				</div>
				<div id="div-services"></div>
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
	)
}

export default FormCreate;

