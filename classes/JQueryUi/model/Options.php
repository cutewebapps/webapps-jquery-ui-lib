<?php


class JQueryUi_Options
{
    const VERSION = '1.8.11';

    protected $_strCdn = JQueryUi_Cdn::NONE;
    protected $_bLoadJavaScript = 1;
    protected $_strTheme = 'sunny';

    /** @return JQueryUi_HeadHelper */
    public function setCdn( $strCdn )
    {
	$this->_strCdn = $strCdn;
	return $this;
    }
    /** @return JQueryUi_HeadHelper */
    public function setTheme( $strTheme )
    {
        $this->_strTheme = $strTheme;
        return $this;
    }
    /** @return JQueryUi_HeadHelper */
    public function loadJavaScript( $bLoad = 1 )
    {
        $this->_bLoadJavaScript = $bLoad;
        return $this;
    }
    /** @return boolean */
    public function withJavaScript()
    {
        return $this->_bLoadJavaScript;
    }

    /** @return string */
    public function getJsUrl( App_View $view )
    {
        switch ( $this->_strCdn )
        {
            case JQueryUi_Cdn::GOOGLE :
                return Sys_Mode::getScheme(). '://ajax.googleapis.com/ajax/libs/jqueryui/'
                        . self::VERSION . '/jquery-ui.min.js';
            case JQueryUi_Cdn::MICROSOFT :
                return Sys_Mode::getScheme(). '://ajax.aspnetcdn.com/ajax/jquery.ui/'
                        . self::VERSION . '/jquery-ui.min.js';
            default:
                return $view->staticpath(). 'jquery-ui/js/jquery-ui-'
                        . self::VERSION . '.custom.min.js';
        }
    }

    /** @return string */
    public function getCssUrl( App_View $view )
    {
        switch ( $this->_strCdn )
        {
            case JQueryUi_Cdn::GOOGLE :
                return Sys_Mode::getScheme(). '://ajax.googleapis.com/ajax/libs/jqueryui/'
                        . self::VERSION . '/themes/'.$this->_strTheme.'/jquery-ui.css';
            case JQueryUi_Cdn::MICROSOFT :
                return Sys_Mode::getScheme(). '://ajax.aspnetcdn.com/ajax/jquery.ui/'
                        . self::VERSION.'/themes/'.$this->_strTheme.'/jquery-ui.css';
            default:
                return $view->staticpath()
                        . 'jquery-ui/css/'.$this->_strTheme.'/jquery-ui-'
                        . self::VERSION.'.custom.css';
        }
    }
}
