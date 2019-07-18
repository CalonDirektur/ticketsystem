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

    public function post_comment()
    {
        $post = $this->input->post(NULL, TRUE);
        $data = [
            'parent_comment_id' => 0,
            'comment' => $post['post_comment'],
            'date' => date('Y-m-d H:i:s')
        ];
        $this->comment_m->add_comment($data);
        redirect('');
    }

    public function post_reply()
    {
        $post = $this->input->post(NULL, TRUE);
        $data = [
            'parent_comment_id' => $post['parent_comment'],
            'comment' => $post['post_reply'],
            'date' => date('Y-m-d H:i:s')
        ];
        $this->comment_m->add_comment($data);
    }
}
