
<div id="topPage" name="topPage">
<center>
<table width="100%">
   <tr>
    <td width="70">
      <img src="/expediente_electronico/graphics/linkpoint/ui_misc/nada-files.png" height="60" border="0"/>

    </td>
    <td valign=middle class="top_left">
      <span class="ui-title" style="color: #FFFFFF;">Expediente Electr&oacute;nico</span>
    </td>
    <td width="350" class="top_right">
    <?php
        if ($nombre_empresa!=""){
          ?>
       <span class="ui-title" style="color: #FFFFFF;"><?php echo $nombre_empresa?></span>
        <?php
        }
        ?>
    </td>
    <td width="10%">
       <?php
        if ($logo!=""){
          ?>
          <img src="<?php echo $logo?>" width="80px" height="80px" max-width="80px" max-height="80px">
          <?php
        }
        else{

          ?>
          <td><img src="/expediente_electronico/logos/logo_toks.png" width="60"/></td>
          <td><img src="/expediente_electronico/logos/logo_panda.png" width="60"/></td>
          <td><img src="/expediente_electronico/logos/logo_cup.png" width="60"/></td>
          <td><img src="/expediente_electronico/logos/logo_set.png" width="60"/></td>          
          <td><img src="/expediente_electronico/logos/beerfactory.bmp" width="60"/></td>          
          <td><img src="/expediente_electronico/logos/rcmodif1.bmp" width="60"/></td>          
          <?php 
        }                            
        ?>            
    </td>
   </tr>
</table>

</center>
</div>
<br/><br/>