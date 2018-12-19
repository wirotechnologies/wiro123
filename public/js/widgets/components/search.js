import React from 'react';
import './search.css';


const Search = (props) => (
	<form 
		className="Search"
		onSubmit={props.handleSubmit}
	>
		<input 
			ref={props.setRef}
			type="text" 
			className="Search-input"
			placeholder="Busca tu video favorito" 
			name='search'
			//defaultValue="Sin Bandera"
			onChange={props.handleChange}
			value={props.value}
		/>
		<input 
			id="txt-search"
			type="text" 
			name="new"
			className="Search-input"
		/>
		<button>submit</button>
	</form>
)


export default Search;