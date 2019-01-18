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
