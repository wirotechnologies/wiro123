import React from 'react';

function Main (props){
	const Article = props.article;
	const Form = props.form;
	const Modal = props.modal;
	return (
			<div id="main" role="main">
				<div id="ribbon">
		
					<ol className="breadcrumb">
						<li>{props.group}</li><li>{props.title}</li>
					</ol>

				</div>
				<div id="content">
					<section id="widget-grid" className="">
						<div className="row" id="div-row"> 
							<Article form={Form} title={props.title} />
						</div>
					</section>
				</div>
				{Modal ? <Modal /> : null}
			</div>
	)
}

export default Main;
