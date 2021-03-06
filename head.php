<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="login/js/alertifyjs/css/themes/default.css">
    <link rel="stylesheet" type="text/css" href="login/js/alertifyjs/css/alertify.css">

    <script src="login/js/jquery-3.2.1.min.js"></script>
    <script src="login/js/alertifyjs/alertify.js"></script>
    <title>CRUD DIF</title>
    <!--fonts--->
    <link rel="stylesheet" href="login/css/family_Roboto_Varela_Round.css">
    <link rel="stylesheet" href="login/css/family_Material_Icons.css">
    <!--fonts--->
    <!--bootstrap--->
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="login/js/jquery-3.4.1.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!--bootstrap--->
    <!--datatables--->
    
    <link rel="stylesheet" href="datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="datatable/buttons.bootstrap4.min.css">

    
    <script src="datatable/jquery.dataTables.min.js"></script>
    <script src="datatable/dataTables.bootstrap4.min.js"></script>
    <script src="datatable/dataTables.buttons.min.js"></script>
    <script src="datatable/buttons.bootstrap4.min.js"></script>
    <script src="datatable/jszip.min.js"></script>
    <script src="datatable/pdfmake.min.js"></script>
    <script src="datatable/vfs_fonts.js"></script>
    <script src="datatable/buttons.html5.min.js"></script>
    <script src="datatable/buttons.print.min.js"></script>
    <script src="datatable/buttons.colVis.min.js"></script>
    <!--datatables--->
    <!--icons--->
    <script src="login/js/07baa58181.js" crossorigin="anonymous"></script>
    <!--icons--->

    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable( {
                lengthChange: false,
                buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
            } );
        
            table.buttons().container()
                .appendTo( '#example_wrapper .col-md-6:eq(0)' );
        } );
    </script>
    <!---->
    <style type="text/css">

        .form-control{
            opacity:1;
        }
        input{
            opacity:0.8;
        }
        label{
            font-weight: bold;
        }
        body {
            font-family: 'Varela Round', sans-serif;
            background-color:#E8E8E8;
        }
        .container{
            background-color:white;
        }

        .modal-confirm {		
            color: #636363;
            width: 400px;
        }
        .modal-confirm .modal-content {
            padding: 20px;
            border-radius: 5px;
            border: none;
            text-align: center;
            font-size: 14px;
        }
        .modal-confirm .modal-header {
            border-bottom: none;   
            position: relative;
        }
        .modal-confirm h4 {
            text-align: center;
            font-size: 26px;
            margin: 30px 0 -10px;
        }
        .modal-confirm .close {
            position: absolute;
            top: -5px;
            right: -2px;
        }
        .modal-confirm .modal-body {
            color: #999;
        }
        .modal-confirm .modal-footer {
            border: none;
            text-align: center;		
            border-radius: 5px;
            font-size: 13px;
            padding: 10px 15px 25px;
        }
        .modal-confirm .modal-footer a {
            color: #999;
        }		
        .modal-confirm .icon-box {
            width: 80px;
            height: 80px;
            margin: 0 auto;
            border-radius: 50%;
            z-index: 9;
            text-align: center;
            border: 3px solid #f15e5e;
        }
        .modal-confirm .icon-box i {
            color: #f15e5e;
            font-size: 46px;
            display: inline-block;
            margin-top: 13px;
        }
        .modal-confirm .btn {
            color: #fff;
            border-radius: 4px;
            background: #60c7c1;
            text-decoration: none;
            transition: all 0.4s;
            line-height: normal;
            min-width: 120px;
            border: none;
            min-height: 40px;
            border-radius: 3px;
            margin: 0 5px;
            outline: none !important;
        }
        .modal-confirm .btn-info {
            background: #c1c1c1;
        }
        .modal-confirm .btn-info:hover, .modal-confirm .btn-info:focus {
            background: #a8a8a8;
        }
        .modal-confirm .btn-danger {
            background: #f15e5e;
        }
        .modal-confirm .btn-danger:hover, .modal-confirm .btn-danger:focus {
            background: #ee3535;
        }
        .trigger-btn {
            display: inline-block;
            margin: 100px auto;
        }
    </style>
    <script>
        $(function () {
        $('[data-toggle="tooltip"]').tooltip()
        })
    </script> 
    <style  type="text/css">
        #footer{
            margin-top: 1.5em;
            text-align:center;
        }
        #pfooter{
            margin-top: 1.5em;
        }
        .card#masterD{
            margin-top: 1.5em;
        }
        .row#md{
            font-weight: bold;
        }
        #botup{
            margin-left: 2px;
            margin-right: 2px;
        }
    </style>
    <style> /*Es el mismo que el de backupDashboard*/
        .col-form-label{
            font-size: 15px;
        }
        .form-control{
            font-size: 15px;
            opacity: 0.8;
        }
        #cardMain{
            margin-top:2px;
        }
        #fas{
            color: grey;
        }
    </style>
</head>