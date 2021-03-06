<?php
/**
 * This file is part of the dubphp  package.
 *
 * (c) Tom Sapletta <tom@sapletta.com>
 * 14.02.14 11:51
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * loading: config, functions, autorouters
 */
require 'init.php';


/*
 * get path
 * read all files in folder
 * read all files, get xpath value
 * make a list with result
 *
 */

/*
$dub = new dubSourceFolder('/home/neptun/www/curl/company/');
dubt( $dub->make() );
*/

/*
$dub =
    new dubVarHtmlQuery(
        '//div/p/strong/a/@href',
        new dubSourceHttp(
            array(
                'http://neptun.nep/curl/company/company_275908.htm',
                'http://neptun.nep/curl/company/company_284207.htm',
                'http://neptun.nep/curl/company/company_284528.htm'
            )
        )
);
*/

/*
$dub =
        new dubSourceHttp(
            new dubSourceFolder( '/home/neptun/www/curl/company/' )
        );
*/

/*
// get from folder list file, than get from html files only link by xpath, make array
$dub =
    new dubVarHtmlQuery(
        '//div/p/strong/a/@href',
        new dubSourceHttp(
            new dubSourceFolder( '/home/neptun/www/curl/company/' )
        )
    );
*/


$dub =
    new dubSourceFileSave(
        'page.list.txt',
        new dubVarHtmlQuery(
            '//div/p/strong/a/@href',
            new dubSourceHttp(
                new dubSourceFolder( '/home/neptun/www/curl/company/*.htm' )
            )
        )
    );

$lista_url_wizytowka = $dub->make();
dubt( $lista_url_wizytowka );


die;




/*
$list_url_email_part1 = array(
    'dom1', 'dom2', 'dom3', 'dom4', 'dom5', 'dom6', 'dom7'
);

$list_heading_id = array(
    '11', '22', '33', '44', '55'
);

$dub =
    new dubVarStringMerge (
        array (
            'http://',
            $list_url_email_part1,
            '/email_enquiries/new?heading_id=',
            $list_heading_id,
            '&origin=fi'
        )
    );


$list_url_email = $dub->make();
dubt( $list_url_email );
die;
*/


//$mystring = "150-Adelaide-Street-Brisbane-Cbd-4305";




$str_left = '-';
$str_right = '?';
//$right =
//$rest = mb_substr($utf8string,0,5,'UTF-8');
/*
var_dump(
//    leftByLength($utf8string, 6),
//    rightByLength($utf8string, 6),
    $str_left,
    startsWith($utf8string, $str_left)
//    leftByString($utf8string, $str_left)
//    rightByString($utf8string, $str_right),
//    mb_strpos($utf8string, $str_left)
);
*/
//mb_strrpos




//die;
$dub =
    new dubVarStringSplit (
        //data
        array(
//            'separator-left' => '',
            'separator-right' => '?'
        ),
        //callback
        $lista_url_wizytowka
    );

$list_url_email_part1 = $dub->make();
//dubt( $list_url_email_part1 );


$dub =
    new dubVarStringSplit (
    //data
        array(
            'separator-left' => 'heading_id=',
            'separator-right' => ''
        ),
        //callback
        $lista_url_wizytowka
    );

$list_heading_id = $dub->make();
//dubt( $list_heading_id );



$dub =
    new dubVarStringMerge (
        array (
//            'http://',
            $list_url_email_part1,
            '/email_enquiries/new?heading_id=',
            $list_heading_id,
            '&origin=fi'
        )
    );


$list_url_email = $dub->make();

$list_url_email = implode("\n",$list_url_email);
file_put_contents('list.txt', $list_url_email);

dubt( $list_url_email );


// save array to file
//    - which format?
// as yaml/csv format.
// save, add, remove




die;

/*
$dub =
    new dubVarStringSplit (
    //data
        array(
            'separator-left' => '?heading_id='
        ),
        //callback
        new dubVarHtmlQuery(
            '//div/p/strong/a/@href',
            new dubSourceHttp(
                new dubSourceFolder( '/home/neptun/www/curl/company/*.htm' )
            )
        )
    );


$list_heading_id = $dub->make();
dubt( $list_heading_id );
*/

/*
$dub =
    new dubVarStringSplit (
    //data
        array(
            'separator-left' => 'http://',
            'separator-right' => '?'
        ),
        //callback
        new dubVarHtmlQuery( $lista_url_wizytowka )
    );


$list_url_email_part1 = $dub->make();
dubt( $list_url_email_part1 );
*/

die;


//stwórz na dysku zmienną, do której bedziesz sie odnosił
// dub Source File Data

