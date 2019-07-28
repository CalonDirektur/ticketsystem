<?php
class Comment extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_m');
        $this->load->model('comment_m');

        date_default_timezone_set('Asia/Jakarta');
    }

    public function post_comment($produk)
    {

        $post = $this->input->post(NULL, TRUE);

        $redirect = $post['redirect'];
        $data = [
            'parent_comment_id' => 0,
            'id_user' => $post['id_user'],
            $produk => $post['id_komentar'],
            'comment' => $post['post_comment'],
            'date' => date('Y-m-d H:i:s')
        ];
        $success = $this->comment_m->add_comment($data);
        if ($success) {
            redirect($redirect);
        }
    }

    public function post_reply($produk)
    {
        $post = $this->input->post(NULL, TRUE);

        $redirect = $post['redirect'];

        $data = [
            'parent_comment_id' => $post['parent_comment'],
            'id_user' => $post['id_user'],
            $produk => $post['id_komentar'],
            'comment' => $post['post_reply'],
            'date' => date('Y-m-d H:i:s')
        ];
        $success = $this->comment_m->add_comment($data);
        if ($success) {
            redirect($redirect);
        }
    }
}
