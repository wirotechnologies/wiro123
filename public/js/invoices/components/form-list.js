import React from 'react';

function Form (props){
	return (
		<form id="create-company-form" className="smart-form">
			<header>
				Por Favor Introduzca la Información del Cliente
			</header>
			<fieldset>
				<div className="row">
					<section className="col col-6">
						<label className="select">
							<select id="sel-doc-id" name="docid_type_id" className="js-select-basic no-dis">
								<option value="">Seleeciona el Tipo de Documento</option>
							</select> <i></i> </label>
					</section>
					<section className="col col-6">
						<label className="input"> <i className="icon-append fa fa-info"></i>
							<input id="txt-id" name="id" placeholder="Introduzca la cedula" className="no-dis" onkeypress="return isNumberKey(event)" className="no-dis" />
							<b className="tooltip tooltip-bottom-right">La cedula del cliente [*]</b></label>
					</section>													
				</div>
			</fieldset>
		</form>
	)
}

export default Form;
