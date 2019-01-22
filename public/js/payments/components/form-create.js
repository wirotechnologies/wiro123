import React, { Component } from 'react';

function FormCreate (props){
	var styles = {
	  bar: {
	    width: "100%"
	  },
	}
	return (
		<form id="create-payment-form" className="smart-form">
			<header>
				Por Favor Introduzca la Información del Pago
			</header>
			<fieldset>
				<div className="row">
					<section className="col col-6">
						<label className="input"> <i className="icon-append fa fa-info"></i>
							<input id="txt-docid" placeholder="Introduzca la cedula"  className="search"/>
							<b className="tooltip tooltip-bottom-right">La cedula del cliente [*]</b></label>
					</section>
					<section className="col col-6">
						<label className="input">
							<i className="icon-append fa fa-phone"></i>
							<input type="text" id="txt-phone" placeholder="Introduzca el telefono" className="search" maxLength="50"/>
							<b className="tooltip tooltip-bottom-right">El telefono de Cliente [*]</b>
						</label>
					</section>
				</div>
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
					<section className="col col-6">
						<label className="select">
							<select id="sel-payment-type" className="js-select-basic" name="payment_type_id">
								<option value="">Seleeciona la Forma de pago</option>
							</select> <i></i>
						</label>
					</section>
					<section className="col col-6">
						<label className="input">
							<i className="icon-append fa fa-dollar"></i>
							<input type="number" id="num-value" name="value" placeholder="Introduzca el valor del pago"/>
							<b className="tooltip tooltip-bottom-right">El valor del Pago [*]</b>
						</label>
					</section>
				</div>
				<div className="row">
					<section className="col col-6">
						<label className="input">
							<i className="icon-append fa fa-calendar"></i>
							<input type="text" id="txt-date" name="date_p" placeholder="Introduzca la fecha del pago" maxLength="200" className="datepicker"/>
							<b className="tooltip tooltip-bottom-right">La fecha del Pago [*]</b>
						</label>
					</section>
					<section className="col col-6">
						<label className="input input-file">
							<span className="button"><input type="file" id="fi-galery" name="receipt_file" onChange={(e) => { props.handleInputChange(e) }} />Subir</span><input type="text" placeholder="Recibo" className="val-step  val-file-name" id="txt-gallery" readOnly/>
						</label>
						<div id="div_pb" hidden>
                            <div className="progress progress-sm progress-striped active" >
                                <div id="pb_file" className="progress-bar bg-color-greenLight"  role="progressbar" style={styles.bar}></div>
                            </div>
                        </div>
					</section>
				</div>
				<div className="row">
					<section className="col col-1"><label></label></section>
					<section className="col col-10">
						<label className="textarea"> <i className="icon-append fa fa-info-circle"></i> 										
							<textarea rows="3" id="txta-note" name="note" placeholder="Introduzca la nota del pago"></textarea> 
							<b className="tooltip tooltip-bottom-right"><i className="fa fa-check txt-color-teal"></i> La nota del Pago</b> 
						</label>
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
	)
}

export default FormCreate;

