<?php
$j=$_GET['i']-2;

echo " <div class='form-group'>
                <div class='md-input-wrapper md-input-wrapper-count'>
                <label>Critere_{$j}</label>
                <input type='text' class='input-count md-input' name='Critere_{$j}'  maxlength='60'>
                <div id='input_counter_counter' class='text-count-wrapper'></div>
                <span class='md-input-bar '></span></div>
                </div>";
                $i=$_GET['i']+1;
if($i<23){
echo"<div id='ajoutinput{$i}' class='uk-width-1-10 uk-text-center ajout-button' >
                                        <div class='uk-vertical-align uk-height-1-1'>
                                            <div class='uk-vertical-align-middle'>
                                                <a onclick='AjoutInputCriétre({$i})' class='btnSectionClone' ><i class='material-icons md-36'></i></a>
                                            </div>
                                        </div>
</div>";}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

