import React from 'react';

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
								<a href="javascript:load_content('create_customer.php', 'customers')" title="Registrar Cliente"><span className="menu-item-parent">Registrar Cliente</span></a>								
							</li>
							<li>
								<a href="javascript:load_content('list_customers.php', 'customers')" title="Registrar Cliente"><span className="menu-item-parent">Listar Clientes</span></a>								
							</li>
						</ul>	
					</li>
					<li>
						<a href="#" title="Clientes"><i className="fa fa-lg fa-fw fa-user"></i> <span className="menu-item-parent">Pagos</span></a>
						<ul>
							<li>
								<a href="javascript:load_content('create_payment.php', 'payments')" title="Registrar Pago"><span className="menu-item-parent">Registrar Pago</span></a>								
							</li>
							<li>
								<a href="javascript:load_content('list_payments.php', 'payments')" title="Listar Pagos"><span className="menu-item-parent">Listar Pagos</span></a>								
							</li>
						</ul>	
					</li>
					<li>
						<a href="#" title="Clientes"><i className="fa fa-lg fa-fw fa-user"></i> <span className="menu-item-parent">Reportes</span></a>
						<ul>
							<li>
								<a href="javascript:load_content('portfolio.php', 'reports')" title="Cartera"><span className="menu-item-parent">Cartera</span></a>
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
