<?php
namespace app\Module\Survey;
/*
 *  Using veriable \app\Module\Survey\ModuleName
 */
const ModuleName = "SURVEY";
const ModuleClass = "app\Module\Survey";

/*
 *  Using function \app\Module\Survey\modal_error()
 */
function modal_error($str){
    return '<div class="modal-header">
            <h6 class="modal-title font-weight-bold">RALAT<br></h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>				
            <div class="modal-body">
                <p class="text-center text-danger">'. $str .'</p>
            </div>';
}

function lookupOptions($c, $in, $table, $arg=null){
    $o = '';
    $fields = "*";
    $wheres = "";

    if(isset($arg["field"])) $fields = implode(', ',$arg["field"]);
    if(isset($arg["where"])) $wheres = ' WHERE '. implode(' AND ',$arg["where"]);

    $sql = "select $fields from $table". $wheres;
    $smt = $c->prepare($sql);
    $smt->execute();
    $dt = $smt->fetchAll();

    foreach ($dt as $r):  
        $o .= '<option value="'. $r["kod"] .'"'. (($in==$r["kod"])?' selected':'') .'>'.$r["kod"].' - '. $r["keterangan"] .'</option>';
        //$o .= '<option value="'.$r["kod_sijil"].'"'.($in==$r["kod_sijil"])?' selected':''.'>'.$r["kod_sijil"]-$r["keterangan"].'</option>';
    endforeach;        
    return $o;
}

class Access
{
    /*
     *  Using Class app\Module\Survey\lookup::Me()
     */
    static function Me(){
        return __METHOD__;
    }

}

?>