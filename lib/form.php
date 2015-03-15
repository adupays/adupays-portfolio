<?php
function input($id){
    $value = isset($_POST[$id]) ? $_POST[$id] : ''; // si l'id est définit ça s'affiche dans le champs sinon affiche rien
    return "<input type='text' class='form-control' id='$id' name='$id' value='$value'>";
}

function textarea($id){
    $value = isset($_POST[$id]) ? $_POST[$id] : ''; // si l'id est définit ça s'affiche dans le champs sinon affiche rien
    return "<textarea class='form-control' id='$id' name='$id'>$value</textarea>";
}

function select($id, $options = array()){
    $return = "<select class='form-control' id='$id' name='$id'>";
//récupérer les options grâce au tableau
    foreach($options as $k => $v){
        $selected = ''; // la bonne catégorie s'affiche dans le formulaire quand on modifie
        if(isset($_POST[$id]) && $k == $_POST[$id]){
            $selected = ' selected="selected"';
        }
        $return .= "<option value='$k' $selected>$v</option>";
    }
    $return .= '</select>';
    return $return;
}