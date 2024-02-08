<?php
class Crud_model extends CI_Model{


    public function getAllNews(){

       $query= $this->db->get('post');
       if($query){
        return $query->result();
       }
    }

    public function getNewsById($id)
    {
        $query = $this->db->get_where('post', array('id' => $id));
        return $query->row();
    }
 



    
    public function addNews($title, $content)
    {
        $data = array(
            'title' => $title,
            'content' => $content,
            
        );

        $this->db->insert('post', $data);
    }
    public function updateNews($id, $title, $content)
    {
        $data = array(
            'title' => $title,
            'content' => $content
        );

        $this->db->where('id', $id);
        $this->db->update('post', $data);
    }

    // Delete a news article
    public function deleteNews($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('post');
    }
}

?>