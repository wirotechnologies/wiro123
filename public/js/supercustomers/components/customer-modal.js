import React from 'react';

function Modal (props){
	return (
		<div className="modal fade" id="modal-ingredients" tabIndex="-1" role="dialog">
            <div className="modal-dialog modal-lg">
                <div className="modal-content">
                    <div className="modal-header">
                        <button type="button" className="close" data-dismiss="modal" aria-hidden="true">
                            &times;
                        </button>
                        <h4 className="modal-title">
                            Cliente
                        </h4>
                    </div>
                    <div className="modal-body no-padding">
                        <form  className="smart-form">
                            <fieldset>
                                <div className="row">
                                    <section className="col col-6">
                                        <label className="input"> <i className="icon-append fa fa-info"></i>
                                            <input type="text" id="customers_docid" name="docid" maxLength="58" placeholder="Introduzca la cedula" onBlur={(e) => { props.getCustomer(e)}}/>
                                            <b className="tooltip tooltip-bottom-right">La cedula del cliente [*]</b></label>
                                    </section>
                                    <section className="col col-6">
                                        <label className="select">
                                            <select id="customers_idDocidTypes" name="idDocidTypes">
                                                <option value="">Seleeciona el Tipo de Documento</option>
                                            </select> <i></i> </label>
                                    </section>      
                                </div>
                                <div className="row">
                                    <section className="col col-6">
                                        <label className="input">
                                            <i className="icon-append fa fa-user"></i>
                                            <input type="text" id="customers_firstName" name="firstName" maxLength="258" placeholder="Introduzca el nombre"/>
                                            <b className="tooltip tooltip-bottom-right">El nombre del cliente [*]</b>
                                        </label>
                                    </section>
                                    <section className="col col-6">
                                        <label className="input">
                                            <i className="icon-append fa fa-user"></i>
                                            <input type="text" id="customers_lastName" name="lastName" maxLength="258" placeholder="Introduzca el apellidos"/>
                                            <b className="tooltip tooltip-bottom-right">El apellido del cliente [*]</b>
                                        </label>
                                    </section>
                                </div>
                                <div className="row">
                                    <section className="col col-6">
                                        <label className="input">
                                            <i className="icon-append fa fa-phone"></i>
                                            <input type="text" id="customers_phone" name="phone" maxLength="50" placeholder="Introduzca el número telefónico"/>
                                            <b className="tooltip tooltip-bottom-right">El numero telefonico del cliente [*]</b>
                                        </label>
                                    </section>
                                    <section className="col col-6">
                                        <label className="input">
                                            <i className="icon-append fa fa-envelope-o"></i>
                                            <input type="text" id="customers_email" name="email" required="required" maxLength="128" placeholder="Introduzca el email"/>
                                            <b className="tooltip tooltip-bottom-right">El correo electronico del cliente [*]</b>
                                        </label>
                                    </section>
                                </div>                                                  
                                <div className="row">
                                    <section className="col col-4">
                                        <label className="input">
                                            <i className="icon-append fa fa-user"></i>
                                            <input type="text" id="customers_reference1" name="reference1" maxLength="58" placeholder="Introduzca una referencia"/>
                                            <b className="tooltip tooltip-bottom-right">El nombre de una referencia del cliente [*]</b>
                                        </label>
                                    </section>
                                    <section className="col col-4">
                                        <label className="input">
                                            <i className="icon-append fa fa-phone"></i>
                                            <input type="text" id="customers_phoneReference1" name="phoneReference1" maxLength="58" placeholder="Introduzca el número telefónico de la referecia"/>
                                            <b className="tooltip tooltip-bottom-right">El telefono de la referencia del cliente [*]</b>
                                        </label>
                                    </section>
                                    <section className="col col-4">
                                        <label className="input">
                                            <i className="icon-append fa fa-info"></i>
                                            <input type="text" id="customers_coordinates" name="coordinates" maxLength="58" placeholder="Introduzca las coordenadas"/>
                                            <b className="tooltip tooltip-bottom-right">Las Coordenadas [*]</b>
                                        </label>
                                    </section>              
                                </div>
                            </fieldset>
                            <footer>
                                <button type="button" className="btn btn-primary" id="btn-edit">
                                    Save
                                </button>
                                <button type="button" className="btn btn-default" data-dismiss="modal">
                                    Close
                                </button>                               
                            </footer>
                        </form>                 
                                

                    </div>

                </div>
            </div>
        </div>
	)
}

export default Modal;
