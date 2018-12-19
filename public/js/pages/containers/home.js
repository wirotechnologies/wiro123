import React, { Component } from 'react';
import HomeLayout from './../components/home-layout.js'
import Playlist from './../../playlist/components/playlist.js';
import Categories from './../../categories/components/categories.js';
import Realted from './../components/related.js';
import ModalContainer from './../../widgets/containers/modal.js';
import Modal from './../../widgets/components/modal.js';



class Home extends Component{
    state = {
         modalVisible: false,
    }
    handleOpenModal = (event) => {
        this.setState({
            modalVisible: true,
        })
    }
    handleCloseModal = (event) => {
        this.setState({
            modalVisible: false,
        })
    }
    render() {
        return (
            <HomeLayout>
            	<Realted />
                <Categories 
                    categories={this.props.data.categories} 
                    handleOpenModal={this.handleOpenModal}
                />                
                    {
                        this.state.modalVisible &&
                        <ModalContainer>
                            <Modal
                                handleClick={this.handleCloseModal}
                            >
                                <h1>portal</h1>
                            </Modal>
                        </ModalContainer>
                    }
            </HomeLayout>
            
        )
    }
}

export default Home;