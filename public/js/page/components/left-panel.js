import React from 'react';
import CustomerFormCreate from './../../customers/containers/form-create.js';
import CustomerFormList from './../../customers/containers/form-list.js';
import PaymentFormCreate from './../../payments/containers/form-create.js';

function LeftPanel (props){
	const Form = props.form;
	console.log(Form);
	return (
		<aside id="left-panel">

			<div className="login-info">
				<span>
					
					<a>
						<span>
						</span>
					</a> 
					
				</span>
			</div>

			<nav>

				<ul>
					<li>
						<a href="#" title="Clientes"><i className="fa fa-lg fa-fw fa-user"></i> <span className="menu-item-parent">Clientes</span></a>
						<ul>
							<li>
								<a onClick={() => { props.handleFormChange(CustomerFormCreate, "Clientes", "Crear Cliente") }} title="Registrar Cliente"><span className="menu-item-parent">Registrar Cliente</span></a>								
							</li>
							<li>
								<a onClick={() => { props.handleFormChange(CustomerFormList, "Clientes", "Listar Clientes") }} title="Registrar Cliente"><span className="menu-item-parent">Listar Clientes</span></a>								
							</li>
						</ul>	
					</li>
					<li>
						<a href="#" title="Clientes"><i className="fa fa-lg fa-fw fa-user"></i> <span className="menu-item-parent">Payments</span></a>
						<ul>
							<li>
								<a onClick={() => { props.handleFormChange(PaymentFormCreate, "Pagos", "Registrar Pago") }} title="Registrar Pago"><span className="menu-item-parent">Registrar Pago</span></a>								
							</li>
						</ul>	
					</li>
				</ul>
			</nav>
			

			<span className="minifyme" data-action="minifyMenu"> 
				<i className="fa fa-arrow-circle-left hit"></i> 
			</span>

		</aside>
	)
}

export default LeftPanel;

