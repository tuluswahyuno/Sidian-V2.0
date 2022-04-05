<?php

class Dispo_m extends CI_Model
{

    public function get_data($table)
    {
        return $this->db->get($table);
    }

    public function get($id)
    {
        $query = $this->db->get_where('disposisi', array('id_surat' => $id), null, null);
        return $query;
    }

    public function get_data_tu()
    {
        $query = $this->db->query('SELECT * FROM disposisi where diajukan ="2" ORDER BY id_surat DESC;');
        return $query->result();
    }


    public function get_kegiatan($id)
    {
        $query = $this->db->get_where('kegiatan', array('id_kegiatan' => $id), null, null);
        return $query;
    }


    public function get_data_tu_admin()
    {
        $query = $this->db->query('SELECT * FROM disposisi ORDER BY id_surat DESC;');
        return $query->result();
    }


     public function get_data_tu_blmdiajukan()
    {
        $query = $this->db->query('SELECT * FROM disposisi where diajukan ="1" ORDER BY id_surat DESC;');
        return $query->result();
    }


    public function get_data_kasek($table)
    {
        $query = $this->db->query('SELECT * FROM disposisi WHERE dispo1="0" ORDER BY id_surat DESC;');
        return $query->result();
    }


    public function get_data_kasek_riwayat($table)
    {

        $query = $this->db->query('SELECT * FROM disposisi d, user s WHERE dispo1!="0" and d.dispo1 = s.id_user ORDER BY id_surat DESC;');

        
        return $query->result();
    }

    


    public function hitung_belum_respon_kasek()
    {   
        $nilaiawal = 0;

        $query = $this->db
                           ->where('dispo1',$nilaiawal)
                           ->get('disposisi');

        
        if($query->num_rows()>0)
        {
          return $query->num_rows();
        }
        else
        {
          return 0;
        }
    }


    public function hitung_sudah_respon_kasek()
    {   
        // $nilaiawal = 0;

        $query = $this->db->query("SELECT * FROM disposisi d, user s WHERE dispo1!='0' and d.dispo1 = s.id_user ORDER BY id_surat DESC;");
        return $query->num_rows();
    }


    public function get_data_kasek_belum()
    {
        $query = $this->db->query('SELECT * FROM disposisi d, user s WHERE status="0" and d.dispo1 = s.id_user ORDER BY id_surat DESC;');
        return $query->result();
    }


    public function get_data_kasek_proses()
    {
        $query = $this->db->query('SELECT * FROM disposisi d, user s WHERE status="1" and d.dispo1 = s.id_user ORDER BY id_surat DESC;');
        return $query->result();
    }

    public function get_data_kasek_selesai()
    {
        $query = $this->db->query('SELECT * FROM disposisi d, user s WHERE status="2" and d.dispo1 = s.id_user ORDER BY id_surat DESC;');
        return $query->result();
    }


    public function get_data_kabag($table,$id_user)
    {
        $query = $this->db->query("SELECT * FROM disposisi WHERE dispo1='$id_user' and dispo2='0' ORDER BY id_surat DESC;");
        return $query->result();
    }


    public function get_data_kabag_riwayat($table,$id_user)
    {

        $query = $this->db->query("SELECT * FROM disposisi d, user s WHERE dispo2!='0' and s.id_user = '$id_user' ORDER BY id_surat DESC;");

        return $query->result();
    }


    // untuk dashboard kabag

    public function hitung_belum_respon_kabag($id_user)
    {   
        $query = $this->db->query("SELECT * FROM disposisi WHERE dispo1='$id_user' and dispo2='0' ORDER BY id_surat DESC;");
        return $query->num_rows();
    }


    public function hitung_sudah_respon_kabag($id_user)
    {   
        $query = $this->db->query("SELECT * FROM disposisi WHERE dispo1='$id_user' and dispo2!='0' ORDER BY id_surat DESC;");
        return $query->num_rows();
    }


    public function get_data_kabag_belum($id_user)
    {
        $query = $this->db->query("SELECT * FROM disposisi d, user s WHERE dispo2!='0' and status='0' and s.id_user = '$id_user' ORDER BY id_surat DESC;");
        return $query->num_rows();
    }

    public function get_data_kabag_proses($id_user)
    {
        $query = $this->db->query("SELECT * FROM disposisi d, user s WHERE dispo2!='0' and status='1' and s.id_user = '$id_user' ORDER BY id_surat DESC;");
        return $query->num_rows();
    }

    public function get_data_kabag_selesai($id_user)
    {
        $query = $this->db->query("SELECT * FROM disposisi d, user s WHERE dispo2!='0' and status='2' and s.id_user = '$id_user' ORDER BY id_surat DESC;");
        return $query->num_rows();
    }


    public function get_data_kabag_belum_progres($id_user)
    {
        $query = $this->db->query("SELECT * FROM disposisi d, user s WHERE dispo2!='0' and status='0' and s.id_user = '$id_user' ORDER BY id_surat DESC;");
        return $query->result();
    }


    public function get_data_kabag_dalam_progres($id_user)
    {
        $query = $this->db->query("SELECT * FROM disposisi d, user s WHERE dispo2!='0' and status='1' and s.id_user = '$id_user' ORDER BY id_surat DESC;");
        return $query->result();
    }


    public function get_data_kabag_sudah_selesai($id_user)
    {
        $query = $this->db->query("SELECT * FROM disposisi d, user s WHERE dispo2!='0' and status='2' and s.id_user = '$id_user' ORDER BY id_surat DESC;");
        return $query->result();
    }


     // akhir untuk dashboard kabag




    // untuk dashboard kasubag


    


    public function hitung_belum_respon_kasubag($id_user)
    {   
        $query = $this->db->query("SELECT * FROM disposisi WHERE dispo2='$id_user' and dispo3='0' ORDER BY id_surat DESC;");
        return $query->num_rows();
    }


    public function hitung_sudah_respon_kasubag($id_user)
    {   
        $query = $this->db->query("SELECT * FROM disposisi WHERE dispo2='$id_user' and dispo3!='0' ORDER BY id_surat DESC;");
        return $query->num_rows();
    }


    public function get_data_kasubag_belum($id_user)
    {
        $query = $this->db->query("SELECT * FROM disposisi d, user s WHERE dispo3!='0' and status='0' and s.id_user = '$id_user' ORDER BY id_surat DESC;");
        return $query->num_rows();
    }

    public function get_data_kasubag_proses($id_user)
    {
        $query = $this->db->query("SELECT * FROM disposisi d, user s WHERE dispo3!='0' and status='1' and s.id_user = '$id_user' ORDER BY id_surat DESC;");
        return $query->num_rows();
    }

    public function get_data_kasubag_selesai($id_user)
    {
        $query = $this->db->query("SELECT * FROM disposisi d, user s WHERE dispo3!='0' and status='2' and s.id_user = '$id_user' ORDER BY id_surat DESC;");
        return $query->num_rows();
    }


    public function get_data_kasubag_belum_progres($id_user)
    {
        $query = $this->db->query("SELECT * FROM disposisi d, user s WHERE dispo3!='0' and status='0' and s.id_user = '$id_user' ORDER BY id_surat DESC;");
        return $query->result();
    }


    public function get_data_kasubag_dalam_progres($id_user)
    {
        $query = $this->db->query("SELECT * FROM disposisi d, user s WHERE dispo3!='0' and status='1' and s.id_user = '$id_user' ORDER BY id_surat DESC;");
        return $query->result();
    }


    public function get_data_kasubag_sudah_selesai($id_user)
    {
        $query = $this->db->query("SELECT * FROM disposisi d, user s WHERE dispo3!='0' and status='2' and s.id_user = '$id_user' ORDER BY id_surat DESC;");
        return $query->result();
    }


     // akhir untuk dashboard kasubag




    // untuk dashboard TU

    public function get_data_total_tu()
    {
        $query = $this->db->query("SELECT * FROM disposisi;");
        return $query->num_rows();
    }

    public function get_data_total_tu_biasa()
    {
        $query = $this->db->query("SELECT * FROM disposisi where sifat='0';");
        return $query->num_rows();
    }


    public function get_data_total_tu_penting()
    {
        $query = $this->db->query("SELECT * FROM disposisi where sifat='1';");
        return $query->num_rows();
    }


    public function get_data_total_tu_sangatpenting()
    {
        $query = $this->db->query("SELECT * FROM disposisi where sifat='2';");
        return $query->num_rows();
    }

    // akhir untuk dashboard TU





    public function get_data_kasubag($table,$id_user)
    {
        $query = $this->db->query("SELECT * FROM disposisi WHERE dispo2='$id_user' and dispo3='0' ORDER BY id_surat DESC;");
        return $query->result();
    }


    public function get_data_kasubag_riwayat($table,$id_user)
    {

        $query = $this->db->query("SELECT * FROM disposisi d, user s WHERE dispo3!='0' and s.id_user = '$id_user' ORDER BY id_surat DESC;");

        return $query->result();
    }



    // awal untuk dashboard anggota

    public function get_data_anggota($id_user)
    {
        $query = $this->db->query("SELECT * FROM disposisi d, user s WHERE d.dispo3='$id_user' and d.status='0' and s.id_user = d.dispo1 ORDER BY id_surat DESC;");
        return $query->result();
    }


    public function get_data_anggota_dalam_proses($id_user)
    {
        $query = $this->db->query("SELECT * FROM disposisi d, user s WHERE d.dispo3='$id_user' and d.status='1' and s.id_user = d.dispo1 ORDER BY id_surat DESC;");
        return $query->result();
    }


    public function get_data_anggota_sudah_selesai($id_user)
    {
        $query = $this->db->query("SELECT * FROM disposisi d, user s WHERE d.dispo3='$id_user' and d.status='2' and s.id_user = d.dispo1 ORDER BY id_surat DESC;");
        return $query->result();
    }


    public function get_data_anggota_belum($id_user)
    {
        $query = $this->db->query("SELECT * FROM disposisi WHERE dispo3='$id_user' and status='0' ORDER BY id_surat DESC;");
        return $query->num_rows();
    }


    public function get_data_kegiatan_kembali($id_user)
    {
        $query = $this->db->query("SELECT * FROM kegiatan WHERE id_user='$id_user' and status='3' ORDER BY id_kegiatan DESC;");
        return $query->num_rows();
    }

    public function get_data_anggota_proses($id_user)
    {
        $query = $this->db->query("SELECT * FROM disposisi WHERE dispo3='$id_user' and status='1' ORDER BY id_surat DESC;");
        return $query->num_rows();
    }

    public function get_data_anggota_selesai($id_user)
    {
        $query = $this->db->query("SELECT * FROM disposisi WHERE dispo3='$id_user' and status='2' ORDER BY id_surat DESC;");
        return $query->num_rows();
    }


    public function get_data_anggota_total($id_user)
    {
        $query = $this->db->query("SELECT * FROM disposisi WHERE dispo3='$id_user';");
        return $query->num_rows();
    }


    // akhir untuk dashboard anggota
    
    
    // dashboard admin

    public function get_data_total_pegawai()
    {
        $query = $this->db->query("SELECT * FROM user;");
        return $query->num_rows();
    }

    // akhir dashboard admin


    

    // untuk dashboard kasek

    public function hitung_total_surat_selesai()
    {   
        // $nilaiawal = 0;

        $query = $this->db->query("SELECT * FROM disposisi where status='2';");
        return $query->num_rows();
    }


    public function hitung_total_surat_proses()
    {   
        // $nilaiawal = 0;

        $query = $this->db->query("SELECT * FROM disposisi where status='1';");
        return $query->num_rows();
    }


    public function hitung_total_surat_belum()
    {   
        // $nilaiawal = 0;

        $query = $this->db->query('SELECT * FROM disposisi d, user s WHERE status="0" and d.dispo1 = s.id_user ORDER BY id_surat DESC;');
        return $query->num_rows();
    }


    public function hitung_total_surat()
    {   
        // $nilaiawal = 0;

        $query = $this->db->query("SELECT * FROM disposisi;");
        return $query->num_rows();
    }


    // akhir untuk dashboard kasek

    

    public function insert_data($data,$table)
    {
        $this->db->insert($table,$data);
    }

    public function update_data($table,$data,$where)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    public function delete_data($where,$table)
    {
        $this->db->delete($table,$where);
    }


    public function detail_user_dispo($id = null)
    {
        $this->db->from('user');
        if($id !=null)
        {
            $this->db->where('id_user', $id);
        }
        $query = $this->db->get();
        
        return $query->row()->nama_lengkap;
    }


    public function surat_belum_repson()
    {   
        $nilaiawal = 1;

        $query = $this->db
                           ->where('diajukan',$nilaiawal)
                           ->get('disposisi');

        
        if($query->num_rows()>0)
        {
          return $query->num_rows();
        }
        else
        {
          return 0;
        }
    }

}

?>