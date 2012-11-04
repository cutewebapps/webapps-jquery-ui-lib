<?php


class JQueryUi_ButtonHelper extends App_ViewHelper_Abstract
{
    public function button( $strId, $strValue, $arrAttributes = array() )
    {
        $arrAttr = array();
        if ( $strId != '' ) {
            $arrAttr ['id']   = 'id="'.$strId.'" ';
            $arrAttr ['name'] = 'name="'.$strId.'" ';
        }
        $arrAttr ['value'] = 'value="'.$strValue.'" ';
        $arrAttr ['type'] = 'type="submit" ';
        
        $strClass = '';
        if ( isset( $arrAttributes['class'] )) {
            $strClass = ' '.$arrAttributes['class'];
            unset( $arrAttributes['class'] );
        }
        foreach( $arrAttributes as $strKey => $value ) {
            $arrAttr[ $strKey ] = $strKey.'="'.$value.'"';
        }

        return '<input class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only '.$strClass.'" '.
            implode( ' ', $arrAttr ).' />';
    }

}