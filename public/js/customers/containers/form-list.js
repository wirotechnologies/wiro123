import React, { Component } from 'react';
import FormList from './../components/form-list.js';


class Form extends Component{
    state = {
        name: 'juan'
    }
    componentDidMount(){
        console.log('gol');
        var responsiveHelper_dt_basic = undefined;

                var breakpointDefinition = {
                    tablet : 1024,
                    phone : 480
                };

                $('#dt_basic').dataTable({
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json",
                        "emptyTable": "There are no users for the selected date."
                    },
                    "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
                        "t"+
                        "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
                    "autoWidth" : true,
                    "preDrawCallback" : function() {
                        // Initialize the responsive datatables helper once.
                        if (!responsiveHelper_dt_basic) {
                            responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
                        }
                    },
                    "rowCallback" : function(nRow) {
                        responsiveHelper_dt_basic.createExpandIcon(nRow);
                    },
                    "drawCallback" : function(oSettings) {
                        responsiveHelper_dt_basic.respond();
                    }
                });
    }
    componentWillMount(){
        $.ajax({
            type: "POST",
            url: "/customers/getcustomers",
            data: '',
            success: function(response) {
                console.log(response);
                var customers = response;
                if (response) {
                    var t1 = $('#dt_basic').DataTable();
                    //$("#dt_basic > tbody").empty();
                    //t1.clear().draw();
                    for (var i = 0; i < customers.length; i++) {
                        console.log(customers[i].docid);
                        t1.row.add([
                            customers[i].docid,
                            customers[i].lastName,
                            customers[i].firstName,
                            customers[i].phone,
                            customers[i].email
                        ]);
                        t1.draw( false );
                    }
                }
            }.bind(this),
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                console.log('Error : ' + errorThrown);
            }
        });
    }
    render()  {
        return (
            <FormList  name={this.name}/>
        )
        
    }
}

export default Form;
