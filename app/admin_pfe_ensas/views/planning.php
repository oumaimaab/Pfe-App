﻿<?php

//include '../../Config/DataBase.php';
include '../../models/ListeSoutenance.php';


function soutenance(){
    //$db= new DataBase();
    //$error ="ewa yalah";
    $liste = new ListeSoutenance();
    $infos = $liste->getSoutInfo();
    $i = 0;
    foreach ($infos as $info){
        echo "<tr height=21 style='height:16.0pt'>";

        echo "<td class=xl68 align=left style='border-top:none'>";
        echo $info['nom'];
        echo "</td>";

        echo "<td class=xl68 align=left style='border-top:none;border-left:none'>";
        echo $info['prenom'];
        echo "</td>";

        echo "<td class=xl70 style='border-top:none;border-left:none'>";
        echo $info['filiere'];
        echo "</td>";

        echo "<td rowspan=3 class=xl77 style='border-bottom:.5pt solid black;border-top:none'>";
        echo $info['encadrant'];
        echo "</td>";

        echo "<td class=xl69 align=left style='border-top:none;border-left:none'>";
        echo $info['dateSout'];
        echo "</td>";

        echo "<td class=xl73 style='border-top:none;border-left:none'>";
        echo $info['heure'];
        echo "</td>";

        echo "<td class=xl69 align=left style='border-top:none;border-left:none'>";
        echo $info['local'];
        echo "</td>";
        echo "<td></td>";
        echo  "</tr>";

    }
}

?>

<html xmlns:v="urn:schemas-microsoft-com:vml"
      xmlns:x="urn:schemas-microsoft-com:office:excel"
      xmlns="http://www.w3.org/TR/REC-html40">
<head>
    <title><?php echo $titre; ?></title>

</head>
<body bgcolor='<?php echo $bg_color; ?>'>
<div align="center">

    <head>
        <meta http-equiv=Content-Type content="text/html; charset=utf-8">
        <meta name=ProgId content=Excel.Sheet>
        <meta name=Generator content="Microsoft Excel 15">
        <link rel=File-List href="planning_2017-2018.fld/filelist.xml">
        <!--[if !mso]>
        <style>
            v\: * {
                behavior: url(#default#VML);
            }

            o\: * {
                behavior: url(#default#VML);
            }

            x\: * {
                behavior: url(#default#VML);
            }

            .shape {
                behavior: url(#default#VML);
            }
        </style>
        <![endif]-->
        <style id="planning_2017-2018_23604_Styles">
            <!--
            table {
                mso-displayed-decimal-separator: "\,";
                mso-displayed-thousand-separator: " ";
            }

            @page {
                margin: .75in .7in .75in .7in;
                mso-header-margin: .3in;
                mso-footer-margin: .3in;
            }

            tr {
                mso-height-source: auto;
            }

            col {
                mso-width-source: auto;
            }

            br {
                mso-data-placement: same-cell;
            }

            .style0 {
                mso-number-format: General;
                text-align: general;
                vertical-align: bottom;
                white-space: nowrap;
                mso-rotate: 0;
                mso-background-source: auto;
                mso-pattern: auto;
                color: black;
                font-size: 12.0pt;
                font-weight: 400;
                font-style: normal;
                text-decoration: none;
                font-family: Calibri, sans-serif;
                mso-font-charset: 0;
                border: none;
                mso-protection: locked visible;
                mso-style-name: Normal;
                mso-style-id: 0;
            }

            td {
                mso-style-parent: style0;
                padding: 0px;
                mso-ignore: padding;
                color: black;
                font-size: 12.0pt;
                font-weight: 400;
                font-style: normal;
                text-decoration: none;
                font-family: Calibri, sans-serif;
                mso-font-charset: 0;
                mso-number-format: General;
                text-align: general;
                vertical-align: bottom;
                border: none;
                mso-background-source: auto;
                mso-pattern: auto;
                mso-protection: locked visible;
                white-space: nowrap;
                mso-rotate: 0;
            }

            .xl65 {
                mso-style-parent: style0;
                color: white;
                font-weight: 700;
                text-align: center;
                vertical-align: middle;
                border-top: .5pt solid windowtext;
                border-right: .5pt solid windowtext;
                border-bottom: .5pt solid windowtext;
                border-left: none;
                background: #203764;
                mso-pattern: black none;
            }

            .xl66 {
                mso-style-parent: style0;
                color: white;
                font-weight: 700;
                text-align: center;
                vertical-align: middle;
                border: .5pt solid windowtext;
                background: #203764;
                mso-pattern: black none;
            }

            .xl67 {
                mso-style-parent: style0;
                color: black;
                font-size: 10.0pt;
                font-family: "Helvetica Neue", sans-serif;
                mso-font-charset: 0;
                border-top: .5pt solid windowtext;
                border-right: .5pt solid windowtext;
                border-bottom: .5pt solid windowtext;
                border-left: none;
            }

            .xl68 {
                mso-style-parent: style0;
                color: black;
                font-size: 10.0pt;
                font-family: "Helvetica Neue", sans-serif;
                mso-font-charset: 0;
                border: .5pt solid windowtext;
            }

            .xl69 {
                mso-style-parent: style0;
                font-size: 10.0pt;
                border: .5pt solid windowtext;
            }

            .xl70 {
                mso-style-parent: style0;
                color: black;
                font-size: 10.0pt;
                font-family: "Helvetica Neue", sans-serif;
                mso-font-charset: 0;
                text-align: center;
                vertical-align: middle;
                border: .5pt solid windowtext;
            }

            .xl71 {
                mso-style-parent: style0;
                font-size: 10.0pt;
                mso-number-format: "Short Date";
                border: .5pt solid windowtext;
            }

            .xl72 {
                mso-style-parent: style0;
                font-size: 10.0pt;
                text-align: center;
                border: .5pt solid windowtext;
            }

            .xl73 {
                mso-style-parent: style0;
                font-size: 10.0pt;
                text-align: center;
                vertical-align: middle;
                border: .5pt solid windowtext;
            }

            .xl74 {
                mso-style-parent: style0;
                color: black;
                font-size: 10.0pt;
                font-family: "Helvetica Neue", sans-serif;
                mso-font-charset: 0;
                border: .5pt solid windowtext;
                background: white;
                mso-pattern: black none;
            }

            .xl75 {
                mso-style-parent: style0;
                font-size: 10.0pt;
                text-align: center;
                vertical-align: middle;
                border: .5pt solid windowtext;
                background: white;
                mso-pattern: black none;
            }

            .xl76 {
                mso-style-parent: style0;
                color: black;
                font-size: 10.0pt;
                font-family: "Helvetica Neue", sans-serif;
                mso-font-charset: 0;
                text-align: left;
                vertical-align: middle;
                border: .5pt solid windowtext;
                background: white;
                mso-pattern: black none;
            }

            .xl77 {
                mso-style-parent: style0;
                font-size: 10.0pt;
                text-align: center;
                vertical-align: middle;
                border-top: .5pt solid windowtext;
                border-right: .5pt solid windowtext;
                border-bottom: none;
                border-left: .5pt solid windowtext;
            }

            .xl78 {
                mso-style-parent: style0;
                font-size: 10.0pt;
                text-align: center;
                vertical-align: middle;
                border-top: none;
                border-right: .5pt solid windowtext;
                border-bottom: .5pt solid windowtext;
                border-left: .5pt solid windowtext;
            }

            .xl79 {
                mso-style-parent: style0;
                color: black;
                font-size: 10.0pt;
                font-family: "Helvetica Neue", sans-serif;
                mso-font-charset: 0;
                text-align: left;
                vertical-align: middle;
                border-top: .5pt solid windowtext;
                border-right: .5pt solid windowtext;
                border-bottom: none;
                border-left: .5pt solid windowtext;
            }

            .xl80 {
                mso-style-parent: style0;
                color: black;
                font-size: 10.0pt;
                font-family: "Helvetica Neue", sans-serif;
                mso-font-charset: 0;
                text-align: left;
                vertical-align: middle;
                border-top: none;
                border-right: .5pt solid windowtext;
                border-bottom: .5pt solid windowtext;
                border-left: .5pt solid windowtext;
            }

            .xl81 {
                mso-style-parent: style0;
                color: black;
                font-size: 10.0pt;
                font-family: "Helvetica Neue", sans-serif;
                mso-font-charset: 0;
                text-align: left;
                vertical-align: middle;
                border-top: .5pt solid windowtext;
                border-right: .5pt solid windowtext;
                border-bottom: none;
                border-left: .5pt solid windowtext;
                background: white;
                mso-pattern: black none;
            }

            .xl82 {
                mso-style-parent: style0;
                color: black;
                font-size: 10.0pt;
                font-family: "Helvetica Neue", sans-serif;
                mso-font-charset: 0;
                text-align: left;
                vertical-align: middle;
                border-top: none;
                border-right: .5pt solid windowtext;
                border-bottom: .5pt solid windowtext;
                border-left: .5pt solid windowtext;
                background: white;
                mso-pattern: black none;
            }

            .xl83 {
                mso-style-parent: style0;
                font-size: 10.0pt;
                text-align: center;
                vertical-align: middle;
                border-top: .5pt solid windowtext;
                border-right: .5pt solid windowtext;
                border-bottom: none;
                border-left: .5pt solid windowtext;
                background: white;
                mso-pattern: black none;
            }

            .xl84 {
                mso-style-parent: style0;
                font-size: 10.0pt;
                text-align: center;
                vertical-align: middle;
                border-top: none;
                border-right: .5pt solid windowtext;
                border-bottom: .5pt solid windowtext;
                border-left: .5pt solid windowtext;
                background: white;
                mso-pattern: black none;
            }

            .xl85 {
                mso-style-parent: style0;
                color: #FFC000;
                font-weight: 700;
                text-align: right;
                vertical-align: middle;
                border-top: .5pt solid windowtext;
                border-right: none;
                border-bottom: .5pt solid windowtext;
                border-left: none;
                background: #5B9BD5;
                mso-pattern: black none;
            }

            .xl86 {
                mso-style-parent: style0;
                color: #FFC000;
                font-weight: 700;
                text-align: right;
                vertical-align: middle;
                border-top: .5pt solid windowtext;
                border-right: .5pt solid windowtext;
                border-bottom: .5pt solid windowtext;
                border-left: none;
                background: #5B9BD5;
                mso-pattern: black none;
            }

            .xl87 {
                mso-style-parent: style0;
                color: yellow;
                font-size: 10.0pt;
                font-weight: 700;
                font-family: Arial, sans-serif;
                mso-font-charset: 0;
                text-align: center;
                border-top: .5pt solid windowtext;
                border-right: none;
                border-bottom: .5pt solid windowtext;
                border-left: .5pt solid windowtext;
                background: #5B9BD5;
                mso-pattern: black none;
            }

            .xl88 {
                mso-style-parent: style0;
                color: yellow;
                font-size: 10.0pt;
                font-weight: 700;
                font-family: Arial, sans-serif;
                mso-font-charset: 0;
                text-align: center;
                border-top: .5pt solid windowtext;
                border-right: none;
                border-bottom: .5pt solid windowtext;
                border-left: none;
                background: #5B9BD5;
                mso-pattern: black none;
            }

            .xl89 {
                mso-style-parent: style0;
                color: yellow;
                font-size: 10.0pt;
                font-weight: 700;
                font-family: Arial, sans-serif;
                mso-font-charset: 0;
                text-align: center;
                border-top: .5pt solid windowtext;
                border-right: .5pt solid windowtext;
                border-bottom: .5pt solid windowtext;
                border-left: none;
                background: #5B9BD5;
                mso-pattern: black none;
            }

            .xl90 {
                mso-style-parent: style0;
                color: black;
                font-size: 10.0pt;
                font-family: "Helvetica Neue", sans-serif;
                mso-font-charset: 0;
                text-align: center;
                vertical-align: middle;
                border-top: .5pt solid windowtext;
                border-right: .5pt solid windowtext;
                border-bottom: none;
                border-left: .5pt solid windowtext;
            }

            .xl91 {
                mso-style-parent: style0;
                color: black;
                font-size: 10.0pt;
                font-family: "Helvetica Neue", sans-serif;
                mso-font-charset: 0;
                text-align: center;
                vertical-align: middle;
                border-top: none;
                border-right: .5pt solid windowtext;
                border-bottom: none;
                border-left: .5pt solid windowtext;
            }

            .xl92 {
                mso-style-parent: style0;
                color: black;
                font-size: 10.0pt;
                font-family: "Helvetica Neue", sans-serif;
                mso-font-charset: 0;
                text-align: center;
                vertical-align: middle;
                border-top: none;
                border-right: .5pt solid windowtext;
                border-bottom: .5pt solid windowtext;
                border-left: .5pt solid windowtext;
            }

            .xl93 {
                mso-style-parent: style0;
                color: yellow;
                font-weight: 700;
                text-align: center;
                vertical-align: middle;
                border-top: .5pt solid windowtext;
                border-right: none;
                border-bottom: .5pt solid windowtext;
                border-left: .5pt solid windowtext;
                background: #5B9BD5;
                mso-pattern: black none;
            }

            .xl94 {
                mso-style-parent: style0;
                color: yellow;
                font-weight: 700;
                text-align: center;
                vertical-align: middle;
                border-top: .5pt solid windowtext;
                border-right: none;
                border-bottom: .5pt solid windowtext;
                border-left: none;
                background: #5B9BD5;
                mso-pattern: black none;
            }

            .xl95 {
                mso-style-parent: style0;
                color: yellow;
                font-weight: 700;
                text-align: center;
                vertical-align: middle;
                border-top: .5pt solid windowtext;
                border-right: .5pt solid windowtext;
                border-bottom: .5pt solid windowtext;
                border-left: none;
                background: #5B9BD5;
                mso-pattern: black none;
            }

            .xl96 {
                mso-style-parent: style0;
                font-size: 10.0pt;
                text-align: center;
                vertical-align: middle;
                border-top: none;
                border-right: .5pt solid windowtext;
                border-bottom: none;
                border-left: .5pt solid windowtext;
            }

            .xl97 {
                mso-style-parent: style0;
                color: black;
                font-size: 10.0pt;
                font-family: "Helvetica Neue", sans-serif;
                mso-font-charset: 0;
                text-align: left;
                vertical-align: middle;
                border-top: none;
                border-right: .5pt solid windowtext;
                border-bottom: none;
                border-left: .5pt solid windowtext;
                background: white;
                mso-pattern: black none;
            }

            .xl98 {
                mso-style-parent: style0;
                font-size: 10.0pt;
                text-align: center;
                vertical-align: middle;
                border-top: none;
                border-right: .5pt solid windowtext;
                border-bottom: none;
                border-left: .5pt solid windowtext;
                background: white;
                mso-pattern: black none;
            }

            .xl99 {
                mso-style-parent: style0;
                font-size: 18.0pt;
                font-family: "Abadi MT Condensed Extra Bold", sans-serif;
                mso-font-charset: 0;
            }

            .xl100 {
                mso-style-parent: style0;
                font-size: 11.0pt;
                text-align: left;
                vertical-align: middle;
                border: .5pt solid windowtext;
                background: white;
                mso-pattern: black none;
            }

            -->
        </style>
    </head>

    <body link="#0563C1" vlink="#954F72">
    <!--[if !excel]>&nbsp;&nbsp;<![endif]-->
    <!--Les informations suivantes ont été générées par l’Assistant Publier en tant
    que page web de Microsoft Excel.-->
    <!--SI vous republiez le même élément à partir d'Excel, toutes les informations
    entre les balises DIV seront remplacées.-->
    <!----------------------------->
    <!--DÉBUT DE LA SORTIE À PARTIR DE L'ASSISTANT PUBLIER EN TANT QUE PAGE WEB
    D'EXCEL -->
    <!----------------------------->

    <div id="planning_2017-2018_23604" align=center x:publishsource="Excel">

        <table border=0 cellpadding=0 cellspacing=0 width=999 style='border-collapse:
 collapse;table-layout:fixed;width:748pt'>
            <col width=87 span=2 style='width:65pt'>
            <col width=144 style='mso-width-source:userset;mso-width-alt:4608;width:108pt'>
            <col width=123 style='mso-width-source:userset;mso-width-alt:3925;width:92pt'>
            <col width=51 style='mso-width-source:userset;mso-width-alt:1621;width:38pt'>
            <col width=97 style='mso-width-source:userset;mso-width-alt:3114;width:73pt'>
            <col width=139 style='mso-width-source:userset;mso-width-alt:4437;width:104pt'>
            <col width=87 style='width:65pt'>
            <col width=97 style='mso-width-source:userset;mso-width-alt:3114;width:73pt'>
            <col width=87 style='width:65pt'>
            <tr height=21 style='height:16.0pt'>
                <td height=21 width=87 style='height:16.0pt;width:65pt'></td>
                <td width=87 style='width:65pt'></td>
                <td width=144 style='width:108pt' align=left valign=top><!--[if gte vml 1]>
                    <v:shapetype
                            id="_x0000_t75" coordsize="21600,21600" o:spt="75" o:preferrelative="t"
                            path="m@4@5l@4@11@9@11@9@5xe" filled="f" stroked="f">
                        <v:stroke joinstyle="miter"/>
                        <v:formulas>
                            <v:f eqn="if lineDrawn pixelLineWidth 0"/>
                            <v:f eqn="sum @0 1 0"/>
                            <v:f eqn="sum 0 0 @1"/>
                            <v:f eqn="prod @2 1 2"/>
                            <v:f eqn="prod @3 21600 pixelWidth"/>
                            <v:f eqn="prod @3 21600 pixelHeight"/>
                            <v:f eqn="sum @0 0 1"/>
                            <v:f eqn="prod @6 1 2"/>
                            <v:f eqn="prod @7 21600 pixelWidth"/>
                            <v:f eqn="sum @8 21600 0"/>
                            <v:f eqn="prod @7 21600 pixelHeight"/>
                            <v:f eqn="sum @10 21600 0"/>
                        </v:formulas>
                        <v:path o:extrusionok="f" gradientshapeok="t" o:connecttype="rect"/>
                        <o:lock v:ext="edit" aspectratio="t"/>
                    </v:shapetype>
                    <v:shape id="Image_x0020_1" o:spid="_x0000_s1031" type="#_x0000_t75"
                             style='position:absolute;direction:LTR;text-align:left;margin-left:5pt;
   margin-top:8pt;width:82pt;height:52pt;z-index:1;visibility:visible'
                             o:gfxdata="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
">
                        <v:imagedata src="planning_2017-2018.fld/planning_2017-2018_23604_image001.png"
                                     o:title=""/>
                        <x:ClientData ObjectType="Pict">
                            <x:SizeWithCells/>
                            <x:CF>Bitmap</x:CF>
                            <x:AutoPict/>
                        </x:ClientData>
                    </v:shape><![endif]--><![if !vml]><span style='mso-ignore:vglayout;
  position:absolute;z-index:1;margin-left:7px;margin-top:11px;width:110px;
  height:69px'><img width=83 height=52
                    src="../../../planning_2017-2018.fld/planning_2017-2018_23604_image001.png" v:shapes="Image_x0020_1"></span><![endif]><span
                            style='mso-ignore:vglayout2'>
  <table cellpadding=0 cellspacing=0>
   <tr>
    <td height=21 width=144 style='height:16.0pt;width:108pt'></td>
   </tr>
  </table>
  </span></td>
                <td width=123 style='width:92pt'></td>
                <td width=51 style='width:38pt'></td>
                <td width=97 style='width:73pt'></td>
                <td width=139 style='width:104pt'></td>
                <td width=87 style='width:65pt'></td>
                <td width=97 style='width:73pt' align=left valign=top><!--[if gte vml 1]>
                    <v:shape
                            id="Image_x0020_2" o:spid="_x0000_s1032" type="#_x0000_t75" style='position:absolute;
   direction:LTR;text-align:left;margin-left:15pt;margin-top:8pt;width:84pt;
   height:51pt;z-index:2;visibility:visible' o:gfxdata="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
DwAA//8DAFBLAwQKAAAAAAAAACEAt10P7sZnAADGZwAAFAAAAGRycy9tZWRpYS9pbWFnZTEuanBn
/9j/4AAQSkZJRgABAQAAAQABAAD//gA7Q1JFQVRPUjogZ2QtanBlZyB2MS4wICh1c2luZyBJSkcg
SlBFRyB2ODApLCBxdWFsaXR5ID0gNjAK/9sAQwANCQoLCggNCwoLDg4NDxMgFRMSEhMnHB4XIC4p
MTAuKS0sMzpKPjM2RjcsLUBXQUZMTlJTUjI+WmFaUGBKUVJP/9sAQwEODg4TERMmFRUmTzUtNU9P
T09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09P/8AAEQgBwgLu
AwEiAAIRAQMRAf/EAB8AAAEFAQEBAQEBAAAAAAAAAAABAgMEBQYHCAkKC//EALUQAAIBAwMCBAMF
BQQEAAABfQECAwAEEQUSITFBBhNRYQcicRQygZGhCCNCscEVUtHwJDNicoIJChYXGBkaJSYnKCkq
NDU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6g4SFhoeIiYqSk5SVlpeYmZqi
o6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2drh4uPk5ebn6Onq8fLz9PX29/j5+v/E
AB8BAAMBAQEBAQEBAQEAAAAAAAABAgMEBQYHCAkKC//EALURAAIBAgQEAwQHBQQEAAECdwABAgMR
BAUhMQYSQVEHYXETIjKBCBRCkaGxwQkjM1LwFWJy0QoWJDThJfEXGBkaJicoKSo1Njc4OTpDREVG
R0hJSlNUVVZXWFlaY2RlZmdoaWpzdHV2d3h5eoKDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKz
tLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uLj5OXm5+jp6vLz9PX29/j5+v/aAAwDAQACEQMRAD8A
9NooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKA
CiiigAooooAKKKKACiiigAooooAKKKKACiiloASiiloASiiloASiiigAopaSgAopaKAEopaSgApM
460fx/hQeaADOapajcrDAy9yCP0qxcyiKFjnoD/KuWup2uJ3yeBW9GlzSuceLrqEeVbk9nfGO4Zj
0yO1dFbyCaJXH8QBNcmApAFaek3flOYWP3iAK1xFLqjlwWI15ZG8FA5FKOabuAUN7UoPGa4z1vQW
iiigAoopaAEooooAKKKWgBKKKWgBKKKWgBKKKKACilpKACilooASilooASiiigAooooAKKKKACii
igAooooAKWkpaAEooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigApaSigAooooAKK
KKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigBC2O1IZFX7zAZ6ZPWkBG
0knB71yfiDW/Luvs8LcxMGyCDnjNaUqUqsrIyrVY0ldnXZ6UuecVlaFqIvtPR2bMu0lgSM9T2rSH
K5HWplFxlysqE1OKkh5OKByKaeQCe1OHIqSwooooAKKKKAE703OAWJxinHniszV7zyI9sbfMTggE
ZxinGPM7IzqTUI8zKWrXu+Vo0zgd+OeKyXyfu8euaWWQtg+9N5PU16lOnyo8GrV9pNyHKSqkYJPr
T43IdZM8p29ai3MOAeKAxVgc59auUeYhOx1Wn3SzwKD1wOPwq2M4x2rl9PuWguFJb5WOf0rp43Dx
hgc5ANeZWhyy0PbwtdVI+ZJ2ooorI6goopaAEooooAKKKKACiiigAooooAKKWkoAKKWkoAKKKKAC
iiigAooooAKKKKACiiigAooooAKKKKAClpKWgBKKKKACiiigAooooAKKKKACiiigAooooAKKKKAC
iiigAooooAKKKKACiiigAooooAKKKKACiiigAopaKAEoopu5s9OPWgB1FU9Qv4NOiEtzKqIWCgsc
cmrETh0yr7h607O1xJ62JKKTr3paQwooooAKKKKACiikbJ4BxQA6kpM8dap6heLZwmV268AE47U0
m3ZEykoq7KOv6otjb4Rh5pOCA3IBBrhZZRO3nyHMjdc9eKmv7+S/uDJIT24JzVIgNJjO3Fe/hMOq
cddzwcRWdWXka2i6lJZXaDJEbsqsM4AGea763njmhWWIggjPBzXl+7DMnfs1dZ4V1Ndn2SVhlQqq
S33ySe1cuPw91zxOnA17PkZ1WcinDpTByMDv+lPAwAK8k9dC0UlLQAUlJz34pu/5cnigV9LkV1OI
FLMcDp1xXL3dyZ5TIec9s1b1W8M5wrfLxxmsqPIzu5+tehh6SSuzx8XiHJ8q2HEhuB0HIpuM8lsU
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
NqCXBv0ZCys6iIjOM/413YJwMgkil6rw340gJHYmuepUlN3kWlYcO1LSDntjFLUDFpKWkoAKWiig
BKKKKAFpKWigBKWkpaAEpaSigAooooAWkoooAWikooAWikooAWkpaSgBaKKKACiiigBKWkpaAEpa
KKAEooooAKKWigBKKWkoAKKKWgBKKWigBKKKKACilooASiiigAopaKAEopaSgAooooAKKKKACiii
gAooooAKWkpaACiikoAKKKKACiiigAooooAKKKKACiiigBB69TVa/vLexj8+5kVFGB8xxVg5HQZr
zv4nXs8W22jdwhRGJDEc5btVQjzSsJlTV/iNK8myygKrx+8Sfv6fdrJ+2+NdR+e1bUCn+y+aj8Ba
fYajrJjvGRgImby3j3DII55r2OK0trZdsFvFGvoigVtOSp6WDc8fMHjwHj+0v++qRrzxnpy+ddSa
giDk7nwMDmvZjGpH3Rn0xUE9nbXMZW6tonXByHQMKn2q6oLHmui/EeaJ0hvrcvkgNK8/Tnr92vRd
K1W21S2Sa2kR8gFgpztz/wDqrzzx34T2Swz6RaJtkdtyRIqBQAP/AK9L4Dg1vTr/AMq4t5lt5HQc
ycADPbPvTnGLV4gj1GimlsD1J6Cobm6it4/Mlk2ADkVgtdBliiufuPGWg2+VfUY94/hKt/hVP/hP
dEByb2L6Yb/Cq5JdhXOspa5aDx3obn97exIPXDH+lbVpqtjf/wDHpcrIPUAihwkugy9WN4n1ldF0
7zygYvlV+bbg4J9DVzUNTtNLtxNfziFGbaGIJ5wT2+lee+P/ABDpOqaXBDp+oLO6ykkAMONpHcVV
OPNJCZz934o1/U7zbY3d0u9gFjSTPXAx+dWUh8cPllGokjkHdVTwXdadY6o02qPGkYKFS65xhsmv
UrXxX4bubiO3tNRhaWRgqqqMMk9B0repJQ0URJHmt5qHi+yWIS3l+rEHcpfGMYrvfAt5f3tk7380
rsoT75z1BzVzVdT8M2syrqjWu9if9ZDuPbPb6Vd0e60q6hd9HMJjGNwiTaPbsKwlJNXsNXNLPPFL
TVPY8E9qdWYwooooAKKKKACiiigAooooAKWkpaAEpaSigAooooAWkpaSgBaKKKAEpaSloAKSlpKA
FooooAKKKKAEpaSloASilooASiiigAopaKAEopaSgAooooAKKWkoAKKKKACilooASiiigAooooAK
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
AFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQA
UUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABR
RRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFF
FAH/2VBLAQItABQABgAIAAAAIQDAV3P7DAEAABkCAAATAAAAAAAAAAAAAAAAAAAAAABbQ29udGVu
dF9UeXBlc10ueG1sUEsBAi0AFAAGAAgAAAAhAAjDGKTUAAAAkwEAAAsAAAAAAAAAAAAAAAAAPQEA
AF9yZWxzLy5yZWxzUEsBAi0AFAAGAAgAAAAhADe/snyEAgAAAQYAABIAAAAAAAAAAAAAAAAAOgIA
AGRycy9waWN0dXJleG1sLnhtbFBLAQItABQABgAIAAAAIQA3ncEYugAAACEBAAAdAAAAAAAAAAAA
AAAAAO4EAABkcnMvX3JlbHMvcGljdHVyZXhtbC54bWwucmVsc1BLAQItABQABgAIAAAAIQD7bqY6
FwEAAI4BAAAPAAAAAAAAAAAAAAAAAOMFAABkcnMvZG93bnJldi54bWxQSwECLQAKAAAAAAAAACEA
t10P7sZnAADGZwAAFAAAAAAAAAAAAAAAAAAnBwAAZHJzL21lZGlhL2ltYWdlMS5qcGdQSwUGAAAA
AAYABgCEAQAAH28AAAAA
">
                        <v:imagedata src="planning_2017-2018.fld/planning_2017-2018_23604_image002.png"
                                     o:title=""/>
                        <x:ClientData ObjectType="Pict">
                            <x:SizeWithCells/>
                            <x:CF>Bitmap</x:CF>
                        </x:ClientData>
                    </v:shape><![endif]--><![if !vml]><span style='mso-ignore:vglayout;
  position:absolute;z-index:2;margin-left:20px;margin-top:11px;width:112px;
  height:68px'><img width=84 height=51
                    src="../../../planning_2017-2018.fld/planning_2017-2018_23604_image002.png" v:shapes="Image_x0020_2"></span><![endif]><span
                            style='mso-ignore:vglayout2'>
  <table cellpadding=0 cellspacing=0>
   <tr>
    <td height=21 width=97 style='height:16.0pt;width:73pt'></td>
   </tr>
  </table>
  </span></td>
                <td width=87 style='width:65pt'></td>
            </tr>
            <tr height=105 style='height:80.0pt;mso-xlrowspan:5'>
                <td height=105 colspan=10 style='height:80.0pt;mso-ignore:colspan'></td>
            </tr>
            <tr height=32 style='height:24.0pt'>
                <td height=32 colspan=3 style='height:24.0pt;mso-ignore:colspan'></td>
                <td colspan=6 class=xl99 align=left>Planning des soutenances des PFE
                    2017-2018
                </td>
                <td></td>
            </tr>
            <tr height=21 style='height:16.0pt'>
                <td height=21 colspan=10 style='height:16.0pt;mso-ignore:colspan'></td>
            </tr>

            <tr height=21 style='height:16.0pt'>
                <td height=21 colspan=2 style='height:16.0pt;mso-ignore:colspan'></td>
                <td class=xl65 style='border-top:none'>Nom</td>
                <td class=xl65 style='border-top:none'>Prénom</td>
                <td class=xl66 style='border-top:none;border-left:none'>Filière</td>
                <td class=xl66 style='border-top:none;border-left:none'>Encadrant</td>
                <td class=xl66 style='border-top:none;border-left:none'>Date Soutenance</td>
                <td class=xl66 style='border-top:none;border-left:none'>Heure<span
                            style='mso-spacerun:yes'> </span></td>
                <td class=xl66 style='border-top:none;border-left:none'>Local</td>
                <td></td>
            </tr>


            <?php
                soutenance();
            ?>

            <![endif]>
        </table>

    </div>


    <!----------------------------->
    <!--FIN DE LA SORTIE À PARTIR DE L'ASSISTANT PUBLIER EN TANT QUE PAGE WEB
    D'EXCEL-->
    <!----------------------------->


    <!-- <img class="img-responsive" src="ressources/img/planning.jpg" > -->
</div>


</body>
</html>


