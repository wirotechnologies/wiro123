import React from 'react';

function Modal (props){
	return (
		<div id="myModal" class="modal fade v_modal" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Editar Cliente</h4>
                    </div>
                    <div class="modal-body">
                    	{props.children}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" onclick="saveEditCust()">Guardar Cambios</button>
                    </div>
                </div>


            </div>
        </div>
	)
}

export default Modal;
