import React from 'react';

function AlertSuccess (props){
	return (
		<div className="alert alert-block alert-success" id="div-alert-success" tabIndex="1">
			<a className="close" data-dismiss="alert" href="#">×</a>
			<h4 className="alert-heading"><i className="fa fa-check-circle-o"></i> {props.title}</h4>
			<p>
				{props.text}
			</p>
		</div>
	)
}

export default AlertSuccess;
