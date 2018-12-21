import React, { Component } from 'react';
import Header from './../invoices/components/header.js';
import LeftPanel from './../invoices/components/left-panel.js';
import Main from './../invoices/components/main.js';
	import Article from './../invoices/components/article.js';
	import Form from './../invoices/components/form-create.js';
	import FormList from './../invoices/components/form-list.js';
import Footer from './../invoices/components/footer.js';



class Home extends Component{
	state = {
         form: Form,
    }

    handleFormChange = (event) => {
    	console.log(p_form)
		this.setState({
			form: FormList
		})
	}
    render() {
        return (
        	<div>
	        	<Header />
	        	<LeftPanel handleFormChange={this.handleFormChange}/>
	        	<Main article={Article} form={this.state.form} />
	        	<Footer />
	        </div>
        )
    }
}

export default Home;