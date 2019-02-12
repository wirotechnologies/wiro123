import React from 'react';

function Article (props){
	const Form = props.form;
	console.log(Form);
	return (
			<article className="col-sm-12">
			
				<div className="jarviswidget jarviswidget-color-blueDark" id="wid-id-9" data-widget-colorbutton="false" data-widget-editbutton="false">

					<header>
						<span className="widget-icon"> <i className="fa fa-columns"></i> </span>
						<h2>{props.title}</h2>
	
					</header>
					
					<div>
	
						<div className="jarviswidget-editbox"></div>
	
						<div className="widget-body no-padding">
							<Form />
						</div>
	
					</div>
					
				</div>
	
			</article>
	)
}

export default Article;
