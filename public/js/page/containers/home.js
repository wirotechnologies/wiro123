import React, { Component } from 'react';
import Header from './../components/header.js';
import LeftPanel from './../components/left-panel.js';
import Main from './../components/main.js';
	import Article from './../components/article.js';
	import Form from './../components/welcome.js';
import Footer from './../components/footer.js';
//Customers
import CreateCustomerForm from './../../customers/containers/form-create.js';
import ListCustomerForm from './../../customers/containers/form-list.js';



class Home extends Component{
	state = {
        form: CreateCustomerForm,
        group: 'Sistema',
        title: 'Bienvenido'
    }
    sum = (a) => {
	  	console.log(a + " : yes");
	}
    handleFormChange = (pForm, pGroup, pTitle) => {
    	console.log('entre',pForm);
		this.setState({
			form: pForm,
			group: pGroup,
			title: pTitle
		})
	}
    render() {
        return (
        	<div>
	        	<Header />
	        	<LeftPanel handleFormChange={this.handleFormChange} sum={this.sum}/>
	        	<Main article={Article} form={this.state.form} title={this.state.title} group={this.state.group} />
	        	<Footer />
	        </div>
        )
    }
}

export default Home;