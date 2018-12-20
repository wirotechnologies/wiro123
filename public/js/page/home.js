import React, { Component } from 'react';
import Header from './../invoices/components/header.js';
import LeftPanel from './../invoices/components/left-panel.js';
import Main from './../invoices/components/main.js';
	import Article from './../invoices/components/article.js';
	import Form from './../invoices/components/form-create.js';
import Footer from './../invoices/components/footer.js';



class Home extends Component{
    render() {
        return (
        	<div>
	        	<Header />
	        	<LeftPanel />
	        	<Main article={Article} form={Form} />
	        	<Footer />
	        </div>
        )
    }
}

export default Home;