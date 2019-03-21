
<!DOCTYPE html>

<html lang="en">

<html lang="en">
<head>
  <!-- The jQuery library is a prerequisite for all jqSuite products -->
  <script type="text/ecmascript" src="http://www.guriddo.net/demo/js/jquery.min.js"></script> 
  <script type="text/ecmascript" src="http://www.guriddo.net/demo/js/jquery-ui.min.js"></script> 
  <!-- We support more than 40 localizations -->
  <script type="text/ecmascript" src="http://www.guriddo.net/demo/js/trirand/i18n/grid.locale-en.js"></script>
  <!-- This is the Javascript file of jqGrid -->   
  <script type="text/ecmascript" src="http://www.guriddo.net/demo/js/trirand/jquery.jqGrid.min.js"></script>
    <!-- This is the localization file of the grid controlling messages, labels, etc.
      <!-- A link to a jQuery UI ThemeRoller theme, more than 22 built-in and many more custom -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css"> 
      
      <!-- The link to the CSS that the grid needs -->
      <link rel="stylesheet" type="text/css" media="screen" href="http://www.guriddo.net/demo/css/trirand/ui.jqgrid-bootstrap.css" />
      <script>
        $.jgrid.defaults.width = 1360;
        $.jgrid.defaults.responsive = true;
        $.jgrid.defaults.styleUI = 'Bootstrap';
      </script>
      <script src="http://www.guriddo.net/demo/js/bootstrap-datepicker.js"></script>
      <script src="http://www.guriddo.net/demo/js/bootstrap3-typeahead.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>


      <meta charset="utf-8" />
      <title>Demo | Provab</title>
    </head>
    <body>
      <style type="text/css">

      /* set the size of the datepicker search control for Order Date*/
      #ui-datepicker-div { font-size:11px; }

      /* set the size of the autocomplete search control*/
      .ui-menu-item {

      }

      .ui-autocomplete {
        font-size: 11px;
      }       

    </style>


    <style>
    .title{
      font-size:16px;
      margin-left: 10px;

    }
    table{background: #fff;}
    tr td{vertical-align: middle !important; }
    .panel-heading{padding:6px 0px 6px 12px !important;}
    .form-control{
      border: 1px solid #0c7cd547 !important;
      -webkit-box-shadow: inset 0 0px 0 #fff !important; 
      box-shadow: inset 0 0px 0 #fff !important; 
      /*padding: 20px !important;*/
      margin-top: -12px;
      color:#000 !important;

    }

    .input-elm{
      margin-top: -1px;
    }
    th{
     background: #eee;
     font-size: 14px;
   }
   .ui-jqgrid .ui-jqgrid-hbox {
    float: left;
    padding-right: 20px;
    background: #eee;
  }
  .bcolor{
    border: 1px solid red !important;
  }
  .green_bcolor{
    border: 1px solid green !important;
  }
  .label{
    margin-left: 18px;
    font-size: 13px; 
    background: #fff;
    color:#2196f3b8;
    padding: 0px 3px 0px 3px;
  }
  .label_val{
    color:red;
  }

  .green_label_val{
    color:green;
  }

  .panel-heading{
    border-bottom: 2px solid #ddd !important;
  }
  .panel{
    border: 2px solid #ddd;
  }
  .badge{
    font-size: 18px;
    border-radius: 25%;
    width:27px;
    height: 27px;
    margin-top: -4px;
    background: #2196f3b8 !important;
    color:#fff !important;
  }
  body{
    background: #f5f5f5;
  }
  .ui-pg-selbox{
    width:40px;
  }
  #input-photo{
    opacity: 0;
  }

  .uploadbox{
    border: 1px solid #0c7cd547;
    height: 43px;
    margin-top: -13px;
  }
  .imagelabel{
    margin-top: 0px;
  }

  .phonecount{
    padding: 0px 2px 0px 2px;
    border-radius: 10%; 
    /*font-size:20px;*/
    border:1px solid red;
    background: #fff;
  }

  .ui-jqgrid .ui-jqgrid-htable .ui-th-div {
    height: 24px;
    margin-top: 0px;
  }
  .ui-jqdialog .ui-jqdialog-titlebar-close {
    position: absolute;
    top: 0%;
    margin: -3px -3px 0 0;
    /* width: 40px; */
    padding: 0px;
    cursor: pointer;
    font-size: 16px;
    color:#e51c23;
  }

  .ui-jqdialog .ui-jqdialog-titlebar-close:hover{
    margin: -10px -10px 0 0;
  }

  select, select.form-control{
    margin-top:0px;
  }
  .ui-jqgrid tr.ui-search-toolbar td > input{
    height: 27px !important;
    font-size: 14px;
  }

  .ui-jqgrid tr.ui-search-toolbar td > select{
    height: 27px !important;
    font-size: 14px;
  }
</style>


<div class="container">
 <div class="row">
  <div class="col-md-12">
   <h4 style="text-align: center; text-decoration: underline;">Flight Report Table Demo @ Provab</h4>
   <div class="panel panel-primary">
    <div class="panel-body">
     <table id="jqGrid"></table>
     <div id="jqGridPager"></div>
   </div>
 </div>
</div>
</div>
</div>



<script type="text/javascript"> 

  $(document).ready(function () {
   var filter;
   $("#jqGrid").jqGrid({
    url: 'data.php',
    mtype: "GET",
    datatype: "json",
    colModel: [
    {
      label: 'App Reference',
      name: 'appId',
      width: null,
      key: true,
      editable: true,
      editrules : { required: true},
      searchoptions : {
        searchOperMenu : true,
                        // sopt : ['eq','gt','lt','ge','le']
                        sopt : ['eq', 'bw','bn','in','ni','ew', 'en', 'nc', 'cn']
                      }
                    },
                    {
                      label: 'Status',
                      name: 'Status',
                      width: null,
                        editable: false, // must set editable to true if you want to make the field editable
                        stype: "select",
                        // searchoptions value - name values pairs for the dropdown - they will appear as options
                        searchoptions: { value: ":[All];BOOKING CONFIRM:BOOKING CONFIRM;BOOKING CANCEL:BOOKING CANCEL"},

                      },

                      {
                        label : 'Customer Name',
                        name: 'CustomerName',
                        width: null,
                        editable: true,
                        sorttype: 'text',
                        key: true, 
                        colmenu : true,
                        coloptions : {sorting:true, columns: true, filtering: true, seraching:true, grouping:true, freeze : true},
                        searchoptions : {
                          searchOperMenu : true,
                          sopt : ['eq', 'bw','bn','in','ni','ew', 'en', 'nc', 'cn']
                        }
                      },
                      {
                        label: 'From',
                        name: 'From',
                        width: null,
                        editable: true,
                        hidden:true,
                        sorttype: 'text',
                        key: true, 
                        colmenu : true,
                        coloptions : {sorting:true, columns: true, filtering: true, seraching:true, grouping:true, freeze : true},
                        searchoptions : {
                          searchOperMenu : true,
                          sopt : ['eq', 'bw','bn','in','ni','ew', 'en', 'nc', 'cn']
                        }
                      },
                      {
                        label: 'To',
                        name: 'To',
                        width: null,
                        editable: true,
                        hidden:true,
                        sorttype: 'text',
                        key: true, 
                        colmenu : true,
                        coloptions : {sorting:true, columns: true, filtering: true, seraching:true, grouping:false, freeze : true},
                        searchoptions : {
                          searchOperMenu : true,
                          sopt : ['eq', 'bw','bn','in','ni','ew', 'en', 'nc', 'cn']
                        }
                      },
                      {
                        label: 'Type',
                        name: 'Type',
                        width: null,
                        editable: true,
                        hidden:true,
                        sorttype: 'text',
                        key: true, 
                        colmenu : true,
                        coloptions : {sorting:true, columns: true, filtering: true, seraching:true, grouping:false, freeze : true},
                        searchoptions : {
                          searchOperMenu : true,
                          sopt : ['eq', 'bw','bn','in','ni','ew', 'en', 'nc', 'cn']
                        }
                      },


                      { 
                        label: "Order Date",
                        name: 'BookedOn',
                        hidden:true,
                        width: null,
                        sorttype:'date',
                      // searchoptions: {
                      //       // dataInit is the client-side event that fires upon initializing the toolbar search field for a column
                      //       // use it to place a third party control to customize the toolbar
                      //       dataInit: function (element) {
                      //           $(element).datepicker({
                      //               id: 'BookedOn',
                      //               dateFormat: 'yy-mm-dd',
                      //               //minDate: new Date(2010, 0, 1),
                      //               maxDate: new Date(2020, 0, 1),
                      //               showOn: 'focus'
                      //           });
                      //       },
                      //       // show search options
                      //       sopt: ["ge","le","eq"] // ge = greater or equal to, le = less or equal to, eq = equal to                            
                      //   },
                      key: true, 
                      colmenu : true,
                      coloptions : {sorting:true, columns: true, filtering: true, seraching:true, grouping:true, freeze : true},
                      searchoptions : {
                        searchOperMenu : false,
                        sopt : ['eq','gt','lt','ge','le']
                      }
                    },              


                    {
                      label: 'Journey Date',
                      name: 'JourneyDate',
                      width: null,
                      editable: true,
                      sorttype:'date',
                      formatter: 'date',
                      srcformat: 'Y-m-d',
                      stype : 'text',
                      newformat: 'n/j/Y',
                      key: true, 
                      colmenu : true,
                      coloptions : {sorting:true, columns: true, filtering: true, seraching:true, grouping:true, freeze : true},
                      searchoptions : {
                        searchOperMenu : true,
                        sopt : ['eq','gt','lt','ge','le'],
                            // dataInit: function (element) {
                            //     $(element).datepicker({
                            //         id: 'JourneyDate',
                            //         dateFormat: 'd/m/yy',
                            //         minDate: new Date(2010, 0, 1),
                            //         maxDate: new Date(2020, 0, 1),
                            //         showOn: 'focus',
                            //         orientation : 'bottom'
                            //     });
                            // }
                          }
                        },
                        {
                          label: 'PNR',
                          name: 'PNR',
                          width: null,
                          editable: false,
                          sorttype: 'text',
                          key: true, 
                          colmenu : true,
                          coloptions : {sorting:true, columns: true, filtering: true, seraching:true, grouping:true, freeze : true},
                          searchoptions : {
                            searchOperMenu : true,
                            sopt : ['eq', 'bw','bn','in','ni','ew', 'en', 'nc', 'cn']
                          }
                        },
                        {
                          label: 'Agent Net Fare',
                          name: 'AgentNetFare',
                          hidden:true,
                          width: null,
                          editable: false,
                          sorttype: 'text',
                          key: true, 
                          colmenu : true,
                          coloptions : {sorting:true, columns: true, filtering: true, seraching:true, grouping:false, freeze : true},
                          searchoptions : {
                            searchOperMenu : true,
                            sopt : ['eq', 'bw','bn','in','ni','ew', 'en', 'nc', 'cn']
                          }
                        },
                        {
                          label: 'Agent Commission',
                          name: 'AgentCommission',
                          width: null,
                          hidden:true,
                          editable: false,
                          sorttype: 'text',
                          key: true, 
                          colmenu : true,
                          coloptions : {sorting:true, columns: true, filtering: true, seraching:true, grouping:false, freeze : true},
                          searchoptions : {
                            searchOperMenu : true,
                            sopt : ['eq', 'bw','bn','in','ni','ew', 'en', 'nc', 'cn']
                          }
                        },
                        {
                          label: 'Admin Markup',
                          hidden:true,
                          name: 'AdminMarkup',
                          width: null,
                          editable: false,
                          sorttype: 'text',
                          key: true, 
                          colmenu : true,
                          coloptions : {sorting:true, columns: true, filtering: true, seraching:true, grouping:false, freeze : true},
                          searchoptions : {
                            searchOperMenu : true,
                            sopt : ['eq', 'bw','bn','in','ni','ew', 'en', 'nc', 'cn']
                          }
                        },
                        {
                          label: 'Agent TDS',
                          hidden:true,
                          name: 'AgentTDS',
                          width: null,
                          editable: false,
                          sorttype: 'text',
                          key: true, 
                          colmenu : true,
                          coloptions : {sorting:true, columns: true, filtering: true, seraching:true, grouping:false, freeze : true},
                          searchoptions : {
                            searchOperMenu : true,
                            sopt : ['eq', 'bw','bn','in','ni','ew', 'en', 'nc', 'cn']
                          }
                        },

                        {
                          label: 'Admin TDS',
                          hidden:true,
                          name: 'AdminTDS',
                          width: null,
                          editable: false,
                          sorttype: 'text',
                          key: true, 
                          colmenu : true,
                          coloptions : {sorting:true, columns: true, filtering: true, seraching:true, grouping:false, freeze : true},
                          searchoptions : {
                            searchOperMenu : true,
                            sopt : ['eq', 'bw','bn','in','ni','ew', 'en', 'nc', 'cn']
                          }
                        },
                        {
                          label: 'Total Fare',
                          name: 'TotalFare',
                          width: 40,
                          editable: false,
                      // searchrules:{required:true}, search:true,
                      sorttype: "int",
                      key: true, 
                      width: null ,
                      colmenu : true,
                      coloptions : {sorting:true, columns: true, filtering: true, seraching:true, grouping:true, freeze : true},
                      searchoptions : {
                        searchOperMenu : true,
                        sopt : ['eq','gt','lt','ge','le']
                      }

                    },

                    {
                      label: 'Action',
                      name: 'Action',
                      width: null,
                      editable: true,
                      searchoptions : {
                        searchOperMenu : false,
                        sopt : ['eq','gt','lt','ge','le']
                      }

                    }
                    ],
                    loadonce: true,
                    viewrecords: true,

                    colMenu : true,
                    shrinkToFit : true,
                    pager: "#jqGridPager",
                    width: 866,
                    height: 400,
                    rowNum: 50,
                    rowList:[50,100,250,500],
                    autowidth : true,
                    shrinkToFit: false,
                    multiselect: true,
                    gridview: true,

                  });
            // activate the toolbar searching
            
            $('#jqGrid').jqGrid('filterToolbar',{
              stringResult: true,
                //searchOnEnter: false,
                searchOperators : true
              });

            $('#jqGrid').jqGrid('navGrid',"#jqGridPager", {                
                search: true, // show search button on the toolbar
                add: false,
                edit: false,
                del: true,
                refresh: true,
                view: true
              },
                // options for the Edit Dialog
                {
                  editCaption: "The Edit Dialog",
                  errorTextFormat: function (data) {
                    return 'Error: ' + data.responseText
                  }
                },
               // options for the Add Dialog
               {
                 errorTextFormat: function (data) {
                  return 'Error: ' + data.responseText
                }
              },
                // options for the Delete Dailog
                {
                  errorTextFormat: function (data) {
                    return 'Error: ' + data.responseText
                  }
                },

                {
        //Delete
        width:'600',
        multipleSearch:true,
      }, 
      );






            $("#save").click(function(){
              filter = $("#jqGrid").jqGrid('getGridParam', 'postData').filters;
              var perm = [ 1, 0, 2, 4, 3 ];
              $("#jqGrid").jqGrid('remapColumns', perm, true, false);
              console.log($("#jqGrid").jqGrid('getGridParam','colModel'));
            });
            $("#load").click(function(){
              console.log(filter);
              $("#jqGrid").jqGrid('refreshFilterToolbar', {
               filters : filter,
               onClearVal: function ( elem, name) {
                if(name === 'CustomerID') {
                 console.log(elem);
                 elem.multiselect('refresh');
               }
             },
             onSetVal: function ( elem, name) {
              if(name === 'CustomerID') {
               console.log(elem);
               elem.multiselect('refresh');
             }
           }
         });
            });
            var timer;
            $("#search_cells").on("keyup", function() {
              var self = this;
              if(timer) { clearTimeout(timer); }
              timer = setTimeout(function(){
                    //timer = null;
                    $("#jqGrid").jqGrid('filterInput', self.value);
                  },0);
            });


          });

        </script>

        <script src="http://www.guriddo.net/demo/js/prettify/prettify.js"></script>
        <link rel="stylesheet" type="text/css" media="screen" href="http://www.guriddo.net/demo/css/prettify.css" />
        <script src="http://www.guriddo.net/demo/js/codetabs-b.js"></script>
        
      </body>
      </html>