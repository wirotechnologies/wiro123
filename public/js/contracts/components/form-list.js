import React, { Component } from 'react';



function Form (props){
	return (
		<table id="dt_basic" className="table table-striped table-bordered table-hover" width="100%">
			<thead>			                
				<tr>
					<th data-hide="phone">Num ID</th>
					<th data-class="expand"><i className="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Apellido(s)</th>
					<th data-hide="phone"><i className="fa fa-fw fa-phone text-muted hidden-md hidden-sm hidden-xs"></i> Nombre(s)</th>
					<th>Telefono</th>
					<th data-hide="phone,tablet"><i className="fa fa-fw fa-map-marker txt-color-blue hidden-md hidden-sm hidden-xs"></i> Email</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	)
}

export default Form;
