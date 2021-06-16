<?php

/**
 * This is the render file for slutprojekt-18eg-KevinTexas
 *
 * PHP version 5
 *
 * @category Render
 * @package  App
 * @author   Kevin Kvissberg <kevkvi879@edu.linkoping.se>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version  CVS: <cvs_id>
 * @link     http://pear.php.net/package/PackageName
 */

/**
 * View
 *
 * Class that renders a twig file with data
 *
 * PHP version 5
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category  Render
 * @package   App
 * @author    Kevin Kvissberg <kevkvi879@edu.linkoping.se>
 * @copyright 2020-2021 The PHP Group
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1.0
 * @link      http://pear.php.net/package/PackageName
 * @see       NetOther, Net_Sample::Net_Sample()
 */

namespace App;

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

/**
 * Class View
 *
 * @package App
 */
class View
{
    private \Twig\TemplateWrapper $_template;
    private array $_data;

    /**
     * View constructor.
     *
     * @param string $view The parameter for the filename
     * @param array  $data The array data to be sent to the twig file
     *
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function __construct( string $view, array $data )
    {
        $loader = new FilesystemLoader( '../app/views' );
        $twig = new Environment(
            $loader, [
                'cache' => 'cache',
                'debug' => TRUE,
                'auto_reload' => TRUE,
            ]
        );
        $this->_template = $twig->load( $view );
        $this->_data = $data;
    }

    /**
     * Render function
     *
     * @param string $view The parameter for the filename
     * @param array  $data The array data to be sent to the twig file
     *
     * @return true
     * @throws RuntimeError
     * @throws SyntaxError
     *
     * @throws LoaderError
     */
    public static function render( string $view, array $data )
    {
        $view = new View( $view . ".twig", $data );
        echo $view->_template->render( $data );
        return TRUE;
    }
}