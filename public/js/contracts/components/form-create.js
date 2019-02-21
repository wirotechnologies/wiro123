import React, { Component } from 'react';
 
function FormCreate (props){
	return (
		<div className="smart-form">
			<form name="customers" id="create-customer-form"  onFocus={props.handleFocus} onKeyUp={props.handleKeyUp}>
				<header>
					Por Favor Introduzca las Información del Cliente  
				</header>
				<fieldset>
					<div className="row">
						<section className="col col-6">
							<label className="select">
								<select id="customers_idDocidTypes" name="idDocidTypes">
									<option value="">Seleeciona el Tipo de Documento</option>
								</select> <i></i> </label>
						</section>
						<section className="col col-6">
							<label className="input"> <i className="icon-append fa fa-info"></i>
								<input type="text" id="customers_docid" name="docid" maxLength="58" placeholder="Introduzca la cedula" onBlur={(e) => { props.getCustomer(e)}}/>
								<b className="tooltip tooltip-bottom-right">La cedula del cliente [*]</b></label>
						</section>
					</div>
					<div className="row">
						<section className="col col-6">
							<label className="input">
								<i className="icon-append fa fa-user"></i>
								<input type="text" id="customers_firstName" placeholder="El nombre del Cliente"/>
								<b className="tooltip tooltip-bottom-right">El nombre del cliente [*]</b>
							</label>
						</section>
						<section className="col col-6">
							<label className="input">
								<i className="icon-append fa fa-user"></i>
								<input type="text" id="customers_lastName" maxLength="258" placeholder="Los apellidos del Cliente"/>
								<b className="tooltip tooltip-bottom-right">El apellido del cliente [*]</b>
							</label>
						</section>
					</div>
					<div className="row">
						<section className="col col-6">
							<label className="select">
								<select id="customers_idDocidTypes" name="idDocidTypes">
									<option value="">Seleecione la Recurrencia</option>
								</select> <i></i> </label>
						</section>
						<section className="col col-6">
							<label className="select">
								<select id="customers_idDocidTypes" name="idDocidTypes">
									<option value="">Seleecione el Tipo de Pago</option>
								</select> <i></i> </label>
						</section>
					</div>
					<div className="row">
						<section className="col col-6">
							<label className="input">
								<i className="icon-append fa fa-phone"></i>
								<input type="text" id="customers_phone" name="phone" maxLength="50" placeholder="Introduzca el número telefónico"/>
								<b className="tooltip tooltip-bottom-right">La fecha de Inicio [*]</b>
							</label>
						</section>
						<section className="col col-6">
							<label className="input">
								<i className="icon-append fa fa-envelope-o"></i>
								<input type="text" id="customers_email" name="email" required="required" maxLength="128" placeholder="Introduzca el saldo"/>
								<b className="tooltip tooltip-bottom-right">El saldo [*]</b>
							</label>
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

