<?php

namespace App\Http\Controllers\Admin;

use Goutte\Client;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client as GuzzleClient;
use Symfony\Component\DomCrawler\Crawler;

class RequestController extends Controller
{
    public function category_url_scrapper($request_type, $source, $main_listing_node, $category_link,
        $title_node, $brand_node, $description_node, $price_node, $unit_price_node, $discount_node, $image_node,
        $image_url_node, $rating_node, $product_link_node, $product_url_node, $substr_node, $explode_node,
         $substr_strpos_node,$str_replace_node,$replace_with_node, $append_str_node) {
        ini_set('max_execution_time', 0);
        $client = new Client();
        $crawler = $client->request($request_type, $category_link);
        $index = 0;
        $nodes = $crawler->filter($main_listing_node);
        $web_data = [];
        foreach ($nodes as $node) {
            $node = new Crawler($node);
            $web_data[$index]['title'] = $this->get_text($node, $title_node);
            $web_data[$index]['description'] = $this->get_text($node, $description_node);
            $web_data[$index]['brand'] = $this->get_text($node, $brand_node);
            $web_data[$index]['price'] = $this->price_filter($this->get_text($node, $price_node));
            $web_data[$index]['unit_price'] = $this->get_text($node, $unit_price_node);
            $web_data[$index]['discount'] = $this->price_filter($this->get_text($node, $discount_node));
            $web_data[$index]['image'] = $this->get_image($node, $image_node, $image_url_node, $source, $substr_node, $explode_node, $substr_strpos_node,$str_replace_node,$replace_with_node,$append_str_node);
            $web_data[$index]['rating'] = $this->get_text($node, $rating_node);
            $web_data[$index]['product_link'] = $this->get_link($node, $product_link_node, $product_url_node);         
            $index++;
        };
        return $web_data;
    }

    public function category_api_scrapper($request_type, $main_listing_node, $category_link,
    $title_node, $brand_node, $description_node, $price_node, $unit_price_node, $discount_node, $image_node,
    $image_url_node, $rating_node, $product_link_node, $product_url_node, $substr_node, $explode_node,
    $substr_strpos_node, $str_replace_node, $replace_with_node,$append_str_node)
    {
        $web_data = array();
        $client = new GuzzleClient();        
        $crawler = $client->request($request_type, $category_link);
        $response_array = json_decode($crawler->getBody(), true);
        if (strpos($main_listing_node, ',') !== false) {
            $response_array = $this->parse_comma($response_array, $main_listing_node);            
        }
        $index = 0;                
        foreach ($response_array as $node) {        
            $web_data[$index]['title'] = $this->get_api_text($node, $title_node);                        
            $web_data[$index]['brand'] = $this->get_api_text($node, $brand_node);                        
            $web_data[$index]['description'] = $this->get_api_text($node, $description_node);                        
            $web_data[$index]['price'] = $this->get_api_price($node, $price_node);                        
            $web_data[$index]['unit_price'] = $this->get_api_price($node, $unit_price_node);                                    
            $web_data[$index]['discount'] = $this->get_api_price($node, $discount_node);                   
            $web_data[$index]['image'] = $this->get_api_image($node, $image_node, $image_url_node, $substr_node, $explode_node, $substr_strpos_node,$str_replace_node,$replace_with_node,$append_str_node);     
            $web_data[$index]['rating'] = $this->get_api_text($node, $rating_node);            
            $web_data[$index]['product_link'] = $this->get_api_link($node, $product_link_node,$product_url_node);
            $index++;
        };
        return $web_data;
    }
    public function parse_comma($node, $indexes)
    {
        if (strpos($indexes, ',') !== false) {
            $values = explode(",", $indexes);
            $parse_data = $node;
            foreach ($values as $key => $index) {
                $parse_data = isset($parse_data[$index]) ? $parse_data[$index] : 'Not Available';
            }

            if (in_array("cheapestAuction", $values)) {
                if (strlen($parse_data) == 3) {
                    $parse_data = substr($parse_data, 0, 1) . '.' . substr($parse_data, 1, 2);
                } elseif (strlen($parse_data) == 4) {
                    $parse_data = substr($parse_data, 0, 2) . '.' . substr($parse_data, 2, 3);
                }
            }
        } else {
            $parse_data = isset($node[$indexes]) ? $node[$indexes] : 'Not Available';
        }
        return $parse_data;
    }
    private function get_text($crawler, $node_name)
    {
        try {
            if (!empty($node_name)) {
                return $crawler->filter($node_name)->count() > 0 ? $crawler->filter($node_name)->text() : '';
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    private function get_image($crawler, $node_name, $image_url_node = null, $source = null, $substr_node = null, $explode_node = null, $substr_strpos_node = null, $str_replace_node = null, $replace_with_node = null, $append_str_node = null)
    {     
        ini_set('max_execution_time', 0);
           $result = $crawler->filter($node_name)->count() > 0 ? $crawler->filter($node_name)->extract(array($source))[0] : '';           
            if (!empty($node_name)) { 
                if(!empty($explode_node)){
                   $result = explode(',', $result);
                   $result = trim(end($result));                  
                }
                if(!empty($substr_node)){
                    $result = trim(substr($result, $substr_node));                    
                 }
                 if(!empty($substr_strpos_node)){
                    $result = trim(substr($result, 0, strpos($result, $substr_strpos_node)));                         
                }                
                 if(!empty($str_replace_node)){
                    $result = trim(str_replace($str_replace_node,$replace_with_node,$result));                                            
                 }
                 if(!empty($image_url_node)){
                    $result = trim($image_url_node . $result);                    
                 }
                 if(!empty($append_str_node)){
                    $result = $result . $append_str_node;                    
                 }
                 return $result;
            }
    }
    private function get_link($crawler, $node_name, $product_link_node = null)
    {
        try {
            if (!empty($node_name)) {
                if (empty($product_link_node)) {
                    return $crawler->filter($node_name)->extract(array('href'))[0];
                } else {
                    return $product_link_node . $crawler->filter($node_name)->extract(array('href'))[0];
                }

            } else {
                return null;
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    private function price_filter($price)
    {            
            $removed_symbol_price = trim(str_replace(['€', '$', '£', 'US$', 'US', ' '], '', $price), ' ');
            $removed_symbol_price = trim($removed_symbol_price, '\0');
            $removed_symbol_price = trim($removed_symbol_price, '\t');
            $removed_symbol_price = trim($removed_symbol_price, '\n');
            $removed_symbol_price = trim($removed_symbol_price, '\x0B');
            $removed_symbol_price = trim($removed_symbol_price, '\r');
            $removed_symbol_price = trim($removed_symbol_price, ' ');
            $removed_symbol_price = preg_replace("/[^0-9,.]/", "", $removed_symbol_price);
            $removed_comma_price = trim(str_replace(',', '.', trim($removed_symbol_price)));            
            return $removed_comma_price;
    }
    private function get_api_text($crawler, $node_name)
    {
        try {
            if (!empty($node_name)) {
                return $this->parse_comma($crawler,$node_name);
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    private function get_api_price($crawler, $node_name)
    {
        try {
            if (!empty($node_name)) {
                return number_format((float) $this->parse_comma($crawler, $node_name), 2, '.', '');
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    private function get_api_link($crawler, $node_name, $product_link_node = null)
    {
        try {
            if (!empty($node_name)) {
                if (empty($product_link_node)) {
                    return $this->parse_comma($crawler,$node_name);
                } else {
                    return $product_link_node . $this->parse_comma($crawler,$node_name);
                }

            } else {
                return null;
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    private function get_api_image($crawler, $node_name, $image_url_node = null, $substr_node = null, $explode_node = null, $substr_strpos_node = null, $str_replace_node = null, $replace_with_node = null,$append_str_node=null)
    {             
        ini_set('max_execution_time', 0);
           $result = $this->parse_comma($crawler,$node_name);
            if (!empty($node_name)) { 
                if(!empty($explode_node)){
                   $result = explode(',', $result);
                   $result = trim(end($result));                  
                }
                if(!empty($substr_node)){
                    $result = trim(substr($result, $substr_node));                    
                 }
                 if(!empty($substr_strpos_node)){
                    $result = trim(substr($result, 0, strpos($result, $substr_strpos_node)));                         
                }                                 
                 if(!empty($image_url_node)){
                    $result = trim($image_url_node . $result);                    
                 }
                 if(!empty($append_str_node)){
                    $result = $result . $append_str_node;                    
                 }
                 if(!empty($str_replace_node)){
                    $result = trim(str_replace($str_replace_node,$replace_with_node,$result));                                                                
                 }
                 return $result;
            }
    }
    private function last_match_replace($search, $replace, $subject)
    {
        $pos = strrpos($subject, $search);
        if ($pos !== false) {
            $subject = substr_replace($subject, $replace, $pos, strlen($search));
        }
        return $subject;
    }
    
}
