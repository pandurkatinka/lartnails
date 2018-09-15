<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * [Pages] Model
 *
 *
 * @package    	PopCMS - Pages
 * @copyright  	Copyright (c) 2016 Horvath Mate & Csoma Gergo
 * @version    	1.0
 * @author     	Horvath Mate <horvath.mate@popularmarketing.hu>
 *              Csoma Gergo <csoma.gergo@popularmarketing.hu>
 */

// ------------------------------------------------------------------------

get_instance()->load->iface('ManageMenu');

class Pages_model extends CI_Model implements ManageMenu  {

	function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function fill_menu($menu){
        $pages = $this->buildMenu();
        foreach ($pages['items'] as $value) {
            $menu->addMenuItem($value);
        }
    }

    function getPageData($url, $lang = 'hu'){
        $this->db->where('seo_url', $url);
        $query = $this->db->get('page');
        if($query->num_rows() > 0){
            return $query->result();
        }

    }


    public function buildMenu($lang = 'hu'){
    $this->db->select('id, name, seo_url, parent, status, language, ext_url');
    $this->db->where('status', '1');
    $this->db->order_by('page_order', 'asc');
    $MenuList = $this->db->get('page')->result();
    $temp = array();
    foreach($MenuList as $row){
                array_push($temp, json_decode(json_encode($row), TRUE ));
            }
    $temp2 = $this->buildTree($temp, 0);
    return $temp2;
    }

    // Function that recursively build the menu array -> capable of building endless nested menus
    public function buildTree(array &$elements, $parentId = 0) {
        
        $branch = array();
        $branch['items'] = array();
        foreach ($elements as &$element) {

            if ($element['parent'] == $parentId) {
                $children = $this->buildTree($elements, $element['id'])['items'];
                if ($children) {
                    $element['children'] = $children;
                    //if we are in the index the seo url is ''
                    if($element['seo_url'] == ''){
                        array_push($branch['items'], new MenuItem('', $element['name'],$children, null));    
                    }else{
                        if($element['ext_url'] != ''){
                            array_push($branch['items'], new MenuItem($element['ext_url'], $element['name'],$children, $element['ext_url']));
                            unset($element);    
                        }else{
                            array_push($branch['items'], new MenuItem('pages/'. $element['seo_url'], $element['name'],$children, null));
                            unset($element);    
                        }
                        }
                }else{
                //array_push($branch, $element);
                //if we are in the index the seo url is ''
                    if($element['seo_url'] == ''){
                        array_push($branch['items'], new MenuItem('', $element['name'],$children, null));    
                    }else{
                        if($element['ext_url'] != ''){
                            array_push($branch['items'], new MenuItem($element['ext_url'], $element['name'],null, $element['ext_url']));
                        }else{
                            array_push($branch['items'], new MenuItem('pages/'. $element['seo_url'], $element['name'],null, null));    
                        }
                        
                    }
                }
                unset($element);
            }
        }
        return $branch;
    }

    // Function for creating custom shortcodes in the content context
    // also support for multilanguage shortcodes
    public function parseShortcodes($string_to_be_parsed){
        //$this->shortcodes->nullShortcodes();
        //
        $this->shortcodes->process_string($string_to_be_parsed);
        $keys = array('internal', 'box_left', 'lang', 'box_right', 'red_ribbon', 'test');
        $shortcodes = $this->shortcodes->return_shortcodes_by_key($keys);
        
        foreach($shortcodes as $sc)
        {
            switch ($sc['shortcode']->getKey()) {
                case 'internal':
                    $this->shortcodes->replaceShortCodeWithHTML($sc['index'], '<a href="' . base_url() . $sc['shortcode']->getValue() . '">' . $sc['shortcode']->getName() . '</a>');
                    break;
                case 'lang':
                    $this->shortcodes->replaceShortCodeWithHTML($sc['index'],lang($sc['shortcode']->getValue()));
                    //print_r($this->shortcodes);exit;
                    break;
                default:
                    # code...
                    break;
            }
        }
        $string_to_be_parsed = $this->shortcodes->getAdaptedString();
        return $string_to_be_parsed;
    }

}

