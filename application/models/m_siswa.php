<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_siswa extends CI_Model {
    
    private $pk    = 'id';
    private $table = 'siswa';
    private $data  = array();
    
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function field_data($type = 1, $photo = NULL)
    {
        $this->data = array(
                      'nama'           => $this->input->post('nama'),
                      'tmp_lahir'      => $this->input->post('tmp_lahir'),
                      'tgl_lahir'      => extract_date($this->input->post('tgl_lahir')),
                      'jalur_id'       => $this->input->post('jalur_id'),
                      'pil_1'          => $this->input->post('pil_1'),
                      'pil_2'          => $this->input->post('pil_2'),
                      'jns_kelamin'    => $this->input->post('jns_kelamin'),
                      'agama'          => $this->input->post('agama'),
                      'alamat'         => $this->input->post('alamat'),
                      'telp'           => $this->input->post('telp'),
                      'email'          => $this->input->post('email'),
                      'asal_sekolah'   => $this->input->post('asal_sekolah'),
                      'nama_ortu'      => $this->input->post('nama_ortu'),
                      'pekerjaan_ortu' => $this->input->post('pekerjaan_ortu'),
                      'telp_ortu'      => $this->input->post('telp_ortu')
    				  );

        if ($type == 1)
        {
            $this->data['no_daftar']  = config('ppdb_tahun') . $this->no_daftar();
            $this->data['tgl_daftar'] = date('Y-m-d H:i:s');
        }
        
        if ($photo != NULL)
        {
            $this->data['photo'] = $photo;
        }
    }

    public function find_all($criteria = '', $year)
    {
        if ($criteria == '')
        {
            return $this->db->query("SELECT s.id, 
                                            s.no_daftar,
                                            s.nama,
                                    	    s.asal_sekolah, 
                                            s.diterima,
                                    	    p1.prodi_nama AS pilihan_1, 
                                    	    p2.prodi_nama AS pilihan_2
                                     FROM siswa s
                                     INNER JOIN prodi p1 ON p1.prodi_id = s.pil_1
                                     INNER JOIN prodi p2 ON p2.prodi_id = s.pil_2
                                     WHERE substring(no_daftar, 1, 4) = '$year'");
        }
        else if ($criteria == 1)
        {
            return $this->db->query("SELECT s.id, 
        			                        s.no_daftar, 
                                    		p1.prodi_nama AS pilihan_1, 
                                    		p2.prodi_nama AS pilihan_2, 
                                    		s.nama, 
                                    		p3.prodi_nama AS diterima
                                     FROM siswa s
                                     INNER JOIN prodi p1 ON p1.prodi_id = s.pil_1
                                     INNER JOIN prodi p2 ON p2.prodi_id = s.pil_2
                                     LEFT  JOIN prodi p3 ON p3.prodi_id = s.diterima
                                     WHERE substring(no_daftar, 1, 4) = '$year'
                                     AND diterima = '0' ");
        }
        else if ($criteria == 2)
        {
            return $this->db->query("SELECT s.id, 
        			                        s.no_daftar,
                                            s.nama,
                                            s.asal_sekolah,
                                    		p1.prodi_nama AS pilihan_1, 
                                    		p2.prodi_nama AS pilihan_2,
                                    		p3.prodi_nama AS diterima
                                     FROM siswa s
                                     INNER JOIN prodi p1 ON p1.prodi_id = s.pil_1
                                     INNER JOIN prodi p2 ON p2.prodi_id = s.pil_2
                                     LEFT  JOIN prodi p3 ON p3.prodi_id = s.diterima
                                     WHERE substring(no_daftar, 1, 4) = '$year'
                                     AND diterima != '0' AND diterima != 't' ");
        }
        else if ($criteria == 3)
        {
            return $this->db->query("SELECT id,
                                            no_daftar,
                                            nama,
                                            asal_sekolah
                                     FROM siswa
                                     WHERE substring(no_daftar, 1, 4) = '$year'
                                     AND diterima = 't'");
        }
    }

    public function find($id)
    {
        $query = $this->db->query("SELECT s.id,
                                          s.no_daftar,
                                          s.tgl_daftar,
                                          s.nama,
                                          s.tmp_lahir,
                                          s.tgl_lahir,
                                          s.jalur_id,
                                          s.jns_kelamin,
                                          s.agama,
                                          s.alamat,
                                          s.telp,
                                          s.email,
                                          s.asal_sekolah,
                                          s.nama_ortu,
                                          pekerjaan.pk_nama,
                                          s.telp_ortu,
                                          s.photo,
                                          s.pil_1,
                                          s.pil_2,
                                          s.pekerjaan_ortu,
                                          s.diterima,
                                          p1.prodi_nama AS pilihan_1, 
                                          p2.prodi_nama AS pilihan_2			 
                                  FROM siswa s
                                  INNER JOIN pekerjaan ON pekerjaan.pk_id = s.pekerjaan_ortu
                                  INNER JOIN prodi p1 ON p1.prodi_id = s.pil_1
                                  INNER JOIN prodi p2 ON p2.prodi_id = s.pil_2
                                  WHERE id = '$id'");
        return $query->num_rows() == 1 ? $query->row_array() : NULL;
    }

    public function save()
    {
        $this->db->insert($this->table, $this->data);
    }

    public function update($id)
    {
        $this->db
			 ->where($this->pk, $id)
             ->update($this->table, $this->data);
    }
    
    public function seleksi($prodi_id, $id)
    {
        $this->db
			       ->where($this->pk, $id)
             ->update($this->table, array('diterima' => $prodi_id));
    }

    public function clear($id)
    {
        return $this->db
                    ->where_in($this->pk, $id)
                    ->update($this->table, array('diterima' => 0));
    }
    
    public function delete($id)
    {
        $this->db
		     ->where_in($this->pk, $id)
			 ->delete($this->table);
        return $this->db->affected_rows();
    }

    public function is_exist($field, $value, $id = '')
    {
        $this->db->where($field, $value);
        
        if ($id != '')
        {
            $this->db->where($this->pk.' != ', $id);
        }
        
        $result = $this->db->count_all_results($this->table);
        
        return $result > 0 ? TRUE : FALSE;
    }

    public function return_id($no_daftar, $tgl_lahir)
    {
        $this->db->where('no_daftar', $no_daftar);
        $this->db->where('tgl_lahir', $tgl_lahir);
                        
        $result = $this->db->get('siswa');
        
        return $result->num_rows() == 1 ? $result->row_array() : NULL;
    }
    
    public function cetak_formulir($no_daftar, $tgl_lahir)
    {
        $query = $this->db
                      ->where('no_daftar', $no_daftar)
                      ->where('tgl_lahir', $tgl_lahir)
                      //->join('pekerjaan', 'pekerjaan.pk_id = siswa.pekerjaan_ortu')
                      ->get($this->table);
        return $query->num_rows() == 1 ? $query->row_array() : NULL;
    }

    public function export_excel($status = 'a', $tahun, $jalur = 'a', $order_by, $order_type)
    {
        $query = "SELECT s.no_daftar,
                         s.tgl_daftar,
                         s.jalur_id,
                         s.nama,
                         s.tmp_lahir,
                         s.tgl_lahir,
                         s.jns_kelamin,
                         s.agama,
                         s.alamat,
                         s.telp,
                         s.email,
                         s.asal_sekolah,
                         s.nama_ortu,
                         pekerjaan.pk_nama,
                         s.telp_ortu,
                         s.diterima,
                         p1.prodi_nama AS pilihan_1, 
                         p2.prodi_nama AS pilihan_2 
                         FROM siswa s
                         LEFT JOIN pekerjaan ON pekerjaan.pk_id = s.pekerjaan_ortu
                         LEFT JOIN prodi p1 ON p1.prodi_id = s.pil_1
                         LEFT JOIN prodi p2 ON p2.prodi_id = s.pil_2
                         ";
        $query .= " WHERE SUBSTRING(no_daftar, 1, 4) = $tahun ";

        if ($status != 'a')
        {
            if ($status == 1) // diterima
            {
                $query .= " AND diterima != 't' AND diterima != '0' ";
            }
            else if ($status == 2) // tidak diterima
            {
                $query .= " AND diterima = 't' ";
            }
            else if ($status == 3) // belum diseleksi
            {
                $query .= " AND diterima = '0' ";
            }
        }

        if ($jalur != 'a')
        {
            $query .= " AND jalur_id = $jalur";
        }
        
        $query .= " ORDER BY $order_by $order_type";

        return $this->db->query($query);
    }

    private function no_daftar()
    {
        $year  = config('ppdb_tahun');
        $query = $this->db->query("SELECT MAX(RIGHT(no_daftar, 5)) AS no_max 
                                   FROM siswa
                                   WHERE left(no_daftar, 4) = '$year'");
        $no = "";
        if ($query->num_rows() > 0 )
        {
            foreach($query->result() as $data)
            {
                $temp = ((int)$data->no_max) + 1;
                $no   = sprintf("%05s", $temp);
            }
        }
        else
        {
            $no = "00001";
        } 
        return $no;
    }
}

/* End of file m_jalur.php */
/* Location: ./application/models/m_jalur.php */