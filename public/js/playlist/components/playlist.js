import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import Media from './media.js';
import './playlist.css';

function Playlist(props) {
    //const playlist = props.data.categories[0].playlist;
    return (
        <div className="Playlist">
        {
            props.playlist.map((item) => {
                return <Media handleClick={props.handleOpenModal} {...item} key={item.id} />
            })
        }
        </div>
    )
}


//class Playlist extends Component {
//    
//    render() {
//        console.log(this.props.data);
//        const playlist = this.props.data.categories[0].playlist;
//        return (
//          <div className="Playlist">
//            {
//                playlist.map((item) => {
//                    return <Media {...item} key={item.id} />
//                })
//            }
//          </div>
//        )
//    }
//}

export default Playlist;