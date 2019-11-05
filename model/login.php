<?php
include_once("lib/fct_form.php");
include_once("lib/agenda.php");

$get_action = isset($_GET["action"]) ? $_GET["action"] : "form";


switch($get_action){
    case "form":
        $nameTags = array(
            "wording" => null,
            "in_date" => null,
            "in_hour" => null,
            "out_date" => null,
            "out_hour" => null,
            "place" => null,
            "agenda" => null,
            "availability" => null,
            "comments" => null
        );

        $data = array();
        foreach($nameTags as $key => $value){
            ${"post_".$key} = $data["$key"] = isset($_POST["$key"]) ? $_POST["$key"] : $value;
        }

        $result_type = array_column(getTypeAgenda(), "titre", "agenda_type_id");


        $input      = array();
        $input[]    = addInput('Libellé', array("type" => "text", "value" => $post_wording, "name" => "wording", "class" => "u-full-width", "placeholder" => "Titre de votre rendez-vous"), true);
        $input[]    = addLayout("<div class='row'>");
        $input[]    = addInput('Du', array("type" => "date", "value" => $post_in_date, "name" => "in_date", "class" => "u-full-width", "placeholder" => "jj/mm/aaaa"), true, "three columns");
        $input[]    = addInput('à', array("type" => "time", "value" => $post_in_hour, "name" => "in_hour", "class" => "u-full-width", "placeholder" => "hh:mm"), true, "three columns");
        $input[]    = addInput('au', array("type" => "date", "value" => $post_out_date, "name" => "out_date", "class" => "u-full-width", "placeholder" => "jj/mm/aaaa"), false, "three columns");
        $input[]    = addInput('à', array("type" => "time", "value" => $post_out_hour, "name" => "out_hour", "class" => "u-full-width", "placeholder" => "hh:mm"), false, "three columns");
        $input[]    = addLayout("</div>");
        $input[]    = addInput('Lieu', array("type" => "text", "value" => $post_place, "name" => "place", "class" => "u-full-width", "placeholder" => "adresse postale de votre lieu de rendez-vous"), true);
        $input[]    = addSelect('Agenda', array("name" => "agenda", "class" => "u-full-width"), $result_type, $post_agenda, true);
        $input[]    = addRadioCheckbox('Ma disponibilité', array("name" => "availability"), array("1" => "disponible", "2" => "occupé"), $post_availability, true, "radio");
        $input[]    = addTextarea('Commentaire(s)/remarque(s)', array("name" => "comments", "class" => "u-full-width", "placeholder" => "quelque chose d'autre ?"), $post_comments, false);

        $input[]    = addSubmit(array("value" => "enregistrer", "name" => "submit"), "\t\t<br />\n");

        $input[]    = addLayout("<p><a href='index.php?p=rdv&action=pdf' title='voir le planning' target='_blank'>voir le planning</a></p>");

        $show_form = form("form_agenda", "index.php?p=rdv", "post", $input, "");

        if($show_form != false){
            $page_view = "rdv_form";
        }else{
            $insert = insertAgenda($data);
            if($insert){
                $show_msg = "Insertion effectuée avec succès !";
            }else{
                $show_msg = "Erreur lors de l'insertion !";
            }
            $page_view = "rdv_form";
        }



        break;

    case "pdf":
        $result = getAgenda(0);
        //print_q($result);

        include_once("lib/fpdf/fpdf_header.php");

        $pdf = new PDF();
        // appel de la méthode permettant la création d'une page
        $pdf->AddPage();
        //$pdf->AliasNbPages();
        $pdf->SetMargins(15, 15, 15);
        $pdf->SetFont('Arial','B',16);

        $pdf->SetXY(15,45);

        $pdf->Cell(180, 8, utf8_decode('Liste des rendez-vous'), 0, 2, "L");
        $pdf->Ln(10);

        foreach($result as $r){
            $wording    = utf8_decode(convertFromDB($r["wording"]));
            $place      = utf8_decode(convertFromDB($r["place"]));
            $comments   = utf8_decode(convertFromDB($r["comments"]));
            $date_in    = utf8_decode(convertFromDB($r["date_in"]));
            $date_out   = utf8_decode(convertFromDB($r["date_out"]));
            $hour_in    = substr(utf8_decode(convertFromDB($r["hour_in"])), 0, -3);
            $hour_out   = substr(utf8_decode(convertFromDB($r["hour_out"])), 0, -3);

            $pdf->SetFont('Arial','', 10);
            // in
            $pdf->SetFillColor(8, 173, 167);
            $y = $pdf->GetY()+5;
            $pdf->MultiCell(30, 5, $date_in, 0, 'L', 'F');

            $pdf->SetFillColor(0, 137, 207);
            $x = $pdf->GetX()+30;
            $pdf->SetXY($x,$y-5);
            $pdf->MultiCell(30, 5, $hour_in, 0, 'L', 'F');

            // out
            $pdf->SetFillColor(8, 173, 167);
            $x = $pdf->GetX()+60;
            $y = $pdf->GetY();
            $pdf->SetXY($x,$y-5);
            $pdf->MultiCell(30, 5, $date_out, 0, 'L', 'F');

            $pdf->SetFillColor(0, 137, 207);
            $x = $pdf->GetX()+90;
            $pdf->SetXY($x,$y-5);
            $pdf->MultiCell(30, 5, $hour_out, 0, 'L', 'F');


            $pdf->SetFont('Arial','B', 10);
            $y = $pdf->GetY();
            $pdf->SetXY(15,$y);
            $pdf->SetFillColor(155, 221, 255);
            $pdf->MultiCell(180, 5, $wording, 0, 'L', 'F');

            $pdf->SetFont('Arial','', 10);
            $y = $pdf->GetY();
            $pdf->SetXY(15,$y);
            $pdf->SetFillColor(201, 242, 240);
            $pdf->MultiCell(180, 5, $place, 0, 'L', 'F');

            $pdf->SetFillColor(155, 221, 255);
            $pdf->MultiCell(180, 5, $comments, 0, 'L', 'F');

            $pdf->Ln(5);
        }

        // appel de la méthode qui envoie le fichier pdf généré
        $pdf->Output();

        break;

}

?>