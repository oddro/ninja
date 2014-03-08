<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * CodeAnalytic
 *
 * An open source application development framework and CMS for PHP 5 or newer
 *
 * @package		helpers/file
 * @author		CodeAnalytic Dev Team
 * @copyright           Copyright (c) 2013, CodeAnalytic, Inc.
 * @license		http://codeanalytic.com/license/
 * @link		http://codeanalytic.com
 * @since		Version 1.0
 * @filesource
 */
/**
 * make chamod file and folder
 * @param type $path
 * @param type $level
 */
if (!function_exists('config_chmod_directory')) {

    function config_chmod_directory($path = '.', $level = 0) {
        $ignore = array('cgi-bin', '.', '..');
        $dh = @opendir($path);
        while (false !== ( $file = readdir($dh) )) { // Loop through the directory 
            if (!in_array($file, $ignore)) {

                if (is_dir("$path/$file")) {

                    chmod("$path/$file", 0777);

                    config_chmod_directory("$path/$file", ($level + 1));
                } else {

                    chmod("$path/$file", 0777); // desired permission settings
                }//elseif 
            }//if in array 
        }//while 

        closedir($dh);
    }

}

/**
 * get file content
 * @param type $file
 * @return type
 */
if (!function_exists('config_file_get_content')) {

    function config_file_get_content($file = null) {
        if ($file != null) {
            if (is_file($file)) {
                return file_get_contents($file);
            }
        }
    }

}

/**
 * put content of file
 * @param type $file
 * @param type $data
 */
if (!function_exists('config_file_put_content')) {

    function config_file_put_content($file = null, $data = null) {
        if ($file != null && $data != null) {
            chmod($file, 0777);
            file_put_contents($file, $data);
        }
    }

}

/**
 * convert type file to json encode
 * @param type $data
 * @return type
 */
if (!function_exists('config_json_encode')) {

    function config_json_encode($data = null) {
        if ($data != null) {
            header('Content-Type: application/json');
            return json_encode($data);
        }
    }

}

/**
 * read file as json decode
 * @param type $json
 * @return type
 */
if (!function_exists('config_read_json_decode')) {

    function config_read_json_decode($json = null) {
        if ($json != null) {
            $data = array();
            $obj = json_decode($json, true);
            if (is_array($obj)) {
                foreach ($obj as $key => $val) {
                    $data[$key] = $val;
                }
                return $data;
            }
        }
        return false;
    }

}

/**
 * update file json config
 * @param type $file
 * @param type $update
 */
if (!function_exists('config_update_json_config')) {

    function config_update_json_config($file = null, $update = array()) {
        if (is_file($file) && is_array($update)) {
            // read file content
            $content = ca_file_get_content($file);
            // content to jsondecode
            $obj = ca_read_json_decode($content);
            // merge in array
            $json = array_merge($obj, $update);

            //encode file
            $data = ca_read_json_encode($json);
            // put the file update
            ca_file_put_content($file, $data);
        }
    }

}

/**
 * recursive delete for file and folder
 * @param type $str
 * @return type
 */
if (!function_exists('config_recursive_delete')) {

    function config_recursive_delete($str) {
        if (is_file($str)) {
            return @unlink($str);
        } elseif (is_dir($str)) {
            $scan = glob(rtrim($str, '/') . '/*');
            foreach ($scan as $index => $path) {
                ca_recursive_delete($path);
            }
            return @rmdir($str);
        }
    }

}

if (!function_exists('config_recursiveChmod')) {

    /**
     * recursive chmod file and folder
     * @param type $path
     * @param type $filePerm
     * @param type $dirPerm
     * @return type
     */
    function config_recursiveChmod($path, $filePerm = 0644, $dirPerm = 0755) {

        // Check if the path exists
        if (!file_exists($path)) {
            return(FALSE);
        }
        if (is_file($path)) {
            chmod($path, $filePerm);
            // If this is a directory...
        } elseif (is_dir($path)) {
            // Then get an array of the contents
            $foldersAndFiles = scandir($path);
            // Remove "." and ".." from the list
            $entries = array_slice($foldersAndFiles, 2);
            // Parse every result...
            foreach ($entries as $entry) {
                // And call this function again recursively, with the same permissions
                ca_recursiveChmod($path . "/" . $entry, $filePerm, $dirPerm);
            }
            // When we are done with the contents of the directory, we chmod the directory itself
            chmod($path, $dirPerm);
        }
        return(TRUE);
    }

}

function get_form($config){
    $html = '';
    $data = array(
        'name'        => $config['fild'],
        'placeholder'   => $config['val'],
        'value'         => set_value($config['fild'])
    );
    switch ($config['type']) {
        case 'textarea':
            $html .= form_textarea($data);
            break;
        default:
            $html .= form_input($data);
            break;
    }
    return $html;
}
/**
 * End of file ./system/helpers/file_helper.php
 */