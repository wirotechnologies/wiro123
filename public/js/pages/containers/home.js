import React, { Component } from 'react';
import HomeLayout from './../components/home-layout.js'
import Playlist from './../../playlist/components/playlist.js';
import data from './../../api.json';
class Home extends Component{
    render() {
        return (
            <HomeLayout>
                <Playlist data={data}/>
            </HomeLayout>    
        )
    }
}

export default Home;