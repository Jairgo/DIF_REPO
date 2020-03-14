<?php 
    require_once "php/conexion.php";
    $conexion=conexion();

    if(isset($_POST['selectUsuario']) && $_POST['selectUsuario']!=0){
        $idUsuario=$_POST['selectUsuario'];
        //echo($idUsuario);
    }else{
        header("location:addBecario.php?return=1");
    }

    /*** */
    /** */ $sqlNombre = "SELECT id_becario, nombre_becario, apellidos_becario,ine,becario_curp,identificador_estudios FROM becarios_registro WHERE id_becario='$idUsuario'";
    /** */ $resultUser = mysqli_query($conexion, $sqlNombre);
    /** */ $data = mysqli_fetch_array($resultUser, MYSQLI_ASSOC);
    /*** */



    //if(isset($_POST['bandera']) && $_POST['bandera'] == 4){
        $claveIne=$data['ine'];
        $claveCurp=$data['becario_curp'];
        $claveEstudios=$data['identificador_estudios'];

        
        if($_POST['claveIne'] != $claveIne ){
            $claveIne = $_POST['claveIne'];
            echo($claveIne.' >');
        }
        if($_POST['claveCurp'] != $claveCurp ){
            $claveCurp = $_POST['claveCurp'];
            echo($claveCurp.' >');
        }
        if($_POST['claveEstudios'] != $claveEstudios ){
            $claveEstudios = $_POST['claveEstudios'];
            echo($claveEstudios.' >');
        }
        $q = "UPDATE becarios_registro SET ine = '$claveIne', becario_curp = '$claveCurp', identificador_estudios = '$claveEstudios'
        WHERE id_becario = $idUsuario";
    
        $query = mysqli_query($conexion,$q);                     
        echo (mysqli_error($conexion)); 
    //}


    if(isset($_FILES['fileIne']) && $_FILES['fileIne']['name'] !=  ''){
        $nombreFile=$_FILES['fileIne']['name'];
        echo($nombreFile);
        $explode = explode('.', $nombreFile);
        $extension=array_pop($explode);
        $desde=$_FILES['fileIne']['tmp_name'];
    
        $nombreFile = $data['nombre_becario'].'_'.$data['apellidos_becario'].'_'.$idUsuario.'_INE'.'.pdf';
        $ruta='filesUp'.'/'.$nombreFile;
        //echo($ruta);
        move_uploaded_file($desde, $ruta);

        $a = "UPDATE becarios_registro SET ruta_ine = '$ruta'
        WHERE id_becario = $idUsuario";

        echo($ruta);

        $query = mysqli_query($conexion,$a);                     
        echo (mysqli_error($conexion)); 
    }

    if(isset($_FILES['fileCurp']) && $_FILES['fileCurp']['name'] !=  ''){
        $nombreFile=$_FILES['fileCurp']['name'];
        echo($nombreFile);
        $explode = explode('.', $nombreFile);
        $extension=array_pop($explode);
        $desde=$_FILES['fileCurp']['tmp_name'];
    
        $nombreFile = $data['nombre_becario'].'_'.$data['apellidos_becario'].'_'.$idUsuario.'_CURP'.'.pdf';
        $ruta='filesUp'.'/'.$nombreFile;
        move_uploaded_file($desde, $ruta);

        $q = "UPDATE becarios_registro SET ruta_curp = '$ruta'
        WHERE id_becario = $idUsuario";

        $query = mysqli_query($conexion,$q);                     
        echo (mysqli_error($conexion)); 
    }

    if(isset($_FILES['fileEstudios']) && $_FILES['fileEstudios']['name'] !=  ''){
        echo('  >'.$_FILES['fileEstudios']);
        $nombreFile=$_FILES['fileEstudios']['name'];
        echo($nombreFile);
        $explode = explode('.', $nombreFile);
        $extension=array_pop($explode);
        $desde=$_FILES['fileEstudios']['tmp_name'];
    
        $nombreFile = $data['nombre_becario'].'_'.$data['apellidos_becario'].'_'.$idUsuario.'_EST'.'.pdf';
        $ruta='filesUp'.'/'.$nombreFile;
        move_uploaded_file($desde, $ruta);

        $q = "UPDATE becarios_registro SET ruta_estudios = '$ruta'
        WHERE id_becario = $idUsuario";

        $query = mysqli_query($conexion,$q);                     
        echo (mysqli_error($conexion)); 
    }

    if(isset($_FILES['fileActa']) && $_FILES['fileActa']['name'] !=  ''){
        $nombreFile=$_FILES['fileActa']['name'];
        echo($nombreFile);
        $explode = explode('.', $nombreFile);
        $extension=array_pop($explode);
        $desde=$_FILES['fileActa']['tmp_name'];
    
        $nombreFile = $data['nombre_becario'].'_'.$data['apellidos_becario'].'_'.$idUsuario.'_ACTA'.'.pdf';
        $ruta='filesUp'.'/'.$nombreFile;
        move_uploaded_file($desde, $ruta);

        $q = "UPDATE becarios_registro SET ruta_nacimiento = '$ruta'
        WHERE id_becario = $idUsuario";

        $query = mysqli_query($conexion,$q);                     
        echo (mysqli_error($conexion)); 
    }

    if(isset($_FILES['fileCv']) && $_FILES['fileCv']['name'] !=  ''){
        $nombreFile=$_FILES['fileCv']['name'];
        echo($nombreFile);
        $explode = explode('.', $nombreFile);
        $extension=array_pop($explode);
        $desde=$_FILES['fileCv']['tmp_name'];
    
        $nombreFile = $data['nombre_becario'].'_'.$data['apellidos_becario'].'_'.$idUsuario.'_CV'.'.pdf';
        $ruta='filesUp'.'/'.$nombreFile;
        move_uploaded_file($desde, $ruta);

        $q = "UPDATE becarios_registro SET ruta_cv = '$ruta'
        WHERE id_becario = $idUsuario";

        $query = mysqli_query($conexion,$q);                     
        echo (mysqli_error($conexion)); 
    }

    if(isset($_FILES['fileMedico']) && $_FILES['fileMedico']['name'] !=  ''){
        $nombreFile=$_FILES['fileMedico']['name'];
        echo($nombreFile);
        $explode = explode('.', $nombreFile);
        $extension=array_pop($explode);
        $desde=$_FILES['fileMedico']['tmp_name'];
    
        $nombreFile = $data['nombre_becario'].'_'.$data['apellidos_becario'].'_'.$idUsuario.'_MED'.'.pdf';
        $ruta='filesUp'.'/'.$nombreFile;
        move_uploaded_file($desde, $ruta);

        $q = "UPDATE becarios_registro SET ruta_medico = '$ruta'
        WHERE id_becario = $idUsuario";

        $query = mysqli_query($conexion,$q);                     
        echo (mysqli_error($conexion)); 
    }

    if(isset($_FILES['fileDomicilio']) && $_FILES['fileDomicilio']['name'] !=  ''){
        $nombreFile=$_FILES['fileDomicilio']['name'];
        echo($nombreFile);
        $explode = explode('.', $nombreFile);
        $extension=array_pop($explode);
        $desde=$_FILES['fileDomicilio']['tmp_name'];
    
        $nombreFile = $data['nombre_becario'].'_'.$data['apellidos_becario'].'_'.$idUsuario.'_DOM'.'.pdf';
        $ruta='filesUp'.'/'.$nombreFile;
        move_uploaded_file($desde, $ruta);

        $q = "UPDATE becarios_registro SET ruta_domicilio = '$ruta'
        WHERE id_becario = $idUsuario";

        $query = mysqli_query($conexion,$q);                     
        echo (mysqli_error($conexion)); 
    }

    if(isset($_FILES['filePenal']) && $_FILES['filePenal']['name'] !=  ''){
        $nombreFile=$_FILES['filePenal']['name'];
        echo($nombreFile);
        $explode = explode('.', $nombreFile);
        $extension=array_pop($explode);
        $desde=$_FILES['filePenal']['tmp_name'];
    
        $nombreFile = $data['nombre_becario'].'_'.$data['apellidos_becario'].'_'.$idUsuario.'_PENA'.'.pdf';
        $ruta='filesUp'.'/'.$nombreFile;
        move_uploaded_file($desde, $ruta);

        $q = "UPDATE becarios_registro SET ruta_penal = '$ruta'
        WHERE id_becario = $idUsuario";

        $query = mysqli_query($conexion,$q);                     
        echo (mysqli_error($conexion)); 
    }

    if(isset($_FILES['fileRecomendacion']) && $_FILES['fileRecomendacion']['name'] !=  ''){
        $nombreFile=$_FILES['fileRecomendacion']['name'];
        echo($nombreFile);
        $explode = explode('.', $nombreFile);
        $extension=array_pop($explode);
        $desde=$_FILES['fileRecomendacion']['tmp_name'];
    
        $nombreFile = $data['nombre_becario'].'_'.$data['apellidos_becario'].'_'.$idUsuario.'_RECO'.'.pdf';
        $ruta='filesUp'.'/'.$nombreFile;
        move_uploaded_file($desde, $ruta);

        $q = "UPDATE becarios_registro SET ruta_recomendacion = '$ruta'
        WHERE id_becario = $idUsuario";

        $query = mysqli_query($conexion,$q);                     
        echo (mysqli_error($conexion)); 
    }

    if(isset($_FILES['fileRenuncia']) && $_FILES['fileRenuncia']['name'] !=  ''){
        $nombreFile=$_FILES['fileRenuncia']['name'];
        echo($nombreFile);
        $explode = explode('.', $nombreFile);
        $extension=array_pop($explode);
        $desde=$_FILES['fileRenuncia']['tmp_name'];
    
        $nombreFile = $data['nombre_becario'].'_'.$data['apellidos_becario'].'_'.$idUsuario.'_RENU'.'.pdf';
        $ruta='filesUp'.'/'.$nombreFile;
        move_uploaded_file($desde, $ruta);

        $q = "UPDATE becarios_registro SET ruta_renuncia = '$ruta'
        WHERE id_becario = $idUsuario";

        $query = mysqli_query($conexion,$q);                     
        echo (mysqli_error($conexion)); 
    }

    if(isset($_POST['bandera']) && $_POST['bandera'] == 4){
        header("location:profileBecario.php?id=".$idUsuario);
    }else{
        header("location:addBecario.php");
    }
    

?>