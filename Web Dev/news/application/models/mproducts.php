<?php if (!defined('BASEPATH'))	exit('No direct script access allowed');

/**
 *
 */
class Mproducts extends CI_Model {
	
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

	function listproducts() {
		$this->db->order_by('date','desc');
		$this->db->select('p.ProductsID,p.ProductsName,more_online,Description,ProductsType,productstype.NameType,brochoure,pic1,pic2,pic3,pic4,pic5');
		$this->db->join('productstype','productstype.ID=p.ProductsType');
//		$this->db->join('img','img.productsID=p.ProductsID','left');
		//$this->db->group_by('p.ProductsID');
		//$this->db->limit(1);
		$query = $this->db->get('products p');
		return $query->result_array() ;
		//$query = $this -> db -> get();
	}
        
        function list_new_products() {
		$this->db->order_by('date','desc');
		$this->db->select('p.ProductsID,p.ProductsName,more_online,Description,ProductsType,productstype.NameType,brochoure,pic1,pic2,pic3,pic4,pic5');
		$this->db->join('productstype','productstype.ID=p.ProductsType');
//		$this->db->join('img','img.productsID=p.ProductsID','left');
		//$this->db->group_by('p.ProductsID');
		//$this->db->limit(1);
                $this->db->where('p.ProductsType',1);
		$query = $this->db->get('products p');
		return $query->result_array() ;
		//$query = $this -> db -> get();
	}
        
        function list_used_car_products() {
		$this->db->order_by('date','desc');
		$this->db->select('p.ProductsID,p.ProductsName,more_online,Description,ProductsType,productstype.NameType,brochoure,pic1,pic2,pic3,pic4,pic5');
		$this->db->join('productstype','productstype.ID=p.ProductsType');
//		$this->db->join('img','img.productsID=p.ProductsID','left');
		//$this->db->group_by('p.ProductsID');
		//$this->db->limit(1);
                $this->db->where('p.ProductsType',2);
		$query = $this->db->get('products p');
		return $query->result_array() ;
		//$query = $this -> db -> get();
	}
        
        function list_bigbike_products() {
		$this->db->order_by('date','desc');
		$this->db->select('p.ProductsID,p.ProductsName,Description,ProductsType,productstype.NameType,brochoure,pic1,pic2,pic3,pic4,pic5');
		$this->db->join('productstype','productstype.ID=p.ProductsType');
//		$this->db->join('img','img.productsID=p.ProductsID','left');
		//$this->db->group_by('p.ProductsID');
		//$this->db->limit(1);
                $this->db->where('p.ProductsType',3);
		$query = $this->db->get('products p');
		return $query->result_array() ;
		//$query = $this -> db -> get();
	}
        
	function products($id) {
		$this->db->where('products.productsID',$id);
		$this->db->join('productstype','productstype.ID=products.ProductsType');
		//$this->db->join('img','img.productsID=products.ProductsID');
		$query = $this -> db -> get("products");
		return $query->result_array() ;
	}
	function getImageArray($id){
		$this->db->where('img.productsID',$id);
		$query = $this -> db -> get("img");
		return $query->result_array();
	}
	function typeproducts() {
		$query = $this -> db -> get("productstype");
		if ($query -> num_rows() > 0) {
			return $query->result_array() ;
		}
	}
	public function products_insert($data) {
		$this->db->insert('products',$data);
	}
	public function products_update($data)
	{
		$this->db->where('productsID',$data['ProductsID']);
		$this->db->update('products',$data);
	}
	public function products_del($data) {
		$tables = array('products', 'img');
		$this->db->where('productsID', $data);
		$this->db->delete($tables);
	}

}
