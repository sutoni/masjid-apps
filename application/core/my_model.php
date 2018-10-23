<?php
class MY_Model extends CI_Model
{
    // Nama tabel database yang akan digunakan.
    protected $_tabel = '';

    // Jumlah data yang ditampilkan per halaman (paging).
    protected $_per_page = 0;

    // Offset untuk limit (paging).
    protected $_offset = 0;

    public function __construct()
    {
        parent::__construct();

        // Menebak nama tabel database berdasarkan nama model.
        if (!$this->_tabel) {
            $this->_tabel = 'tb_' . strtolower(str_replace('_model', '', get_class($this)));
        }
    }

    // Ambil 1 record, menerima beberapa pola "where"
    public function get()
    {
        // Mendapatkan argumen yang dilewatkan ke fungsi ini.
        $args = func_get_args();

        // $this->db->where('name', $name);
        // $this->db->where('name !=', $name);
        if (count($args) > 1) {
            $this->db->where($args[0], $args[1]);
        }

        // $this->db->where(3);
        elseif (count($args) == 1 && is_numeric($args[0])) {
            $this->db->where('id', $args[0]);
        }

        // $this->db->where(array('id' => $id, 'nama' => $nama))
        // $this->db->where("name='Joe' AND status='boss' OR status='active'")
        else {
            $this->db->where($args[0]);
        }

        // Memastikan hanya mengembalikan 1 record.
        $this->db->limit(1);

        // Mengembalikan hasil query.
        return $this->db->get($this->_tabel)->row();
    }

    // Ambil semua record, menerima beberapa pola "where".
    public function get_all()
    {
        // Mendapatkan argumen yang dilewatkan ke fungsi ini.
        $args = func_get_args();

        // Dipanggil tanpa prameter.
        if (!count($args) > 0) {
            return $this->db->get($this->_tabel)->result();
        }

        // $this->db->where('name', $name);
        // $this->db->where('name !=', $name);
        elseif (count($args) > 1) {
            $this->db->where($args[0], $args[1]);
        }

        // $this->db->where(3);
        elseif (count($args) == 1 && is_numeric($args[0])) {
            $this->db->where('id', $args[0]);
        }

        // $this->db->where(array('id' => $id, 'nama' => $nama))
        // $this->db->where("name='Joe' AND status='boss' OR status='active'")
        elseif ((count($args) == 1) && (is_array($args[0]) || is_string($args[0]))) {
            $this->db->where($args[0]);
        }

        // Mengembalikan semua record hasil query.
        return $this->db->get($this->_tabel)->result();
    }

    // Ambil beberapa record, dengan paging.
    public function get_all_paged()
    {
        // Mendapatkan argumen yang dilewatkan ke fungsi ini.
        $args = func_get_args();

        // get_all_paged($offset)
        if (count($args) < 2) {
            $this->get_real_offset($args[0]);
            $this->db->limit($this->_per_page, $this->_offset);
        }

        // get_all_paged(array('status' => '1'), $offset)
        else {
            $this->get_real_offset($args[1]);
            $this->db->where($args[0])->limit($this->_per_page, $this->_offset);
        }

        // Mengembalikan beberapa / semua record.
        return $this->db->get($this->_tabel)->result();
    }

    // Mengurutkan data berdasarkan kolom....dengan urutan....
    public function sort($field = '', $order = '')
    {
        if ($field && $order) {
            $this->db->order_by($field, $order);
        } else {
            $this->db->order_by('id', 'asc');
        }
        return $this;
    }

    // Ambil jumlah seluruh record get_all.
    public function get_all_num_rows()
    {
        return $this->db->get($this->_tabel)->num_rows();
    }

    // Insert.
    public function insert($data)
    {
        $data = (object)$data;
        $data->created_at = $data->updated_at = date('Y:m:d H:i:s');
        $this->db->insert($this->_tabel, $data);
        return $this->db->insert_id();
    }

    // Update, menerima beberapa pola "where"
    public function update()
    {
        // Mendapatkan argumen yang dilewatkan ke fungsi ini.
        $args = func_get_args();

        // update('name', $name, $data);
        // update('name !=', $name, $data);
        if (count($args) > 2) {
            $this->db->where($args[0], $args[1]);
            $data = (object)$args[2];
        }

        // update(3, $data);
        elseif (count($args) == 2 && is_numeric($args[0])) {
            $this->db->where('id', $args[0]);
            $data = (object)$args[1];
        }

        // update(array('id' => $id, 'nama' => $nama), $data)
        // update("name='Joe' AND status='boss' OR status='active'", $data)
        else {
            $this->db->where($args[0]);
            $data = (object)$args[1];
        }

        // Pastikan hanya 1 record yang diupdate.
        $this->db->limit(1);

        // Set kolom updated_at
        $data->updated_at = date('Y:m:d H:i:s');

        // Update
        return $this->db->update($this->_tabel, $data);
    }

    // Hapus data berdasarkan id yang diberikan.
    public function delete($id)
    {
        $this->db->where('id', $id)->limit(1)->delete($this->_tabel);
        if ($this->db->affected_rows() > 0) {
            return true;
        }
        return false;
    }

    // Validasi.
    // $form_rules adalah "string" nama array yang berisi rules validasi.
    public function validate($form_rules)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->$form_rules);
        return $this->form_validation->run();
    }

    // Gunakan HANYA jika PAGINATION menggunakan option 'use_page_numbers' => TRUE.
    public function get_real_offset($offset)
    {
        if (is_null($offset) || empty($offset)) {
            $this->_offset = 0;
        } else {
            $this->_offset = ($offset * $this->_per_page) - $this->_per_page;
        }
    }

    // Membuat paging.
    function paging($tipe, $base_url, $uri_segment)
    {
        // Memanggil library pagination.
        $this->load->library('pagination');

        // Konfigurasi.
        $config = array(
            'base_url' => $base_url,
            'uri_segment' => $uri_segment,
            'per_page' => $this->_per_page,
            'use_page_numbers' => true,
            'num_links' => 4,
            'first_link' => '&#124;&lt; First',
            'last_link' => 'Last &gt;&#124;',
            'next_link' => 'Next &gt;',
            'prev_link' => '&lt; Prev',

            // Menyesuaikan untuk Twitter Bootstrap 3.2.0.
            'full_tag_open' => '<ul class="pagination pagination-sm">',
            'full_tag_close' => '</ul>',
            'num_tag_open' => '<li>',
            'num_tag_close' => '</li>',
            'cur_tag_open' => '<li class="disabled"><li class="active"><a href="#">',
            'cur_tag_close' => '<span class="sr-only"></span></a></li>',
            'next_tag_open' => '<li>',
            'next_tagl_close' => '</li>',
            'prev_tag_open' => '<li>',
            'prev_tagl_close' => '</li>',
            'first_tag_open' => '<li>',
            'first_tagl_close' => '</li>',
            'last_tag_open' => '<li>',
            'last_tagl_close' => '</li>',
        );

        // Jika paging digunakan untuk "pencarian", tambahkan / tampilkan $_GET di URL.
        // Caranya dengan memanipulasi $config['suffix'].
        if ($tipe == 'pencarian') {
            if (count($_GET) > 0) {
                $config['suffix'] = '?' . http_build_query($_GET, '', "&");
            }
            $config['first_url'] = $config['base_url'] . '?' . http_build_query($_GET);
            $config['total_rows'] = $this->cari_num_rows();
        } else {
            $config['first_url'] = '1';
            $config['total_rows'] = $this->get_all_num_rows();
        }

        // Set konfigurasi.
        $this->pagination->initialize($config);

        // Buat link dan kembalikan link paging yang sudah jadi.
        return $this->pagination->create_links();
    }

    // Membuat captcha.
    public function buat_captcha()
    {
        // Memanggil helper captcha.
        $this->load->helper('captcha');

        // Random string untuk captcha.
        $word = strtoupper(random_string('alnum', 4));
        $this->session->set_userdata('captcha', $word);

        // Konfigurasi captcha.
        $captcha = array(
            'word' => $word,
            'img_path' => './asset/captcha/',
            'img_url' => base_url() . 'asset/captcha/',
            'font_path' => './asset/font/monaco.ttf',
            'img_width' => '150',
            'img_height' => '50',
            'expiration' => '1' // 1 detik
        );

        // Membuat gambar captcha.
        $img = create_captcha($captcha);

        // Mengembalikan link ke gambar captcha yang sudah dibuat.
        return $img['image'];
    }
}