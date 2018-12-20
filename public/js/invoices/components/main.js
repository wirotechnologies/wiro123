import React from 'react';

function Main (props){
	const Article = props.article;
	const Form = props.form;
	return (
			<div id="main" role="main">
				<div id="ribbon">
		
					<ol className="breadcrumb">
						<li>Compañias</li><li>Crear Compañia</li>
					</ol>

				</div>

				<div id="content">
					<div className="alert alert-block alert-success" id="div-alert-success" hidden>
						<a className="close" data-dismiss="alert" href="#">×</a>
						<h4 className="alert-heading"><i className="fa fa-check-circle-o"></i> Compañia Creada Correctamente!</h4>
						<p>
							La Compañia fue creada correctamente.
						</p>
					</div>
					<div className="alert alert-block alert-danger" id="div-alert-error" hidden>
						<a className="close" data-dismiss="alert" href="#">×</a>
						<h4 className="alert-heading"><i className="fa fa-times-circle-o"></i>La Compañia No Fue Creada!</h4>
						<p id="p-error-message"></p>
					</div>
					
					<section id="widget-grid" className="">
					
						<div className="row" id="div-row"> 
							<Article form={Form} />
						</div>
					
					</section>

				</div>
			</div>
	)
}

export default Main;
