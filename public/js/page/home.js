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
    sum = (a) => {
	  console.log(a + " : yes");
	}
    handleFormChange = (p_form) => {
    	console.log('entre',p_form);
		this.setState({
			form: FormList
		})
	}
    render() {
        return (
        	<div>
	        	<Header />
	        	<LeftPanel handleFormChange={this.handleFormChange} sum={this.sum}/>
	        	<Main article={Article} form={this.state.form} />
	        	<Footer />
	        </div>
        )
    }
}

export default Home;