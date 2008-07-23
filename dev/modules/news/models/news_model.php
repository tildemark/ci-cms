<?php

	class News_Model extends Model {
		var $tmppages;
		function News_Model()
		{
			parent::Model();
			
			$this->table = 'news';
			$this->lang = $this->session->userdata('lang');
		}
		
		function get_total()
		{
			$this->db->where('lang', $this->lang );
			$this->db->from('news');
					
			return $this->db->count_all_results();
			
		}

		function generate_uri($title)
		{
			$raw_uri = format_title($title);
			$uri = format_title($title);
			
			$i = 1;
			while($this->get_news($uri))
			{
				$uri = $raw_uri . '-' . $i;
				$i++;
			}
			
			
			return $uri;
		}
		
		function get_news($data)
		{
			
			if ( is_array($data) )
			{
				foreach ($data as $key => $value)
				{
					$this->db->where($key, $value);
				}
			}
			else
			{
				$this->db->where('uri', $data);
			}
			
			$query = $this->db->get($this->table, 1);
			
			if ( $query->num_rows() == 1 )
			{
				return $query->row_array();
			}
			else
			{
				return false;
			}
		}
		
		function news_list()
		{
			
			$this->db->where(array('lang' => $this->lang));
			$this->db->orderby('id DESC');
			$query = $this->db->get($this->table);
			
			if ( $query->num_rows() > 0 )
			{
				return $query->result_array();
			}
			else
			{
				return false;
			}
		}

		function latest_news($limit = 10)
		{
			$this->db->order_by('id', 'DESC');
			$this->db->limit($limit);
			$query = $this->db->get($this->table);
			
			if ( $query->num_rows() == 1 )
			{
				return $query->result_array();
			}
			else
			{
				return false;
			}
		}

		function attach($id, $image_data)
		{
			$data = array('src_id' => $id, 'module' => 'news', 'file' => $image_data['file_name']);
			$this->db->insert('images', $data);
			return $this->db->insert_id();
		}
	}


?>