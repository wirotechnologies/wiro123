import React from 'react';

function AlertDanger (props){
	return (
		<div className="alert alert-block alert-danger" id="div-alert-error" tabIndex="1" autoFocus>
			<a className="close" data-dismiss="alert" href="#">×</a>
			<h4 className="alert-heading"><i className="fa fa-times-circle-o"></i> {props.title}</h4>
			<p>
				{props.text}	
			</p>
		</div>
	)
}

export default AlertDanger;
