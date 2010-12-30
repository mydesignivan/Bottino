<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<button type="button" id="btnNew">Nuevo</button>&nbsp;
<button type="button" id="btnDel">Eliminar</button>&nbsp;
<br />

<table id="tblList" class="tbl-testimoniales" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <td class="cell1">&nbsp;</td>
            <td class="cell2">Testimonio</td>
            <td class="cell3">Autor</td>
            <td class="cell4">Ordenar</td>
            <td class="cell5">Modificar</td>
            <td class="cell6">Eliminar</td>
        </tr>
    </thead>
    <tbody id="sortable">
<?php foreach( $list as $row ) {
    $url = site_url('panel/testimoniales/form/'.$row['id']);
?>
        <tr id="tr<?=$row['id']?>">
            <td class="cell1"><input type="checkbox" value="<?=$row['id']?>" /></td>
            <td class="cell2"><a href="<?=$url?>"><?=character_limiter(strip_tags(trim($row['testimonio'])),40)?></a></td>
            <td class="cell3"><?=$row['autor']?></td>
            <td class="cell4"><a href="javascript:void(0)" class="handle"><img src="public/images/icon_arrow_move.png" alt="" width="24" height="24" /></a></td>
            <td class="cell5"><a href="<?=$url?>"><img src="public/images/icon-edit.png" alt="" width="16" height="16" />&nbsp;Modificar</a></td>
            <td class="cell6"><a href="javascript:void(Testimoniales.del(<?=$row['id']?>))"><img src="public/images/icon-delete.png" alt="" width="16" height="16" />&nbsp;Eliminar</a></td>
        </tr>
<?php }?>
    </tbody>
</table>