import React, { Component } from 'react';
import Header from './../components/header.js';
import LeftPanel from './../components/left-panel.js';
import Main from './../components/main.js';
	import Article from './../components/article.js';
	import Form from './../components/welcome.js';
import Footer from './../components/footer.js';
//Customers
import CreateCustomerForm from './../../customers/containers/form-create.js';



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
			form: CreateCustomerForm
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