<?php

class JQueryUi_HeadHelper extends App_ViewHelper_Abstract
{

    public function head( JQueryUi_Options $options = null )
    {
        if ( $options == null )
            $options = new JQueryUi_Options();

	$this->getView()->broker()->headLink()
                ->prepend( $options->getCssUrl( $this->getView() ) )
                ->prepend( $this->getView()->staticpath() . 'jquery-ui/css/reset-fonts-grids.css' );

        
        if ( $options->withJavaScript() ) {
            $this->getView()->broker()->headScript()
                 ->alias( 'jquery-ui')
                 ->append( $options->getJsUrl( $this->getView() ), 'jquery' );
        }

        return $this;
    }
    
}